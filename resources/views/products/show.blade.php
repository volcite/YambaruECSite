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


        @auth
        　　{!! Form::open(['route'=>'purchase', 'method' => 'post']) !!}
                <div class="justify-content-center form-inline">
                    <h5>購入個数</h5>
                    {!! Form::text('quantity',null,['class'=>'form-control form-inline ml-2', 'style'=>'width:50px']) !!}
                    <h5 class="ml-2">個</h5>
                    {!! Form::submit('カートに入れる',['class'=> 'text-center btn btn-primary form-inline ml-4']) !!}
                    {!! Form::close() !!}
                </div>
        @endauth

        

    </div>

@endsection