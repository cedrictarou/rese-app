<?php

namespace Database\Seeders;

use App\Models\Reserve;
use Illuminate\Database\Seeder;

class ReservesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reserve::factory()->count(50)->create();
    }
}
