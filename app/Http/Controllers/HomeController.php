<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Response;



class HomeController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }

  
    public function index(Request $request)
    {
        return view('dashboard');

        // $Students = Student::withCount('attendance')->get()->toArray();
        // $data_one = DB::table('nationalities')->skip(4)->take(6)->get();;
        // $data_two =DB::table('nationalities')->offset(4)->take(6)->get();;
        // DD($data_one,$data_two);

        // $requestId = Str::uuid();
        // dd($requestId);

        /*
        https://stackoverflow.com/questions/45207485/how-to-set-and-get-cookie-in-laravel
        https://www.tutorialspoint.com/laravel/laravel_cookie.htm
        */

        // $minutes = 60;
        // $response = new Response('Set Cookie');
        // $response->withCookie(cookie('name', 'MyValue', $minutes));
        // return $response;

        // $minutes = 1;
        // $response = new Response('Set Cookie');
        // $response->withCookie(cookie('nameTwo', 'MyValueTwo', $minutes));
        // return $response;
        
        // $value = $request->cookie('nameTwo');
        // echo $value;


        // $Stud = Student::where('gender_id', true)->get();
        // $Stud = Student::where('gender_id', false)->get();
        // $Stud = Student::where('gender_id', '<>' ,false)->get(); == true

    }
}