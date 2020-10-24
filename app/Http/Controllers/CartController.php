<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller,
    Session;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Category;

class CartController extends Controller
{
    public function index()
    {
        if (!session()->exists('order')) {

            $user = User::find(Auth::id());

            return view('products.cartNotFound',['user' => $user]);

        } else {
        
        $user = User::find(Auth::id());
        $categories = Category::orderBy('id')->get();
        $products = [];

        foreach(Session::get('order') as $order){
            $product = array('productInfo' => Product::find($order[0]), 'quantity' => $order[1]);
            $products[] = $product;
        }

        $data=[
            'user' => $user,
            'products' => $products,
            'categories' => $categories,
        ];

        return view('products.cart',$data);

        }
    }

    public function store(Request $request)
    {   
        $order = collect([$request->product_id, $request->quantity]);
        session()->push('order',$order);
        
        return redirect('/');
    }

    public function destroy($i)
    {   
        Session::forget('order.' . $i);

        return redirect('/carts');
    }
    
}
