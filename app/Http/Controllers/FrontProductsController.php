<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class FrontProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //カテゴリーデータ取得
        $categories = Category::orderBy('id')->get();
        //検索情報として空文字を渡す
        $request = '';

        $data=[
            'categories' => $categories,
            'request' => $request,
        ];

        return view('products.index',$data);

    }

    public function search(Request $request){

        $query = Product::query();

        //$request->input()で検索時に入力した項目を取得
        $categorySearchId = $request->input('category_id');
        $descriptionSearchWord = $request->input('description');

        //キーワードをスペースで区切って配列に入れなおす
        $overviewKeywords = preg_split('/[\p{Z}\p{Cc}]++/u', $descriptionSearchWord, -1, PREG_SPLIT_NO_EMPTY);

        // プルダウンメニューで指定なし以外を選択した場合、$query->whereで選択したものと一致するカラムを取得
        if ($request->has('category_id') && $categorySearchId != ('指定なし')) {
            $query->where('category_id', $categorySearchId)->get();
        }

        // キーワードの文字列を含むカラムを取得
        foreach($overviewKeywords as $key => $overviewKeyword){
            if ($overviewKeyword) {
                $query->where('description', 'like', '%'.self::escapeLike($overviewKeyword).'%')->get();
            }
        }

        //ユーザを1ページにつき10件ずつ表示
        $products = $query->paginate(15);

        //カテゴリー、受付状態のデータ取得
        $categories = Category::orderBy('id')->get();

        $data=[
            'categories' => $categories,
            'products' => $products,
            'request' => $request,
        ];

        return view('products.search',$data);
    }

    //LIKE SQLクエリのエスケープ処理
    public static function escapeLike($str) {
        return str_replace(['\\', '%', '_'], ['\\\\', '\%', '\_'], $str);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //カテゴリーデータ取得
        $categories = Category::orderBy('id')->get();
        //検索情報として空文字を渡す
        $request = '';

        $data=[
            'categories' => $categories,
            'request' => $request,
        ];

        return view('products.index',$data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
