<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index()
    {
            return view('auth.login');
    }

    public function regPost(Request $r)
    {

        $r->validate([

             'name' => 'required|min:3',
             'email' => 'required|email|unique:users,email',
             'password' => 'required|min:8',


        ]);

        $input = new User();

        $input->name = $r->name;
        $input->email = $r->email;
        $input->password = Hash::make($r->password);

        $input->save();

        return back()->with('success', 'Register Successfull');
    }

    public function logPost(Request $r)
    {
        $r->validate([

            'email1' => 'required|email',
            'password1' => 'required|min:8',

       ]);

        $credentials = [
        'email' => $r->email1,
         'password' => $r->password1
          ];

          if(Auth::attempt($credentials)) {
          $r->session()->regenerate();
           return redirect('/homepage')->with('success', 'You have successfully logged in!');

           }

        return back()->with('error', 'Email or Password is wrong!');
    }

    public function logout()
    {


        Auth::logout();
        return redirect('/')->with('success', 'You are successfully logout!');


    }
}














