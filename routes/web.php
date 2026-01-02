<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'Homepage'])->name('homepage');
Route::get('/home', [FrontendController::class, 'Homepage'])->name('homepage');
Route::get('/about', [FrontendController::class, 'Aboutpage'])->name('aboutpage');
Route::get('/contact', [FrontendController::class, 'Contactpage'])->name('contactpage');
Route::get('/newsletter', [FrontendController::class, 'Newsletterpage'])->name('newsletterpage');
Route::get('/profile', [FrontendController::class, 'ProfilePage'])->name('profilepage');
Route::get('/login', [FrontendController::class, 'LoginPage'])->name('loginpage');
Route::get('/register', [FrontendController::class, 'RegisterPage'])->name('registerpage');
Route::get('/password', [FrontendController::class, 'PasswordPage'])->name('passwordpage');
Route::get('/productfinder', [FrontendController::class, 'ProductFinderPage'])->name('productfinderpage');
Route::get('/applicationsandproducts', [FrontendController::class, 'ApplicationsandProductsPage'])->name('applicationsandproductspage');
Route::get('/productsolutions', [FrontendController::class, 'ProductSolutionsPage'])->name('productsolutionspage');
Route::get('/products', [FrontendController::class, 'ProductsPage'])->name('allproductspage');
Route::get('/products/ajax', [FrontendController::class, 'GetProducts'])->name('getproducts');

Route::get('/category', [CategoryController::class, 'CategoryPage'])->name('categorypage');
Route::get('sub-category-fetch',[CategoryController::class, 'fetch'] )->name('categoryfetch');
Route::post('sub-category-store', [CategoryController::class, 'store'])->name('categorstore');
Route::get('sub-category-edit/{id}',[CategoryController::class, 'edit'] )->name('categoryedit');
Route::post('sub-category-update', [CategoryController::class, 'update'])->name('categoryupdate');
Route::delete('sub-category-delete/{id}', [CategoryController::class, 'destroy'])->name('categorydestroy');
Route::post('sub-category-status', [CategoryController::class, 'changeStatus'])->name('subcategorystatus');

Route::post('/register', [AuthController::class, 'Register'])->name('register');
// AUTH
Route::post('login', [AuthController::class,'Login'])->name('login');
Route::post('/logout', [AuthController::class,'Logout'])->name('logout');

Route::get('/product', [ProductController::class, 'ProductPage'])->name('productpage');
Route::get('product-fetch', [ProductController::class,'fetch'])->name('productfetch');
Route::post('product-store', [ProductController::class,'store'])->name('productstore');
Route::post('product-update', [ProductController::class,'update'])->name('productupdate');
Route::delete('product-delete/{id}', [ProductController::class,'destroy']);
Route::get('/product-edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::delete('/product-image-delete/{id}', [ProductController::class, 'deleteImage']);

Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');


Route::post('product-resource/store', [ProductController::class, 'ProductResourceStore'])->name('product-resource.store');
Route::get('product-resource/edit/{id}', [ProductController::class, 'ProductResourceEdit']);
Route::post('product-resource/update/{id}', [ProductController::class, 'ProductResourceUpdate']);
Route::delete('product-resource/delete/{id}', [ProductController::class, 'ProductResourceDestroy']);
Route::get('product-resource/{product}', [ProductController::class, 'index']);

// Wishlist
Route::post('/wishlist/toggle/{id}', [ProductController::class, 'wishlistToggle'])->name('wishlist.toggle');
Route::get('/wishlist/count', [ProductController::class, 'wishlistCount'])->name('wishlist.count');
// Auth
Route::middleware(['auth'])->group(function () {

    Route::post('/cart/add', [ProductController::class, 'addToCart'])->name('cart.add');
    Route::post('/address/save', [AuthController::class, 'AddressSave'])->name('address.save');
    Route::get('/address/edit/{id}', [AuthController::class, 'AddressEdit'])->name('address.edit');
    Route::post('/address/set-default', [AuthController::class, 'setDefault'])->name('address.setDefault');
    Route::post('/password/update', [AuthController::class, 'updatePassword'])->name('password.update.custom');
    Route::get('/wishlist', [FrontendController::class, 'WishlistPage'])->name('wishlistpage');
    Route::get('/cart', [FrontendController::class, 'Cartpage'])->name('cartpage');
    Route::get('/wishlist-data', [FrontendController::class, 'getWishlist'])->name('get.wishlist');
    Route::get('/cart-data', [ProductController::class, 'getCart'])->name('get.cart');
    Route::post('/cart/remove', [ProductController::class, 'RemoveCart'])->name('cart.remove');
    Route::post('/cart/update-qty', [ProductController::class, 'updateQuantity'])->name('cart.update.qty');
});
Route::post('/product/status-toggle', [ProductController::class, 'toggleStatus'])->name('product.status.toggle');
Route::get('/toggle-wishlist/{id}', [FrontendController::class, 'toggleWishlist'])->name('toggle-wishlist');
