<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        if(Auth::check()){
            return redirect('admin/dashboard');
        } else{
            return view('login');
        }
    }

    public function actionLogin(Request $request)
    {
        $data = [
            'nis' => $request->input('nis'),
            'password' => $request->input('password')
        ];
        if(Auth::attempt($data)){
            return redirect('admin/dashboard');
        } else {
            return view('/login');
        }
    }

    public function actionLogout()
    {
        Auth::logout();
        return redirect('/');
    }
}
