<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EducationSystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('education_systems')->insert([
            ['name'=>'KCSE'],
            ['name'=>'KCPE'],
            ['name'=>'1ST Degree'],
            ['name'=>'CERTIFICATE'],
            ['name'=>'CPA'],
            ['name'=>'EAACE'],
            ['name'=>'EACE'],
            ['name'=>'GCE'],
            ['name'=>'HIGHER DIPLOMA'],
            ['name'=>'IGCE'],
            ['name'=>'KACE'],
            ['name'=>'KATC'],
            ['name'=>'KCE'],
            ['name'=>'KNEC DIPLOMA'],
            ['name'=>'MASTERS DEGREE'],
            ['name'=>'OTHER'],
            ['name'=>'OTHER DIPLOMA'],
            ['name'=>'UNIVERSITY DIPLOMA'],
        ]);
    }
}
