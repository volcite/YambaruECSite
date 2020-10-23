<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class FrontUsersController extends Controller
{
    public function show($id)
    {
     
        //商品指定して取得
        $user = User::find($id);

        if (is_null($user)) {
            abort(404);
        }

        $data=[
            'user' => $user,
        ];

        return view('users.show',$data);
    }

    public function edit($id)
    {
        $user = User::find($id);

        if (is_null($user)) {
            abort(404);
        }

        $data=[
            'user' => $user,
        ];

        return view('users.edit',$data);
    }

    public function update(Request $request, $id)
    {
        
            // トランザクション開始
            \DB::beginTransaction();

            $user = User::find($id);

            $user->last_name = $request->last_name;
            $user->first_name = $request->first_name;
            $user->zipcode = $request->zipcode;
            $user->prefecture = $request->prefecture;
            $user->municipality = $request->municipality;
            $user->address = $request->address;
            $user->apartments = $request->apartments;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
           
            $user->save();

            // トランザクションの保存処理を実行
            \DB::commit();

            //ユーザ情報取得
            $id = $user->id;

            return redirect('/');

    }
}
