<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['name'=>'Bachelors','amount'=>'500'],
            ['name'=>'Masters','amount'=>'500'],
            ['name'=>'Doctor of Pholosophy(PhD)','amount'=>'500'],
            ['name'=>'Post Graduate Diploma','amount'=>'500'],
            ['name'=>'Diploma','amount'=>'500'],
            ['name'=>'Certificate','amount'=>'500'],
            ['name'=>'Fellowships','amount'=>'500'],
            ['name'=>'Bridging','amount'=>'500'],
        ]);
    }
}
