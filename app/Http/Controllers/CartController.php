<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $total=\Cart::getTotal();
        $items = \Cart::getContent();
        $cartTotalQuantity = \Cart::getTotalQuantity();
        return view('cart', compact('items','total','cartTotalQuantity'));
    }

    public function addCart($productId){
        // if(!Auth::check()){
        //     return redirect()->route('login');
        // }

        // $userId = Auth::user()->id;
        $product = Product::find($productId);

        \Cart::add(array(
            'id' => $product->id,
            'price' => $product->price,
            'name' => $product->title,
            'quantity' => 1,
            'attributes' => array(
                'image' => $product->image,
            ),
            'associatedModel' => $product
        ));

        return redirect()->route('cart.index')->with('success', 'Product added to cart successfully !');


    }

    public function addQuantity($productId){
        \Cart::update($productId,[
            'quantity' => +1,
        ]);

        return redirect()->back()->with('success', 'Product quantity updated successfully!');
    }


    public function subQuantity($productId){
        \Cart::update($productId,[
            'quantity' => -1
        ]);

        return redirect()->back()->with('success', 'Product quantity updated successfully!');
    }

    public function cartRemove($productId){
        \Cart::remove($productId);

        return redirect()->back()->with('success', 'Product remove  successfully!');
    }

    public function removeAll(){
        \Cart::clear();
        return redirect()->back()->with('success', 'All Product remove successfully !');
    }
}
