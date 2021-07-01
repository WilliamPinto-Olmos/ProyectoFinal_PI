<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PruebaProvedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Provedor::factory(10)->create();
    }
}
