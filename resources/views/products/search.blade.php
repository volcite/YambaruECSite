@extends('layouts.app')

@section('content')

    <div class="center">

        <div class="text-center text-dark">
            <h3>商品検索画面</h3>
        </div>

        {!! Form::open(['route'=>'search', 'method' => 'get']) !!}

            <div class="row">
                <div class="col-md-6 offset-md-1 ">
                    <div class="form-group mt-4">
                        <div class="form-inline">
                            <h6 class="">キーワード検索</h6>
                                @if($request->input('description'))
                                    {!! Form::text('description', htmlspecialchars($request->description) ,['class'=>'form-control ml-2', 'style'=>'width:75%']) !!}
                                @else
                                    {!! Form::text('description',null,['class'=>'form-control ml-2', 'style'=>'width:75%']) !!}
                                @endif
                        </div>

                        <div class="form-inline">
                            <p class="">商品カテゴリ</p>
                            <select type="text" class="ml-4" name="category_id" style='width:60%'>
                                <option hidden>未選択</option>
                                @foreach($categories as $key=>$category)
                                    @if((!empty($request->category_id) && $request->category_id == $category->id) || old('category_id') == $category->id )
                                        <option value="{{ $category->id }}" selected>{{ $category->category_name }}</option>
                                    @else
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-5 mt-4">
                    <div class="text-left">
                        {!! Form::submit('検索',['class'=> 'text-center btn btn-primary']) !!}
                    </div>
                </div>
            </div>
        {!! Form::close() !!}

        <div class="row bg-warning border">
            <div class="col-md-5">
                <h4 class="mt-1">商品</h4>
            </div>
            <div class="col-md-3">
                <h4 class="mt-1">商品カテゴリ</h4>
            </div>
            <div class="col-md-4">
                <h4 class="mt-1">値段</h4>
            </div>
        </div>

        @foreach($products as $product)
        <div class="row border">
            <div class="col-md-5">
                <h5 class="mt-2">{{ $product->product_name }}</h5>
            </div>
            <div class="col-md-3">
                @foreach($categories as $key => $category)
                    @if($category->id == $product->category_id)
                        <h5 class="mt-2">{{ $category->category_name }}</h5>
                    @endif
                @endforeach
            </div>
            <div class="col-md-2">
                <h5 class="mt-2">{{ $product->price }}円</h5>
            </div>
            <div class="col-md-2">
                {!! link_to_route('products.show','商品詳細',['id'=>$product->id],['class'=>'btn btn-primary mt-1 mb-1']) !!}
            </div>
        </div>
        @endforeach

        <div class="d-flex justify-content-center mt-5">
            {{ $products->appends(request()->input())->links() }}
        </div>

    </div>

@endsection