<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function chek(Request $req){
        $req->validate([
            'username' => 'required | max:10',
            'usermail' => 'required',
            'password' => 'required | min:5'
        ]);
        $data = $req->input('username');
        $req ->session()->flash('user1',$data);


        $user = new User();
        $user->name = $req->username;
        $user->email = $req->usermail;
        $user->password = Hash::make($req->password);
        $user->save();
        return view('welcome');
    }
    
    function login(Request $req){
        //echo 'From login functioin';
        $user = User::where(['email'=>$req->email])->first();
        if(!$user || !Hash::check($req->password,$user->password))
        {
                return "User name or password is not matched";
        }
         else{
            $data = $req->input('email');
            $req ->session()->flash('user1',$data);
                    return view('welcome');
    }

    }







}
