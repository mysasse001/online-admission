<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TitlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('titles')->insert([
            ['name'=>'Dr'],
            ['name'=>'Mr'],
            ['name'=>'Mrs'],
            ['name'=>'Ms'],
            ['name'=>'Prof'],
        ]);
    }
}
