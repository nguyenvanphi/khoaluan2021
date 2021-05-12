<?php

namespace App\Http\Controllers;

// use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
