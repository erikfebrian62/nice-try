<?php

namespace App\Http\Controllers\users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LaporanController extends Controller
{
    public function index(){
        return view('users.laporan.days');
    }
}
