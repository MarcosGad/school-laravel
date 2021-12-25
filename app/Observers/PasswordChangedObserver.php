<?php

namespace App\Observers;

use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordChangedNotificationMail;

class PasswordChangedObserver
{
    public function updated($model)
    {
       if($model->wasChanged('password')){
          Mail::to($model->email)->send(new PasswordChangedNotificationMail);
          //dd('ss');
       }
    }
}
 