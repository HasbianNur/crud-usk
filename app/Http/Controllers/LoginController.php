<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index()
    {
        $data = [
            'title'     => 'Form Login'
        ];
        return view('login', $data);
    }

    public function actionlogin(Request $request)
    {
        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password')
        ];

        if(Auth::attempt($data)){
            return redirect('home');
        } else {
            $request->session()->flash('error', 'Email atau Password salah');
            return redirect('/login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
        // Session::flush();
    }
}
