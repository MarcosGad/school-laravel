<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



class LoginController extends Controller
{
    //use AuthenticatesUsers;
    //protected $redirectTo = RouteServiceProvider::HOME;
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }
    // public function logout(Request $request) {
    //     Auth::logout();
    //     return redirect('/');
    // }


    
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function loginForm($type){
        return view('auth.login',compact('type'));
    }

    
}
