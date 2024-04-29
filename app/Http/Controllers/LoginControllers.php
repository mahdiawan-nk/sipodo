<?php

namespace App\Http\Controllers;

use App\Models\RoleModels;
use App\Models\UsersModels;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginControllers extends Controller
{
    public function index()
    {
        return view("login");
    }

    public function authLogin(Request $request)
    {
        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        // dd($infologin);
        // $credentials = $request->only('email', 'password');
        if (Auth::attempt($infologin)) {
            $user = Auth::user();
            // P3M
            if ($user->id_role == 1) {
                session(['user' => $user]);
                return redirect('/profile-super-admin');
            }
            // Dosen
            elseif ($user->id_role == 2) {
                session(['user' => $user]);
                return redirect('/profile-dosen');
            }
            // Direksi
            elseif ($user->id_role == 3) {
                session(['user' => $user]);
                return redirect('/profile-direksi');
            } else {
                Auth::logout();
                Session::forget('user');
                return redirect('/')->withErrors('Anda tidak diizinkan masuk')->withInput();
            }

        } else {
            return redirect('/')->withErrors('Email atau Password yang dimasukkan salah')->withInput();
        }
    }

    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password') + ['active' => 1];
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Session::forget('user');
        return redirect('/');
    }
}
