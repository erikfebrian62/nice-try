<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //register
    public function register_index()
    {
        return view('auth.register.index');
    }

    public function register_proces(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'jenis_usaha' => 'required',
            'password' => 'required|min:5|max:255'
        ]);
        
        $User = User::create([
            'img' => 'user.png',
            'name' => $request->name,
            'email' => $request->email,
            'jenis_usaha' => $request->jenis_usaha,
            'password' => Hash::make($request->password),
        ]);
        $User->save();

        event(new Registered($User));

        auth()->login($User);

        return redirect(route('verification.notice'))->with('berhasil', 'Akun berhasil dibuat, silahkan verifikasi email anda');
    }

    //login
    public function login_index()
    {
        return view('auth.login.index');
    }

    public function login_proces(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {

            if(Auth::check() && Auth::user()->email_verified_at === 'NULL'){

                return redirect(route('verification.notice'))->with('verify','Verifikasi terlebih dahulu!!!');

            }else{

                $request->session()->regenerate();
     
                return redirect()->intended(route('dashboard'))->with('success', 'Selamat datang di web kami');
            }
        }
        return back()->with('error', 'Email atau Password salah');
    }

}
