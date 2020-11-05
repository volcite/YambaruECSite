<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $cart_items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart){
        //oldCartを用いてインスタンスが生成されたなら
    	if($oldCart){
            //新しいインスタンスにそれぞれ代入する
    		$this->cart_items =$oldCart->cart_items;
    		$this->totalQty = $oldCart->totalQty;
    		$this->totalPrice = $oldCart->totalPrice;
    	}
    }

    public function add(Product $product, $quantity){
        //配列を変数に代入
    	$storedProduct =['product'=>$product, 'quantity' => $quantity];

        if($this->cart_products){
        //idがcart_itemに存在する場合、
    		if(array_key_exists($product->id,$this->cart_products)){
                //元々のcart_itemsを変数に代入する
    			$storedProduct =$this->cart_products[$product->id];
    		}
        }

        //保存するItemの情報をインスタンスに代入する
    	$this->cart_items[$product->id] = $storedProduct;

    }
    
    //カートの指定の商品群の数量を1増やすメソッド
    public function increaseByOne($id){
        //1を足す
        $this->cart_items[$id]['qty']++;
        //cartの指定のitemの合計金額から、取得するitemの金額を足す
        $this->cart_items[$id]['price']+= $this->cart_items[$id]['item']['price'];
        //1を足す
        $this->totalQty++;
        //cart内の合計金額から、取得するitemの金額を足す
        $this->totalPrice+=$this->cart_items[$id]['item']['price'];

        //cartのidのitemの量が0以下なら、指定の変数を破棄する
        if($this->cart_items[$id]['qty']<=0){
            unset($this->cart_items[$id]);
        }
    }

}
