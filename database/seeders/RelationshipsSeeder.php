<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RelationshipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('relationships')->insert([
            ['name'=>'Brother'],
            ['name'=>'Father'],
            ['name'=>'Friend'],
            ['name'=>'Husband'],
            ['name'=>'Mother'],
            ['name'=>'Neighbor'],
            ['name'=>'Relative'],
            ['name'=>'Guardian'],
            ['name'=>'Sister'],
            ['name'=>'Other'],
        ]);
    }
}
