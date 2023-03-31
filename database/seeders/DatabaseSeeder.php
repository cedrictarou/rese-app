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
        $this->call(RegionsSeeder::class);
        $this->call(GenresSeeder::class);
        $this->call(ShopsSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(ReservesSeeder::class);
        $this->call(LikesSeeder::class);
        $this->call(ReviewsSeeder::class);
    }
}
