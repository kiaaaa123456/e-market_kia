<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login()
    {
        if ($user = Auth::user()) {
            switch ($user->level) {
                case '1':
                    return redirect()->intended('/');
                    break;

                case '2':
                    return redirect()->intended('pembelian');
                    break;
            }
        }
        return view('auth.login');
    }

    public function logout(Request $request){
        Auth::logout();

        return redirect('/login');
    }
    
    public function ceklogin(AuthRequest $request)
    {
        $credential = $request->only('email', 'password');
        // dd($credential);
        $request->session()->regenerate();
        if (Auth::attempt($credential)) {
            $user = Auth::user();
            switch ($user->level) {
                case '1':
                    return redirect()->intended('/');
                    break;
                case '2':
                    return redirect()->intended('pembelian');
                    break;
            }
            return redirect()->intended('/');
        }
        return back()->withErrors([
            'nofound' => 'Email or Password is wrong'
        ])->onlyInput('email');
    }
}
