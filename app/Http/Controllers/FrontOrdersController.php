<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Order;
use App\OrderDetail;
use Illuminate\Support\Facades\Auth;


class FrontOrdersController extends Controller
{
    public function store(Request $request)
    {   

        //現在時刻の取得
        $time = new Carbon(Carbon::now());

        //ordersテーブルに保存する
        $order = new Order();
        $order->user_id = Auth::id();
        $order->order_date = $time;
        $order->save();

        $order_id = $order->order_id;

        //注文番号のをランダムな英数字列に決定
        $randOrderNumber = sha1( uniqid( mt_rand() , true )); 

        foreach($request->products as $product_id){
        $orderDetail = new OrderDetail();
        $orderDetail->products_id = $product_id;
        $orderDetail->order_id = $order_id;
        $orderDetail->shipmemt_status_id = 1;
        $orderDetail->order_detail_number = $randOrderNumber;
        $orderDetail->order_quantity = $request->quantity;
        $orderDetail->save();
        }
        
        return redirect('/');
    }
}
