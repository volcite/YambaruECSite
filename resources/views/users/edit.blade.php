@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center text-dark">
                <h3>ユーザ情報修正</h3>
            </div>

            {!! Form::open(array('route' => array('users.update', $user->id), 'method' => 'put')) !!}
                @csrf

                <div class="form-group row mt-5">
                    <div class="text-center col-md-2">
                        <h6>氏名</h6>
                    </div>
                    <div class="col-md-2 text-right">
                        <label for="last_name" class="col-form-label text-md-right">{{ __('姓') }}</label>
                    </div>

                    <div class="col-md-8 form-inline">
                        <input id="last_name" type="text" style="width:40%" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $user->last_name }}" required autocomplete="last_name" autofocus>

                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
                        <label for="first_name" class="ml-4 mr-3 col-form-label text-md-right">{{ __('名') }}</label>
                        <input id="first_name" type="text" style="width:40%" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ $user->first_name }}" required autocomplete="first_name" autofocus>
                        @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                </div>


                <div class="form-group row">

                    <div class="text-center col-md-2">
                        <h6>住所</h6>
                    </div>

                    <div class="col-md-2 text-right">
                        <label for="zipcode" class="col-form-label text-md-right">{{ __('〒') }}</label>
                    </div>

                    

                    <div class="col-md-8">
                        <input id="zipcode" type="text" class="form-control @error('zipcode') is-invalid @enderror" name="zipcode" value="{{ $user->zipcode }}" required autocomplete="zipcode" autofocus>

                        @error('zipcode')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">

                    <div class="text-center col-md-2">
                    </div>

                    <div class="col-md-2 text-right">
                        <label for="prefecture" class="col-form-label text-md-right">{{ __('都道府県') }}</label>
                    </div>

                    <div class="col-md-8">
                        <input id="prefecture" type="text" class="form-control @error('prefecture') is-invalid @enderror" name="prefecture" value="{{ $user->prefecture }}" required autocomplete="prefecture" autofocus>

                        @error('prefecture')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">

                    <div class="text-center col-md-2">
                    </div>

                    <div class="col-md-2 text-right">
                        <label for="municipality" class="col-form-label text-md-right">{{ __('市町村区') }}</label>
                    </div>

                    <div class="col-md-8">
                        <input id="municipality" type="text" class="form-control @error('municipality') is-invalid @enderror" name="municipality" value="{{ $user->municipality }}" required autocomplete="municipality" autofocus>

                        @error('municipality')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">

                    <div class="text-center col-md-2">
                    </div>

                    <div class="col-md-2 text-right">
                        <label for="address" class="col-form-label text-md-right">{{ __('番地') }}</label>
                    </div>
                    
                    <div class="col-md-8">
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $user->address }}" required autocomplete="address" autofocus>

                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">

                    <div class="text-center col-md-2">
                    </div>

                    <div class="col-md-2 text-right">
                        <label for="apartments" class="col-form-label text-md-right">{{ __('マンション') }}</label>
                    </div>
                    
                    <div class="col-md-8">
                        <input id="apartments" type="text" class="form-control @error('apartments') is-invalid @enderror" name="apartments" value="{{ $user->apartments }}" required autocomplete="apartments" autofocus>

                        @error('apartments')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">

                    <div class="text-left col-md-3">
                        <label for="email" class="col-form-label text-md-right">{{ __('メールアドレス') }}</label>
                    </div>

                    <div class="col-md-1 text-right">
                    </div>

                    <div class="col-md-8">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">

                    <div class="text-center col-md-2">
                        <label for="phone_number" class="col-form-label text-md-right">{{ __('電話番号') }}</label>
                    </div>

                    <div class="col-md-2 text-right">
                    
                    </div>

                    <div class="col-md-8">
                        <input id="phone_number" type="phone_number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ $user->phone_number }}" required autocomplete="phone_number">

                        @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row">

                    <div class="text-center col-md-6">
                        {!! Form::submit('修正',['class'=> 'btn btn-primary w-25']) !!}
                    </div>

            {!! Form::close() !!}

                    <div class="text-center col-md-6">
                        @if(Auth::id() == $user->id)
                            {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                                {!! Form::submit('退会', ['class' => 'btn btn-danger w-25']) !!}
                            {!! Form::close() !!}
                        @endif
                    </div>

                </div>
        </div>
    </div>
</div>
@endsection