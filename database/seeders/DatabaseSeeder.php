<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserTableSeeder::class,
            SettingtableSeeder::class,
            // CategorySeeder::class,
        ]);
        \App\Models\Category::factory(20)->create();
        \App\Models\User::factory(20)->create();
        \App\Models\Product::factory(30)->create();
    }
}
