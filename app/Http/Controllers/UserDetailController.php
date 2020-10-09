<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserDetail;
use App\Jobs\ProcessPodcast;
use Illuminate\Support\Facades\Log;

class UserDetailController extends Controller
{
    public function store(Request $request)
    {
        $user = new UserDetail;

        $request->validate(
        [
            'fname'=> 'required',
            'lname'=> 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $user->f_name = $request->input('fname');
        $user->l_name = $request->input('lname');
        $user->email = $request->input('email');
        $user->password = $request->input('password');

        $user->save();

        Log::notice('user created');

        return response()->json([
            'msg'=>'new user created',
            'data'=>[
                'fname'=>$user->f_name,
                'lname'=>$user->l_name,
                'email'=>$user->email
            ]
        ]);
    }

    public function show(UserDetail $id)
    {
        return response()->json($id);
    }

    public function showAll()
    {
        $user = UserDetail::all();

        return response()->json($user);
    }

    public function remove(UserDetail $id)
    {
        $id->delete();

        return response()->json([]);

    }

}
