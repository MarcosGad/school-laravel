<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Translate all pages
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:teacher']
    ], function () {

    //dashboard
    Route::get('/teacher/dashboard', function () {
        return view('pages.Teachers.dashboard.dashboard');
    });

});
