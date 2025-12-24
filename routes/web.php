<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/home', [FrontendController::class, 'Homepage'])->name('homepage');
Route::get('/about', [FrontendController::class, 'Aboutpage'])->name('aboutpage');
Route::get('/contact', [FrontendController::class, 'Contactpage'])->name('contactpage');
Route::get('/newsletter', [FrontendController::class, 'Newsletterpage'])->name('newsletterpage');
Route::get('/wishlist', [FrontendController::class, 'WishlistPage'])->name('wishlistpage');
Route::get('/profile', [FrontendController::class, 'ProfilePage'])->name('profilepage');
Route::get('/login', [FrontendController::class, 'LoginPage'])->name('loginpage');
Route::get('/register', [FrontendController::class, 'RegisterPage'])->name('registerpage');
