<?php
/*
https://laravel.com/docs/8.x/scheduling#scheduling-artisan-commands
https://laravelexamples.com/tag/task-scheduling
https://laravelexamples.com/example/tighten-laravelversions/task-scheduling
https://laravelexamples.com/example/astrotomic-opendor-me/task-scheduling
https://www.positronx.io/laravel-cron-job-task-scheduling-tutorial-with-example/
https://www.laravelcode.com/post/laravel-55-task-scheduling-with-cron-job-example
*/

namespace App\Console\Commands;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\User;
use Illuminate\Support\Facades\DB;


class DailyQuote extends Command
{
    
    protected $signature = 'quote:daily';
    protected $description = 'Respectively send an exclusive quote to everyone daily via email.';
    public function __construct()
    {
        parent::__construct();
    }  


    public function handle()
    {
        // $quotes = [
        //     'Mahatma Gandhi' => 'Live as if you were to die tomorrow. Learn as if you were to live forever.',
        //     'Friedrich Nietzsche' => 'That which does not kill us makes us stronger.',
        //     'Theodore Roosevelt' => 'Do what you can, with what you have, where you are.',
        //     'Oscar Wilde' => 'Be yourself; everyone else is already taken.',
        //     'William Shakespeare' => 'This above all: to thine own self be true.',
        //     'Napoleon Hill' => 'If you cannot do great things, do small things in a great way.',
        //     'Milton Berle' => 'If opportunity doesn’t knock, build a door.'
        // ];
         
        // // Setting up a random word
        // $key = array_rand($quotes);
        // $data = $quotes[$key];
         
        // $users = User::all();
        // foreach ($users as $user) {
        //     Mail::raw("{$key} -> {$data}", function ($mail) use ($user) {
        //         $mail->from('digamber@positronx.com');
        //         $mail->to($user->email)        //             ->subject('Daily New Quote!');
        //     });
        // }
         
        // $this->info('Successfully sent daily quote to everyone.');

        DB::table('users')
            ->update(['email_verified_at' => date('Y-m-d')]);

    	$this->info('Update Successfully!');

        
    }
}
