<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//Translate all pages
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:student']
    ], function () {

    //dashboard
    Route::get('/student/dashboard', function () {
        return view('pages.Students.dashboard');
    });

});
