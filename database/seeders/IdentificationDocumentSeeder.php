<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IdentificationDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('identification_documents')->insert([
            ['name'=>'Birth Certificate'],
            ['name'=>'National ID'],
            ['name'=>'Passport'],
        ]);
    }
}
