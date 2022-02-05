<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplicationStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('application_statuses')->insert([
            ['name'=>'pending'],
            ['name'=>'on-hold'],
            ['name'=>'scheduled'],
            ['name'=>'done'],
        ]);
    }
}
