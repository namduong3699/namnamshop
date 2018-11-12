<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Catalog;
use App\Product;
use App\User;

class UserController extends Controller
{
    //
    public function index(){
    	return view('index');
    }

    public function about(){
    	return view('about');
    }
    public function contact(){
    	return view('contact');
    }
    
    public function product(){
    	return view('product_user');
    }
    public function shopingcart(){
    	return view('shoping-cart');
    }
    public function blog(){
    	return view('blog');
    }
    public function blogdetail(){
    	return view('blog-detail');
    }
    public function productdetail(){
    	return view('product-detail');
    }
}
