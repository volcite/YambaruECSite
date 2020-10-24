@extends('layouts.app')

@section('content')

    <div class="center">

        <div class="text-center text-dark">
            <h3>ユーザ情報画面</h3>
        </div>

        <div class="row">
            <div class="col-md-10 offset-md-2">

                <div class="row">
                    <div class="col-md-3 text-center">
                        <h6>氏名</h6>
                    </div>
                    <div class="col-md-9">
                        <h6>{{ $user->last_name }}　{{ $user->first_name }}</h6>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 text-center">
                        <h6>住所</h6>
                    </div>
                    <div class="col-md-9">
                        <h6>〒{{ $user->zipcode }}</h6>
                        <h6>{{ $user->prefecture }}{{ $user->municipality }}　{{ $user->address }}</h6>
                        <h6>{{ $user->apartments }}</h6>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 text-center">
                        <h6>電話番号</h6>
                    </div>
                    <div class="col-md-9">
                        <h6>{{ $user->phone_number }}</h6>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 text-center">
                        <h6>メールアドレス</h6>
                    </div>
                    <div class="col-md-9">
                        <h6>{{ $user->email }}</h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row justify-content-center mt-4">
            {!! link_to_route('users.edit','修正/退会する',['id'=>Auth::id()],['class'=>'btn btn-primary nav-link w-25']) !!}
        </div>

    </div>

@endsection