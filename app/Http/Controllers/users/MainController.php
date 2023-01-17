<?php

namespace App\Http\Controllers\users;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class MainController extends Controller
{
    public function index(){
        $data = Product::orderBy('tanggal', 'asc')->get();

        $laba = Product::select(DB::raw("CAST(SUM(laba) as double) as laba"))
        ->GroupBy(DB::raw("Month(tanggal)"))
        ->orderBy('tanggal', 'asc')
        ->pluck('laba');

        $bulan = Product::select(DB::raw("MONTHNAME(tanggal) as bulan"))
        ->GroupBy(DB::raw("MONTHNAME(tanggal)"))
        ->orderBy('tanggal', 'asc')
        ->pluck('bulan');

        return view('users.dashboard.index', ['title' => 'Dashboard'], compact('data', 'laba', 'bulan'));
    }

    public function profile(){
        return view('users.profile.index', ['title' => 'Profile']);
    }
    
    public function proces(Request $request, $id){

        $candidate = User::find($id);

        $request->validate([
            'name' => 'required',
            'jenis_usaha' => 'required',
        ]);


        if ($request->file('img')) {
            if($request->oldimage) {
                File::delete(public_path('images/'. $candidate->img));
            }

                $request->validate([
                    'img' => 'required|file|image|mimes:jpeg,jpg,png'
                ]);
                $file = $request->file('img');
                $profileImage = date('YmdHis') . "." . $file->getClientOriginalExtension();
                $destinationPath = 'images/';
                $file->move($destinationPath, $profileImage);
                $candidate->img = $profileImage;

            }

        $candidate->name = $request->name;
        $candidate->jenis_usaha = $request->jenis_usaha;
        $candidate->update();

        return back()->with('profile', 'Profile telah diperbarui');
    }
}
