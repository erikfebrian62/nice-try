<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use PhpParser\Node\Stmt\ElseIf_;

class VerificationController extends Controller
{
    //tampilan
    public function notice(Request $request){
        return $request->user()->hasVerifiedEmail()
                    ? redirect()->intended(RouteServiceProvider::HOME)
                    : view('auth.verify.index');
    }

    //verifikasi
    public function verify(EmailVerificationRequest $request){
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::HOME);
        }
        
        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }


        return redirect()->intended(RouteServiceProvider::HOME)->with('notif', 'Akun berhasil diverifikasi');
    }       

    //kirim ulang link
    public function send(Request $request){
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('notif', 'Verification berhasil dikirim ulang.');
    }
}
