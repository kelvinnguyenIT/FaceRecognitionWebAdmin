<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InfoAccount;

class InfoAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        InfoAccount::factory()
        ->count(3)
        ->create();
    }
}
