<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DesignsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::first()->design()->create([
            'welcome' => 'Welcome to our site...',
            'name' => 'Site name...',
            'about' => 'About Us...',
            'address' => 'Our Address ...',
            'email' => 'info@domain...',
            'telephone' => '+2547........',
            'whatsapp' => 'https://whatsapp.com',
            'facebook' => 'https://facebook.com',
            'twitter' => 'https://twitter.com',
            'youtube' => 'https://youtube.com',
            'logo' => '/img/logo.svg',
            'website_link'=>'https://'
        ]);
    }
}
