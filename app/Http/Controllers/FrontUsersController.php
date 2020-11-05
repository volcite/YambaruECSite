<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use App\User;

class FrontUsersController extends Controller
{
    public function show($id)
    {
     
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

    public function update(CreateUserRequest $request, $id)
    {
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

        //ユーザ情報取得
        $id = $user->id;

        return redirect('/');

    }

    public function destroy($id)
    {
        $user = User::find($id);

        if (\Auth::id() == $user->id) {
            $user->delete();
        }

        return redirect('/');
    }
}
