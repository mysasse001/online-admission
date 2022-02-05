<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DisabilityConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('disability_conditions')->insert([
            ['name'=>'NONE'],
            ['name'=>'Physical/Mobility'],
            ['name'=>'Vision'],
            ['name'=>'Hearing'],
            ['name'=>'Communication'],
            ['name'=>'Medical'],
            ['name'=>'Intellectual/Development'],
            ['name'=>'Mental Health'],
        ]);
    }
}
