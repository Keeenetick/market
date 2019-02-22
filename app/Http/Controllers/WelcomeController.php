<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Auth;
class WelcomeController extends Controller
{
    public function index()
    {
    	$products = Product::is_published();
    	return view('welcome',compact('products'));
    }
}
