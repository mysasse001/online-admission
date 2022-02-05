<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentOptionStepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_option_steps')->insert([
            [
                'payment_option_id'=>1,'step'=>'
                Go to the M-Pesa menu on your phone',
            ],
            [
                'payment_option_id'=>1,'step'=>'
                Select Pay Bill option',
            ],
            [
                'payment_option_id'=>1,'step'=>'
                Enter ..... as the Account No ', 
            ],
            [
                'payment_option_id'=>1,'step'=>'
                Enter the following business number....',
            ],
            [
                'payment_option_id'=>1,'step'=>'
                Enter the total Amount as prescribed by your course', 
            ],
            [
                'payment_option_id'=>1,'step'=>'
                Enter your mpesa pin then send', 
            ],
            [
                'payment_option_id'=>1,'step'=>'
                Enter your mpesa pin then send',
            ],
            [

                'payment_option_id'=>1,'step'=>'
                You will receive a confirmation SMS then forward it to us',
            ],
        ]);
    }
}
