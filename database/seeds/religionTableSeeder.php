<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Religion;

class religionTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('religions')->delete();

        $religions = [

            [
                'en'=> 'Muslim',
                'ar'=> 'مسلم'
            ],
            [
                'en'=> 'Christian',
                'ar'=> 'مسيحي'
            ],
            [
                'en'=> 'Other',
                'ar'=> 'غيرذلك'
            ],

        ];

        foreach ($religions as $R) {
            Religion::create(['Name' => $R]);
        }
    }
}
