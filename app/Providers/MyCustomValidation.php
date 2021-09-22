<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class MyCustomValidation extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('test',function($attribute, $value, $parameters){
            if(is_array($value) && count($value) > 0){
                foreach($value as $data){
                    return 'foo' === $data;
                }
                return false;
            }else {
                return 'foo' === $value;
            }
        },'هذه الكلمة يجب ان تكون foo');
    }
}
