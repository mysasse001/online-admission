<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModeOfStudySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mode_of_studies')->insert([
            ['name'=>'Distance Learning'],
            ['name'=>'Regular'],
            ['name'=>'Part time']
        ]);
    }
}
