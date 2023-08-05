<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class PagesController extends Controller
{
    //

    public function index()
    {

       if (Auth::check())
       {
            return view('auth.credentialsPage.homepage');
       }
        return redirect('/');
    }

    public function profile()
    {

       if (Auth::check())
       {
            $user = User::all();
            return view('auth.credentialsPage.profile', compact('user'));
       }
        return redirect('/');
    }

    public function changeP(Request $request, $id)
    {
       if (Auth::check())
       {
            $update = User::findOrFail($id);

            $update->update($request->all());

            return redirect('/profile')->with('success', 'Success to change!');
       }
        return redirect('/');
    }
}
