<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //
    public function Aboutpage(){
        return view("pages.about");
    }
    public function HomePage(){ return view('index');}
    public function Contactpage(){
        return view("pages.contact");
    }
    public function Newsletterpage(){
        return view("pages.newsletter");
    }
    public function WishlistPage(){
        return view("pages.wishlist");
    }
    public function ProfilePage(){
        return view("pages.profile");
    }
    public function LoginPage(){ return view('pages.login');}
    public function RegisterPage(){ return view('pages.register');}


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

}
