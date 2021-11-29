<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Traits\AuthTrait;



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


    use AuthTrait;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function loginForm($type){
        return view('auth.login',compact('type'));
    }

    public function login(Request $request){

        if (Auth::guard($this->chekGuard($request))->attempt(['email' => $request->email, 'password' => $request->password])) {
           return $this->redirect($request);
        }else {
           return redirect('/');
        }

    }

    public function logout(Request $request,$type)
    {
        Auth::guard($type)->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    
}
