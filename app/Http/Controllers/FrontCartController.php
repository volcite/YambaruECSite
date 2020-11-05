<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller,
    Session;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Category;
use App\Cart;



class FrontCartController extends Controller
{
    public function index()
    {
        //セッションにデータが存在するか判定
        if (!Session::has('cart')) {

            $user = User::find(Auth::id());
            return view('products.cartNotFound',['user' => $user]);

        } else {
        
        $user = User::find(Auth::id());
        $categories = Category::orderBy('id')->get();
    
        //指定のsession変数を変数に代入
        $oldCart = Session::get('cart');
        //インスタンスを生成する
        $cart = new Cart($oldCart);

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
        $product = Product::find($request->product_id);
        // sessionが変数cartを持つなら、変数に代入し、ないならnullを代入
        $oldCart = Session::has('cart')? Session::get('cart'): null;
        //古いカート情報よりインスタンスを生成
        $cart = new Cart($oldCart);
        
        //Cart.phpのadd関数を使用
    	$cart->add($product, $request->quantity);
        
        //sessionに変数を保存
    	$request->session()->put('cart', $cart);
        //セッションに保存する
        session()->push('cart',$cart);
        
        return redirect('/');
    }

    public function destroy($i)
    {   
        //セッションのデータ削除
        Session::forget('order.' . $i);

        return redirect('/carts');
    }
    
}
