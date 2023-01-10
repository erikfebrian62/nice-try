<?php

namespace App\Http\Controllers\users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CalculateController extends Controller
{
    public function index(){
        return view('users.calculate.index', ['title' => 'Calculate-profit']);
    }
}
