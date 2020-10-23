@extends('layouts.app')

@section('content')

    <div class="center">

        <div class="text-center">
            <h4>商品情報</h4>
            <h5>{{ $product->product_name }}</h5>
        </div>

        <div class="text-right mt-2">
            @foreach($categories as $key=>$category)
                @if((!empty($product->category_id) && $product->category_id == $category->id))
                    <h5>商品カテゴリ：{{ $category->category_name }}</h5>
                @endif
            @endforeach
        </div>

        <div class="mt-4">
            <h5>商品説明</h5>
            <h6>{{ $product->description }}</h6>
            <h5 class="mt-4">価格：{{ $product->price }}円</h5>
        </div>
        

    </div>

@endsection