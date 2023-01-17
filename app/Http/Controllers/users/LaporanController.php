<?php

namespace App\Http\Controllers\users;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function index(){
        $data = Product::where('user_id', Auth::user()->id)
        ->orderBy('tanggal', 'desc')
        ->paginate(10)->get();
        return view('users.laporan.pdf', compact('data'));
    }
}
