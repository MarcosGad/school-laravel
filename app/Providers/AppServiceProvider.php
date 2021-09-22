<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Blade;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Validator::extend('test',function($attribute, $value, $parameters){
        //     if(is_array($value) && count($value) > 0){
        //         foreach($value as $data){
        //             return 'foo' === $data;
        //         }
        //         return false;
        //     }else {
        //         return 'foo' === $value;
        //     }
        // },'هذه الكلمة يجب ان تكون foo');

    }
}
