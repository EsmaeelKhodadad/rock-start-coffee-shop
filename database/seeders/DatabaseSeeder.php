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
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ProductSeeder::class,
            CustomizationSeeder::class,
            OptionSeeder::class,
            ProductCustomizationSeeder::class,
            CustomizationOptionSeeder::class,
        ]);
    }
}
