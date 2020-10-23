@extends('layouts.app')

@section('content')

    <div class="center">

        <div class="text-center text-dark">
            <h3>商品検索画面</h3>
        </div>

        {!! Form::open(['route'=>'search', 'method' => 'get']) !!}

            <div class="row">

                <div class="col-md-6 offset-md-1">
                    <div class="form-group mt-4">

                        <div class="form-inline">
                            <h6 class="">キーワード検索</h6>
                            {!! Form::text('description',null,['class'=>'form-control ml-2', 'style'=>'width:75%']) !!}
                        </div>

                        <div class="form-inline mt-3">
                            <h6 class="">商品カテゴリ</h6>
                            <select type="text" class="ml-4" name="category_id" style='width:60%'>
                                <option hidden>未選択</option>
                                @foreach($categories as $key=>$category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
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
        
    </div>

@endsection