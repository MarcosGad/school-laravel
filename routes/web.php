<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Auth::routes();
Auth::routes(['register' => false]);


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function(){

        Route::get('/', function(){ return view('auth.login'); });

        Route::group(['middleware'=>['auth']],function(){

            Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
             
            //==============================dashboard============================
            Route::get('/dashboard', 'HomeController@index')->name('dashboard');

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
            Route::view('add_parent','livewire.show_Form');

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
            
        
        });
        
});


use Carbon\Carbon;
use Carbon\CarbonImmutable;
use App\Article;

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

    dd(App\User::where('id', 1)->exists());

});

Route::get('/users', 'UserController@index')->name('users.index');
Route::get('/users/{user}', 'UserController@show')->name('users.show');
Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit');
