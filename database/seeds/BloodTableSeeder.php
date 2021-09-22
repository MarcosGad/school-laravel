<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Type_Blood;

class BloodTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('type__bloods')->delete();

        $bgs = ['O-', 'O+', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-'];

        foreach($bgs as  $bg){
            Type_Blood::create(['Name' => $bg]);
        }
    }
}
