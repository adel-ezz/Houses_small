<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{
    ///=======main dashboard========///
    function index()
    {
        return view('admin.home',['title'=>trans('dashboard')]);
    }

    ////===============Login Page===========/////
    function login(){
        if (Auth::check() && Auth::user()->type !='user')
        {
            return redirect('/');
        }
        return view('admin.login');
    }
}
