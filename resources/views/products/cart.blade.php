@extends('layouts.app')

@section('content')

    <div class="center">

        <div class="float-center">

            <div class="card">
                <h5 class="ml-5">お届け先</h5>
                    <div class="row">
                        <div class="text-right col-md-2">
                            <h5>〒{{ $user->zipcode}}</h5>
                        </div>
                        <div class="text-left col-md-10">
                            <h5>{{ $user->prefecture}}{{ $user->municipality }}　{{ $user->address}}　{{ $user->apartments }}</h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="text-left col-md-2 offset-md-2">
                            <h5>{{ $user->last_name}}　{{ $user->first_name }}　様</h5>
                        </div>
                        
                    </div>
            </div>
    
            <div class="row mt-5">
                <div class="text-center border-top border-bottom col-md-1">
                    <h5>No</h5>
                </div>
                <div class="border-top border-bottom col-md-3">
                    <h5>商品名</h5>
                </div>
                <div class="border-top border-bottom col-md-2">
                    <h5>商品カテゴリ</h5>
                </div>
                <div class="text-center border-top border-bottom col-md-1">
                    <h5>値段</h5>
                </div>
                <div class="text-center border-top border-bottom col-md-2">
                    <h5>個数</h5>
                </div>
                <div class="text-center border-top border-bottom col-md-2">
                    <h5>小計</h5>
                </div>
                <div class="col-md-1">
                </div>
            </div>

            

            <?php $i = 0; ?>
            @foreach($products as $product)
                <?php $i = $i+1; ?>
                <div class="row mt-1">

                    <div class="text-center col-md-1">
                        <h5>{{ $i }}</h5>
                    </div>

                    <div class="col-md-3">
                        <h5>{{ $product['productInfo']->product_name }}</h5>
                    </div>

                    <div class="col-md-2">
                        @foreach($categories as $key => $category)
                            @if($category->id == $product['productInfo']->category_id)
                                <h5>{{ $category->category_name }}</h5>
                            @endif
                        @endforeach
                    </div>

                    <div class="text-center col-md-1">
                        <h5>{{ $product['productInfo']->price }}円</h5>
                    </div>

                    <div class="justify-content-center form-inline col-md-2">
                        {!! Form::text('quantity',$product['quantity'],['class'=>'form-control form-inline', 'style'=>'width:50px']) !!}個
                    </div>

                    <div class="text-center col-md-2">
                        <h5>{{ $product['productInfo']->price * $product['quantity'] }}円</h5>
                    </div>

                    <div class="col-md-1">
                        {!! Form::open(['route' => ['carts.destroy', $i-1], 'method' => 'delete']) !!}
                            {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
                
            @endforeach


           
      

        </div>

    </div>

@endsection