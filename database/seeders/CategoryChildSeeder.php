<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CategoryChild;

class CategoryChildSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        CategoryChild::factory()
        ->count(5)
        ->create();
    }
}
