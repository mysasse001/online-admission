<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExaminedBysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('examined_bies')->insert([
            ['name'=>'school'],
            ['name'=>'KNEC'],
            ['name'=>'KCSE'],
            ['name'=>'KASNEB'],
            ['name'=>'KATC'],
        ]);
    }
}
