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
        $this->call([
            CartSeeder::class,
            UserSeeder::class,
            CategoryChildSeeder::class,
            CategorySeeder::class,
            CommuneSeeder::class,
            DistrictSeeder::class,
            FlavorSeeder::class,
            ImageSeeder::class,
            InfoAccountSeeder::class,
            OrderSeeder::class,
            ProductSeeder::class,
            ProvinceSeeder::class,
            StatusSeeder::class,
        ]);
        
    }
}
