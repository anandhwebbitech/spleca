<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\CustomerAddress;
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
        return view("pages.cart");
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
    public function ProductsPage()
    {
        // $products = Product::with('images')
        // ->where('status', 1)
        // ->paginate(9);
        $categories = Category::with('subCategories')
            ->where('status', 1)
            ->get();
        return view('pages.application-area', compact('categories'));
        // return view('pages.application-area');
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

    return response()->json($query->latest()->get());
}

}
