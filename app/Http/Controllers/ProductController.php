<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $cartTotalQuantity = \Cart::getTotalQuantity();
        return view('welcome', compact('products','cartTotalQuantity'));
    }
}
