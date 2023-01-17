<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;


class PasswordController extends Controller
{
    //forgot password
   public function forgot_index(){
    return view('auth.password.forgot');
   }

   public function forgot_proces(Request $request){
    $request->validate([
        'email' => 'required|email:dns',
    ]);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    if ($status == Password::RESET_LINK_SENT) {
        return back()->with('status', 'Silahkan cek gmail anda.');
    }

    throw ValidationException::withMessages([
        'email' => [trans($status)],
    ]);
   }

   //reset password
   public function reset_index(Request $request){
    return view('auth.password.reset', ['request' => $request]);
   }

   public function reset_proces(Request $request){
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:5|confirmed',
    ]);
 
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
 
            $user->save();
 
            event(new PasswordReset($user));
        }
    );
 
    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login.index')->with('status', 'Password berhasil diubah')
                : back()->withErrors(['email' => [__($status)]]);
    }
}
