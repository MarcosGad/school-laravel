<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Response;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Illuminate\Support\Facades\App;



class HomeController extends Controller
{
   
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        return view('auth.selection');
    }

    public function dashboard(Request $request)
    {
        //return view('dashboard');

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


        //https://github.com/LaravelDaily/laravel-charts
        $chart_options = [
            'chart_title' => 'Users',
            'report_type' => 'group_by_date',
            'model' => 'App\User',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
            'chart_color' => 'black'
        ];
        $chart1 = new LaravelChart($chart_options);

        // $current = url()->current();
        // $full = url()->full();
        // $previous = url()->previous();
        // dd($full);
        // return abort(403, 'sayyyyyyyyyyyyyyyyyy.');

        // https://laravel.com/docs/8.x/helpers#method-blank
        // return blank(collect());

        // $value = config('app.timezone');
        // dd($value);

        // $environment = App::environment();
        // dd($environment);


        $disktotal = disk_total_space('/'); //DISK usage
        $disktotalsize = $disktotal / 1073741824;
        $diskfree  = disk_free_space('/');
        $used = $disktotal - $diskfree;
        $diskusedize = $used / 1073741824;
        $diskuse1   = round(100 - (($diskusedize / $disktotalsize) * 100));
        $diskuse = round(100 - ($diskuse1)) . '%';

        //return Str::random(60);

        return view('dashboard', compact('chart1','diskuse','disktotalsize','diskusedize'));

    }
}