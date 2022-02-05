<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentOption extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_options')->insert([
            ['name'=>'Mpesa Payment','description'=>'Ensure you pay the exact amount,otherwise the application wont be processed.']
        ]);
    }
}
