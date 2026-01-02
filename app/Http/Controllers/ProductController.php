<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
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
                'offer_price' => $product->offer_price ?? $product->price,
                'discount'    => $product->discount ?? 0,
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
}
