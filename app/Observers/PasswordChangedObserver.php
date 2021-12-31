<?php

namespace App\Observers;

use Illuminate\Support\Facades\Mail;
use App\Contracts\PasswordChangedNotificationContract;

class PasswordChangedObserver
{
    public function updated(PasswordChangedNotificationContract $model)
    {
      //  if($model->wasChanged('password')){
      //     Mail::to($model->email)->send(new PasswordChangedNotificationMail);
      //     //dd('ss');
      //  }

      $model->sendPasswordChangedNotification();
    }
}
 