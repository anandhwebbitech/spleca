<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductResource;
use Illuminate\Support\Str;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Razorpay\Api\Api;



class ProductController extends Controller
{
    //
    public function ProductPage()
    {
        $categories = SubCategory::where('status', 1)->get();
        return view('pages.product', compact('categories'));
    }
    public function fetch()
    {
        return Product::with('category')->latest()->get();
    }
    /* =========================
        STORE / UPDATE
    ========================== */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id'       => 'required|integer',
            'name'              => 'required|string|max:255',
            'price'             => 'required|numeric',
            'discount_percent'  => 'nullable|numeric',
            'original_price'    => 'nullable|numeric',
            'quantity'          => 'required|integer',
            'stock_status'      => 'required',
            'images.*'          => 'image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => implode('<br>', $validator->errors()->all())
            ]);
        }

        DB::beginTransaction();

        try {

            /* ---------- STORE / UPDATE PRODUCT ---------- */
            $product = Product::updateOrCreate(
                ['id' => $request->id],
                [
                    'category_id'      => $request->category_id,
                    'name'             => $request->name,
                    'slug'             => Str::slug($request->name),
                    'price'            => $request->price,
                    'discount_percent' => $request->discount_percent ?? 0,
                    'original_price'   => $request->original_price ?? $request->price,
                    'quantity'         => $request->quantity,
                    'stock_status'     => $request->stock_status,
                    'tags'             => $request->tags,
                    'short_description' => $request->short_description,
                    'description'      => $request->description,
                    'status'           => 1
                ]
            );

            /* ---------- GENERATE 8-DIGIT SKU USING PRODUCT ID ---------- */
            if (!$product->sku) {
                $product->sku = str_pad($product->id, 8, '0', STR_PAD_LEFT);
                $product->save();
            }
            /* ---------- MULTIPLE IMAGE UPLOAD ---------- */
            if ($request->hasFile('images')) {

                $uploadPath = public_path('uploads/products');

                // Create folder if not exists
                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0755, true);
                }

                foreach ($request->file('images') as $image) {

                    $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                    $image->move($uploadPath, $imageName);

                    ProductImage::insert([
                        'product_id' => $product->id,
                        'image'      => $imageName
                    ]);
                }
            }

            DB::commit();

            return response()->json([
                'status'  => true,
                'message' => $request->id ? 'Product updated successfully' : 'Product added successfully'
            ]);
        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'status'  => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    /* =========================
        EDIT
    ========================== */
    public function edit($id)
    {
        $product = Product::with('images')->findOrFail($id);

        return response()->json($product);
    }

    /* =========================
        DELETE
    ========================== */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        /* delete images */
        foreach ($product->images as $img) {
            Storage::disk('public')->delete($img->image);
            $img->delete();
        }

        $product->delete();

        return response()->json([
            'status' => true,
            'message' => 'Product deleted'
        ]);
    }
    public function deleteImage($id)
    {
        $image = ProductImage::findOrFail($id);

        $path = public_path('uploads/products/' . $image->image);
        if (file_exists($path)) {
            unlink($path);
        }

        $image->delete();

        return response()->json(['status' => true]);
    }

    public function show($id)
    {
        $product = Product::with([
            'resources'
        ])->findOrFail($id);
        $wishlist = session()->get('wishlist', []);
        $wishlistIds = array_keys($wishlist);
        $inWishlist = in_array($product->id, $wishlistIds);
        return view('pages.product-details', compact('product', 'inWishlist'));
    }
    // 
    public function ProductResourceStore(Request $request)
    {
        DB::beginTransaction();

        try {

            $productId = $request->product_id;

            /* ================= VALIDATION ================= */
            $request->validate([
                'datasheet_title.*' => 'nullable|string|max:255',
                'datasheet_file.*'  => 'nullable|mimes:pdf|max:2048',
                'brochure_file.*'   => 'nullable|mimes:pdf|max:10240',
                'video_url.*'       => 'nullable|url',
                'status'            => 'required'
            ]);

            /* ================= DATA SHEET ================= */
            if ($request->hasFile('datasheet_file')) {
                foreach ($request->datasheet_file as $index => $file) {

                    if (!$file) continue;

                    $fileName = time() . '_' . $index . '_datasheet.' . $file->extension();
                    $file->move(public_path('uploads/resources'), $fileName);

                    ProductResource::create([
                        'product_id' => $productId,
                        'type'       => 'datasheet',
                        'title'      => $request->datasheet_title[$index] ?? null,
                        'file'       => $fileName,
                        'status'     => $request->status
                    ]);
                }
            }

            /* ================= BROCHURE ================= */
            if ($request->hasFile('brochure_file')) {
                foreach ($request->brochure_file as $index => $file) {

                    if (!$file) continue;

                    $fileName = time() . '_' . $index . '_brochure.' . $file->extension();
                    $file->move(public_path('uploads/resources'), $fileName);

                    ProductResource::create([
                        'product_id' => $productId,
                        'type'       => 'brochure',
                        'file'       => $fileName,
                        'status'     => $request->status
                    ]);
                }
            }

            /* ================= VIDEO ================= */
            if ($request->filled('video_url')) {
                foreach ($request->video_url as $url) {

                    if (!$url) continue;

                    ProductResource::create([
                        'product_id' => $productId,
                        'type'       => 'video',
                        'video_url'  => $url,
                        'status'     => $request->status
                    ]);
                }
            }

            DB::commit();

            return response()->json([
                'status'  => true,
                'message' => 'Product resources added successfully'
            ]);
        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'status'  => false,
                'message' => $e->getMessage()
            ]);
        }
    }
    /* ================= EDIT ================= */
    public function ProductResourceEdit($id)
    {
        return ProductResource::findOrFail($id);
    }

    /* ================= UPDATE ================= */
    public function ProductResourceUpdate(Request $request, $id)
    {
        $resource = ProductResource::findOrFail($id);

        if ($request->hasFile('file')) {
            if ($resource->file && File::exists(public_path('uploads/resources/' . $resource->file))) {
                File::delete(public_path('uploads/resources/' . $resource->file));
            }

            $file = time() . '.pdf';
            $request->file->move(public_path('uploads/resources'), $file);
            $resource->file = $file;
        }

        $resource->title = $request->title;
        $resource->video_url = $request->video_url;
        $resource->status = $request->status;
        $resource->save();

        return response()->json([
            'status' => true,
            'message' => 'Resource updated'
        ]);
    }

    /* ================= DELETE ================= */
    public function ProductResourceDestroy($id)
    {
        $resource = ProductResource::findOrFail($id);

        if ($resource->file && File::exists(public_path('uploads/resources/' . $resource->file))) {
            File::delete(public_path('uploads/resources/' . $resource->file));
        }

        $resource->delete();

        return response()->json([
            'status' => true,
            'message' => 'Resource deleted'
        ]);
    }
    public function index($productId)
    {
        $resources = ProductResource::where('product_id', $productId)->get();

        return response()->json($resources);
    }
    public function wishlistToggle($id)
    {
        $wishlist = session()->get('wishlist', []);

        if (in_array($id, $wishlist)) {
            // REMOVE
            $wishlist = array_diff($wishlist, [$id]);
            session()->put('wishlist', $wishlist);

            return response()->json([
                'status' => 'removed',
                'count'  => count($wishlist)
            ]);
        } else {
            // ADD
            $wishlist[] = $id;
            session()->put('wishlist', $wishlist);

            return response()->json([
                'status' => 'added',
                'count'  => count($wishlist)
            ]);
        }
    }

    public function wishlistCount()
    {
        return response()->json([
            'count' => count(session()->get('wishlist', []))
        ]);
    }

    public function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        $cart = Cart::where('product_id', $product->id)
            ->where('user_id', Auth::id())
            ->first();

        if ($cart) {
            $cart->quantity += 1;
            $cart->save();
        } else {
            Cart::create([
                'product_id'  => $product->id,
                'quantity'    => 1,
                'offer_price' => $product->original_price ?? $product->price,
                'original_price' => $product->price,
                'discount'    => $product->discount_percent ?? 0,
                'user_id'     => Auth::id(),
                'status'      => 1
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Added to cart'
        ]);
    }

    public function cartPanel()
    {
        $carts = Cart::with('product')->where('user_id', auth()->id())->get();

        $total = 0;

        foreach ($carts as $cart) {
            $price = $cart->offer_price ?? $cart->product->price;
            $total += $price * $cart->quantity;
        }

        return view('partials.cart-panel', compact('carts', 'total'));
    }

    public function toggleStatus(Request $request)
    {
        $product = Product::find($request->id);

        if (!$product) {
            return response()->json([
                'status' => false,
                'message' => 'Product not found'
            ]);
        }

        $product->status = $product->status == 1 ? 0 : 1;
        $product->save();

        return response()->json([
            'status' => true,
            'message' => 'Status updated successfully'
        ]);
    }
    // cart
    public function getCart()
    {
        $cartItems = Cart::with(['product.images'])->where('user_id', auth()->id())->where('status', 1)->get();
        return response()->json(['status' => 'success', 'cartItems' => $cartItems]);
    }
    public function RemoveCart(Request $request)
    {
        $cart = Cart::where('id', $request->cart_id)
            ->where('user_id', auth()->id())
            ->first();

        if (!$cart) {
            return response()->json([
                'status' => 'error',
                'message' => 'Cart item not found'
            ]);
        }

        $cart->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Item removed from cart'
        ]);
    }

    public function updateQuantity(Request $request)
    {
        $cart = Cart::with('product')
            ->where('id', $request->cart_id)
            ->where('user_id', auth()->id())
            ->first();

        if (!$cart) {
            return response()->json([
                'status' => 'error',
                'message' => 'Cart item not found'
            ]);
        }

        $newQty = $cart->quantity + (int)$request->change;

        if ($newQty < 1) {
            return response()->json([
                'status' => 'error',
                'message' => 'Quantity cannot be less than 1'
            ]);
        }

        // ✅ Product selling price
        $productPrice = $cart->product->original_price;

        // ✅ Update cart
        $cart->quantity = $newQty;
        $cart->offer_price = $productPrice * $newQty; // 🔥 IMPORTANT
        $cart->save();

        return response()->json([
            'status' => 'success',
            'quantity' => $newQty,
            'offer_price' => $cart->offer_price
        ]);
    }
    public function placeOrder(Request $request)
    {
        $request->validate([
            'address_id' => 'required|exists:customer_addresses,id'
        ]);

        $userId = Auth::id();

        $cartItems = Cart::with('product')
            ->where('user_id', $userId)
            ->get();

        if ($cartItems->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Your cart is empty'
            ]);
        }

        DB::beginTransaction();

        try {
            $subtotal = 0;
            $discount = 0;

            foreach ($cartItems as $item) {
                $subtotal += $item->product->price * $item->quantity;
                $cartdiscount = $item->discount ?? 0;
                // $discountAmount = ($item->price * $cartdiscount) / 100;
                $discountAmount = ($item->product->price *$item->product->discount_percent) / 100;
                $discountTotal = $discountAmount * $item->quantity;
                $discount += $discountTotal;
            }

            $tax = $subtotal * 0.18;
            $total = $subtotal - $discount + $tax;
            // dd($total,$discount);
            // Create Order
            $order = Order::create([
                'user_id'       => $userId,
                'address_id'    => $request->address_id,
                'price'         => $subtotal,
                'discount'      => $discount,
                'tax'           => $tax,
                'original_price'   => $total,
                'order_date'    => now(),
                'delivery_date' => now()->addDays(7),
                'status'        => 1 ,// Pending
                'quantity'      => $item->quantity,

            ]);

            // Create Order Items
            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id'      => $order->id,
                    'product_id'    => $item->product_id,
                    'quantity'      => $item->quantity,
                    'price'         => $item->product->price,
                    'original_price'   => $item->product->original_price * $item->quantity,
                    'discount'      => $item->discount
                ]);
            }

            // Clear Cart
            Cart::where('user_id', $userId)->delete();

            DB::commit();

            return response()->json([
                'status' => 'success',
                'order_id' => $order->id
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

    public function userOrders()
    {
        $orders = OrderItem::with(['order', 'product.images'])
            ->whereHas('order', function ($q) {
                $q->where('user_id', auth()->id());
            })->where('status', 2)
            ->latest()
            ->get()
            ->map(function ($item) {
                $status = $item->order_status;
                return [
                    'id'           => $item->order->id,
                    'product_name' => $item->product->name,
                    'product_id'    => $item->product->id,
                    'quantity'     => $item->quantity,
                    'price'        => $item->original_price,
                    'status' =>
                    $status == Order::Complete ? 'DELIVERED' : ($status == Order::Cancel   ? 'CANCELLED' : ($status == Order::Return   ? 'RETURNED'  : 'PENDING')),
                    'order_date'   => $item->order->created_at->format('D M d Y'),
                    // 'image'        => asset('public/uploads/products/' . $item->product->images[0]->image)
                    'image'        => asset('public/uploads/products/' .
                        optional($item->product->images->first())->image)
                ];
            });

        return response()->json([
            'orders' => $orders
        ]);
    }
    public function ShowPay($orderId)
    {
        $order = Order::findOrFail($orderId);
        return view('pages.select-payment', compact('order'));
    }
    public function cashOnDelivery($order_id)
    {
        $order = Order::findOrFail($order_id);
        OrderItem::where('order_id', $order_id)
            ->update([
                'status' => 2   // processing/placed
            ]);
        $order->update([
            'payment_type' => 'cod',
            'payment_status' => '1',
            'status' => '2'
        ]);

        // return redirect("/order-success/".$order_id);
        return redirect()->route('profilepage');
    }
    public function razorpayPayment($order_id)
    {
        $order = Order::findOrFail($order_id);

        // Validate that the order total is greater than 0
        if ($order->original_price <= 0) {
            return redirect()->back()->with('error', 'Order total must be greater than 0');
        }

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        // Create Razorpay order
        $razorOrder = $api->order->create([
            'receipt' => 'ORDER_' . $order->id, // convert to string with prefix
            'amount' => $order->original_price * 100,  // amount in paise
            'currency' => 'INR'
        ]);
        OrderItem::where('order_id', $order_id)
            ->update([
                'status' => 2   // processing/placed
            ]);
        $order->update([
            'payment_type' => 'Online',
            'payment_status' => '1',
            'status' => '2'
        ]);
        return view('pages.razorpay_payment', [
            'order' => $order,
            'rOrder' => $razorOrder
        ]);
    }
    public function savePayment(Request $request)
    {
        try {
            $request->validate([
                'order_id' => 'required|exists:orders,id',
                'razorpay_payment_id' => 'required',
                'razorpay_order_id' => 'required',
                'razorpay_signature' => 'required',
                'amount' => 'required|numeric'
            ]);

            $payment = Payment::create([
                'order_id' => $request->order_id,
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_order_id' => $request->razorpay_order_id,
                'razorpay_signature' => $request->razorpay_signature,
                'amount' => $request->amount,
                'status' => 'completed'
            ]);

            return response()->json(['status' => 'success', 'payment_id' => $payment->id]);
        } catch (\Exception $e) {
            // Return JSON with error message
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
