<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login_view()
    {
        return view('Login_page');
    }
    public function login_post(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();
            if (Auth::user()->hasRole('user')) {
                return redirect()->route('surat_masuk');
            }
            elseif(Auth::user()->hasRole('admin')){
                return redirect()->route('beranda');
            }
            else {

                Auth::guard('web')->logout();

                $request->session()->invalidate();

                $request->session()->regenerateToken();

                $request->session()->flush();

                return redirect()->back()->withErrors([
                    'email' => 'Anda bukan Admin',
                ])->withInput();

            }
        }

        return back()->withErrors([
            'email' => 'Kami tidak menemukan akun anda.',
        ])->withInput();
    }
    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect()->route('login_view');
    }
}
