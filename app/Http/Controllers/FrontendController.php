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
}
