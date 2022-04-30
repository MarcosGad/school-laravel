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
        $this->call(SpecializationsTableSeeder::class);

        $this->call(ClassroomTableSeeder::class);
        $this->call(GradeSeeder::class);
        $this->call(SectionsTableSeeder::class);
        $this->call(StudentsTableSeeder::class);

        //make by Package
        //https://github.com/orangehill/iseed
        //php artisan iseed student_accounts

        $this->call(SettingsTableSeeder::class);
    }
}
