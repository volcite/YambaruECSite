@extends('layouts.app')

@section('content')

    <div class="center">

        <div class="text-center text-dark">
            <h3>ユーザ情報画面</h3>
        </div>

        {{ $user->last_name }}
        {{ $user->first_name }}
        {{ $user->zipcode }}
        {{ $user->prefecture }}
        {{ $user->municipality }}
        {{ $user->address }}
        {{ $user->apartments }}
        {{ $user->email }}
        {{ $user->phone_number }}

        {!! link_to_route('users.edit','ユーザ情報修正',['id'=>Auth::id()],['class'=>'nav-link']) !!}

    </div>

@endsection