<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function login(Request $request) {
        
        // return $request->input();
        $user = User::where(['email'=>$request->email])->first();

        // return $user->password;

        if(!$user || !Hash::check($request->password,$user->password))
        {
            return "UserName and Password Are Not Valid";
        }
        else
        {
            $request->session()->put('user',$user);
            return redirect('/products');
        }
    }

    function register(Request $request) {

        // return $request->input();
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('/login');
   }
}
