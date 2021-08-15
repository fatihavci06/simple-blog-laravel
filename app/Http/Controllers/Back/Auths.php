<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\Models\admin;
use Illuminate\Support\Facades\Auth;


class Auths extends Controller
{
    //
    public function login(){
        return view('back.auth.login');
    }
    public function loginpost(Request $req){
        
        if (Auth::attempt(['email' => $req->email, 'password' => $req->password])) {
    // Authentication was successful...
            toastr()->success('Başarılı',Auth::user()->name);
            return redirect()->route('admin.panel');

    }
        return redirect()->route('admin.login')->withErrors('Email adresi ve şifre hatalı');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('admin.login');
    }

}
