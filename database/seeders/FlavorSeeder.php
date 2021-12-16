<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Flavor;

class FlavorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Flavor::factory()
        ->count(5)
        ->create();
    }
}
