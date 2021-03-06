<?php
use Illuminate\Support\Facades\Route;

// use Illuminate\Support\Facades\Auth;
// Auth::routes();
// Auth::routes(['register' => false]);

Route::get('/', 'HomeController@index')->name('selection');
Route::group(['namespace' => 'Auth'], function () {
    Route::get('/login/{type}','LoginController@loginForm')->middleware('guest')->name('login.show');  
    Route::post('/login','LoginController@login')->name('login');
    Route::get('/logout/{type}', 'LoginController@logout')->name('logout');
});


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function(){

        // Route::get('/', function(){ return view('auth.login_old'); });

        Route::group(['middleware'=>['auth']],function(){

            // Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
             
            //==============================dashboard============================
            Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

            //==============================dashboard============================
            Route::group(['namespace' => 'Grades'], function () {
                Route::resource('Grades', 'GradeController');
            });

            //==============================Classrooms============================
            Route::group(['namespace' => 'Classrooms'], function () {
                Route::resource('Classrooms', 'ClassroomController');
                
                Route::post('delete_all', 'ClassroomController@delete_all')->name('delete_all');
                Route::get('Filter_Classes', 'ClassroomController@Filter_Classes')->name('Filter_Classes');
            });

            //==============================Sections============================
            Route::group(['namespace' => 'Sections'], function () {
                Route::resource('Sections', 'SectionController');
                Route::get('/classes/{id}', 'SectionController@getclasses');
            });

            //==============================parents============================
            Route::view('add_parent','livewire.show_Form')->name('add_parent');

            //==============================Teachers============================
            Route::group(['namespace' => 'Teachers'], function () {
                Route::resource('Teachers', 'TeacherController');
            });

            //==============================Students============================
            Route::group(['namespace' => 'Students'], function () {
                Route::resource('Students', 'StudentController');
                Route::get('/Get_classrooms/{id}', 'StudentController@Get_classrooms');
                Route::get('/Get_Sections/{id}', 'StudentController@Get_Sections');
                Route::post('Upload_attachment', 'StudentController@Upload_attachment')->name('Upload_attachment');
                Route::get('Download_attachment/{studentsId}/{filename}', 'StudentController@Download_attachment')->name('Download_attachment');
                Route::post('Delete_attachment', 'StudentController@Delete_attachment')->name('Delete_attachment');
                Route::resource('Graduated', 'GraduatedController');
                Route::resource('Promotion', 'PromotionController');

                Route::resource('Fees', 'FeesController');
                Route::post('showS', 'FeesController@showS')->name('Fees.showS');

                Route::resource('Fees_Invoices', 'FeesInvoicesController');
                Route::resource('receipt_students', 'ReceiptStudentsController');
                Route::resource('ProcessingFee', 'ProcessingFeeController');
                Route::resource('Payment_students', 'PaymentController');
                Route::resource('Attendance', 'AttendanceController');
                
                Route::resource('online_classes', 'OnlineClasseController');
                Route::get('/indirect', 'OnlineClasseController@indirectCreate')->name('indirect.create');
                Route::post('/indirect', 'OnlineClasseController@storeIndirect')->name('indirect.store');

                Route::get('download_file/{filename}', 'LibraryController@downloadAttachment')->name('downloadAttachment');
                Route::resource('library', 'LibraryController');
            });

            //==============================Subjects============================
            Route::group(['namespace' => 'Subjects'], function () {
                Route::resource('subjects', 'SubjectController');
            }); 

            //==============================Exams============================
            Route::group(['namespace' => 'Exams'], function () {
                Route::resource('Exams', 'ExamController');
            });

            //==============================Quizzes============================
            Route::group(['namespace' => 'Quizzes'], function () {
                Route::resource('Quizzes', 'QuizzController');
            });

            //==============================questions============================
            Route::group(['namespace' => 'questions'], function () {
                Route::resource('questions', 'QuestionController');
            });

            //==============================Setting============================
            Route::resource('settings', 'SettingController');
        
        });
        
});


use Carbon\Carbon;
use Carbon\CarbonImmutable;
use App\Article;

use AshAllenDesign\LaravelExchangeRates\Classes\ExchangeRate;
use Illuminate\Support\Facades\Http;
use App\RunningNumber;
use Illuminate\Support\Str;

Route::get('test', function(){



    // $user = App\User::find(1);
    // $created = $user->created_at;
    
    // echo $created . '<br />';

    // if($created->addYears(1)->lte(now())){
    //     echo 'Yes';
    // }else {
    //     echo 'Not';
    // }
    // dump($created);


    //https://carbon.nesbot.com/docs/#api-getters
    // $mutable = Carbon::now();
    // $immutable = CarbonImmutable::now();
    // //dd($mutable, $immutable);
    // $carbon = new Carbon(new DateTime('first day of January 2008'), new DateTimeZone('Africa/Cairo'));
    // //dd($carbon);


    //Cache::

    //dd(App\User::where('id', 1)->exists());

    //https://ashallendesign.co.uk/blog/how-to-get-currency-exchange-rates-in-laravel
    //https://github.com/ash-jc-allen/laravel-exchange-rates
    //$response = Http::get('http://api.exchangeratesapi.io/v1/latest?access_key=3d4ea89988945b324591b69ae0cc9673&symbols=USD,AUD,CAD,PLN,MXN&format=1');
    //return $response->json();

    //https://techsolutionstuff.com/post/how-to-convert-php-array-to-json-object
    // $colors = ['Red', 'Green', 'Blue'];
    // $colorsJSONObject = json_encode($colors, JSON_FORCE_OBJECT);
    // echo $colorsJSONObject;



    // namespace App\Models;
    // use Illuminate\Database\Eloquent\Model;
    // class Submission extends Model
    // {
    //     protected static function booted()
    //     {
    //         static::creating(function ($submission) {
    //             $submission->case_id = RunningNumber::generate($submission->type);
    //         });
    //     }
    // }
    //dd(RunningNumber::generate('approval'));
    //dd(RunningNumber::generate('mod'));

    // $collection = collect([1, 2, 3]);
    // $piped = $collection->pipe(function ($collection) {
    //     return $collection->sum();
    // });
    // dd($piped); // 6

    // function WelcomeMsg()
    // {
    //     echo "Welcome to GeeksforGeeks";
    // }
    // // checking if the function named WelcomeMsg
    // // exists or not
    // if (function_exists('WelcomeMsg')) 
    // {
    //     echo "function is available.\n";
    // } 
    // else
    // {
    //     echo "function is not available.\n";
    // }

    // $plural1 = Str::plural('boy');        
    // dd($plural1);

    // $converted2 = Str::kebab('niceBlog');
    // dd($converted2);

    // $orderId = 123;
    // return [
    //     'type' => gettype($orderId),
    //     'value' => $orderId,
    // ];

});

Route::get('/users', 'UserController@index')->name('users.index');
Route::get('/users/{user}', 'UserController@show')->name('users.show');
Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit');
