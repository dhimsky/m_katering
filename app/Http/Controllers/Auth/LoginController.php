<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
        $user = Auth::user();
        if($user){
            if($user->role == 'merchant'){
                return redirect()->route('merchant.dashboard');
            }elseif($user->role == 'customer'){
                return redirect()->route('customer.home');
            }
        }
        return view('auth.login');
    }

    function login(Request $request){
        Session::flash('email', $request->input('email'));
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ],[
            'email.required' => 'Masukan email anda!',
            'password.required' => 'Masukan password email anda!',
        ]);

        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            $user = Auth::user();
            if($user->role == 'merchant'){
                return redirect()->route('merchant.dashboard')->with('toast_success','Selamat, anda berhasil masuk.');
            }elseif($user->role == 'customer'){
                return redirect()->route('customer.home')->with('toast_success','Selamat, anda berhasil masuk.');
            }
        }
        return redirect('/')->with('toast_error','Email atau Password yang dimasukkan tidak sesuai');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('toast_success', 'Berhasil keluar akun.');
    }
}
