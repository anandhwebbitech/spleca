<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\CustomerAddress;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class FrontendController extends Controller
{
    //
    public function Aboutpage()
    {
        return view("pages.about");
    }
    public function Cartpage()
    {
        $cartItems = Cart::with('product.images')
            ->where('user_id', Auth::id())
            ->get();

        $subtotal = 0;
        $discountTotal = 0;
        $ori_price = 0;

        foreach ($cartItems as $item) {
            $price = $item->product->price;
            $discount = $item->discount ?? 0;

            $discountAmount = ($price * $discount) / 100;
            $subtotal += $price * $item->quantity;
            $ori_price +=  $item->product->original_price * $item->quantity;
            $discountTotal += $discountAmount * $item->quantity;
        }

        $gst = ($subtotal - $discountTotal) * 0.18;
        $total = ($subtotal - $discountTotal) + $gst;
        return view("pages.cart", compact(
            'cartItems',
            'subtotal',
            'discountTotal',
            'gst',
            'total','ori_price'
        ));
    }
    public function CheckoutPage()
    {
       $cartItems = Cart::with('product.images')
            ->where('user_id', Auth::id())
            ->get();

        $subtotal = 0;
        $discountTotal = 0;
        $ori_price = 0;

        foreach ($cartItems as $item) {
            $price = $item->product->price;
            $discount = $item->discount ?? 0;

            $discountAmount = ($price * $discount) / 100;
            $subtotal += $price * $item->quantity;
            $ori_price +=  $item->product->original_price * $item->quantity;
            $discountTotal += $discountAmount * $item->quantity;
        }

        $gst = ($subtotal - $discountTotal) * 0.18;
        $total = ($subtotal - $discountTotal) + $gst;
        return view("pages.checkout", compact(
            'cartItems',
            'subtotal',
            'discountTotal',
            'gst',
            'total','ori_price'
        ));
    }
    public function HomePage()
    {
        $featuredProducts = Product::with('images')
            ->where('status', 1)
            ->get();
        $bestSellers = Product::with('images')
            ->where('status', 1)
            // ->where('is_best_seller', 1)
            ->get();

        return view('index', compact('featuredProducts', 'bestSellers'));
    }
    public function Contactpage()
    {
        return view("pages.contact");
    }
    public function Newsletterpage()
    {
        return view("pages.newsletter");
    }
    public function WishlistPage()
    {
        return view("pages.wishlist");
    }
    public function ProfilePage()
    {
        $addresses = CustomerAddress::where('user_id', Auth::id())->get();
        return view("pages.profile", compact('addresses'));
    }
    public function LoginPage()
    {
        return view('pages.login');
    }
    public function RegisterPage()
    {
        return view('pages.register');
    }

    public function PasswordPage()
    {
        return view('pages.password-reset');
    }
    public function ProductFinderPage()
    {
        return view('pages.product-finder');
    }
    public function ApplicationsandProductsPage()
    {
        return view('pages.applications-and-products');
    }
    public function ProductSolutionsPage()
    {
        return view('pages.product-solutions');
    }
    public function ProductsPage(Request $request)
    {
        $categories = Category::with('subCategories')
            ->where('status', 1)
            ->get();
        $selectedSubCategory = $request->subcategory;   
        return view('pages.application-area', compact('categories','selectedSubCategory'));
    }
    // Loads
    public function login(Request $request)
    {
        // Validate input
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Attempt login
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            return redirect()->intended('/home'); // change if needed
        }

        // Login failed
        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ])->withInput();
    }

    public function filterProducts(Request $request)
    {
        $products = Product::with('images')
            ->where('status', 1);

        // 🔹 Sub Category Filter
        if ($request->subcategories) {
            $products->whereIn('sub_category_id', $request->subcategories);
        }

        // 🔹 Price Filter
        if ($request->min_price) {
            $products->where('price', '>=', $request->min_price);
        }

        if ($request->max_price) {
            $products->where('price', '<=', $request->max_price);
        }

        // 🔹 Sorting
        if ($request->sort == 'price-low') {
            $products->orderBy('price', 'asc');
        } elseif ($request->sort == 'price-high') {
            $products->orderBy('price', 'desc');
        } elseif ($request->sort == 'latest') {
            $products->latest();
        }

        $products = $products->paginate(9);

        return view('pages.application-area', compact('products'))->render();
    }

    public function GetProducts(Request $request)
    {
        $query = Product::with('images')
            ->where('status', 1);

        // Filter by selected sub-categories
        if ($request->filled('categories')) {
            $query->whereIn('category_id', $request->categories);
        }
        // Price filter
        if ($request->filled('min_price')) {
            $query->where('original_price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('original_price', '<=', $request->max_price);
        }
        $wishlist = session()->get('wishlist', []);
        $wishlistIds = array_keys($wishlist);

        $products = $query->latest()->get();
        return response()->json([
            'products' => $products,
            'wishlist' => $wishlistIds

        ]);
        // return response()->json($query->latest()->get());
    }

    public function toggleWishlist($id)
    {
        $product = Product::with('images')->find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $wishlist = session()->get('wishlist', []);

        if (isset($wishlist[$id])) {
            unset($wishlist[$id]);
            $added = false;
        } else {
            $image = $product->images->first()
            ? $product->images->first()->image
            : null;

            $wishlist[$id] = [
                "product_name" => $product->name,
                "id"           => $product->id,
                "quantity"     => 1,
                "offer_price"  => $product->original_price,
                "price"  => $product->price,
                "product_img"  => $image,
                "discount_percent" =>$product->discount_percent,
                "short_description" => $product->short_description,
                "user_id"       => auth()->id()
            ];
            $added = true;
        }

        session()->put('wishlist', $wishlist);

        return response()->json([
            'message' => $added ? 'Added to wishlist' : 'Removed from wishlist',
            'count' => count($wishlist),
            'added' => $added
        ]);
    }
    public function getWishlist()
    {
        $wishlist = session()->get('wishlist', []);
        // dd($wishlist);
        return response()->json([
            'items' => $wishlist,
            'count' => count($wishlist)
        ]);
    }
    public function getAddresses()
    {
        $addresses = CustomerAddress::where('user_id', Auth::id())
            ->where('status', 1)
            ->orderByDesc('is_default')
            ->get();

        return response()->json([
            'addresses' => $addresses
        ]);
    }
    public function cancelOrder(Request $request)
    {
        $order = OrderItem::where('order_id', $request->order_id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        if ($order->order_status == Order::Cancel) {  
            return response()->json([
                'message' => 'Delivered orders cannot be cancelled.'
            ], 422);
        }

        $order->order_status = Order::Cancel   ;   // CANCELLED
        $order->save();
        // OrderItem::where('order_id', $request->order_id)
        //     ->update([
        //         'order_status' => Order::Cancel   
        //     ]);
        return response()->json([
            'message' => 'Order cancelled successfully.'
        ]);
    }


}
