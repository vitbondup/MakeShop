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
        // \App\Models\User::factory(10)->create();
        $this->call(CategoryTableSeeder::class);
        $this->command->info('Дані були завантажені у таблицю категорій!');

        $this->call(BrandTableSeeder::class);
        $this->command->info('Дані були завантажені у таблицю брендів!');

        $this->call(ProductTableSeeder::class);
        $this->command->info('Дані були завантажені у таблицю товарів!');
    }
}
