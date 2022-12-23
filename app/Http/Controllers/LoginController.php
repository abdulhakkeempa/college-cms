<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function customLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        // dd(bcrypt($credentials['email']));
        // $user = DB::table('users')->where('email', $credentials['email'])->first();
        // dd(get_class($user));
        if (Auth::attempt($credentials)) {
            // $request->session()->regenerate();
            dd("Success");
            return redirect('/profile');
        }

        $x = Auth::attempt($credentials);
        dd($x);
 

        return redirect("/login")->withSuccess('Login details are not valid');
    }

}
