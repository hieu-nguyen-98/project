<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'title' => 'Laravel 8 DesignPattern',
            'description' => ' is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry is standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged',
            'logo' => 'backend/assets/img/985px-Laravel.svg.png',
            'favico' => 'backend/assets/img/img-social-uploadbtv-cover2-1664854266-133-width1200height628-1664854266-558-width1200height628-watermark.jpg',
            'email' => 'laraveldesignpattern@gmail.com',
            'phone' => '0352621297',
            'facebook' =>'',
            'twitter' =>'',
            'tiktok' =>'',
            'youtube' =>'',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]); 
    }
}
