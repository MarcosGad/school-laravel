<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(AdminTableSeeder::class);
        $this->call(BloodTableSeeder::class);
        $this->call(NationalitiesTableSeeder::class);
        $this->call(religionTableSeeder::class);
        $this->call(GenderTableSeeder::class);
        $this->call(ParentsTableSeeder::class);
    }
}
