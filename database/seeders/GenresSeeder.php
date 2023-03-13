<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = [
            "寿司",
            "焼肉",
            "居酒屋",
            "イタリアン",
            "ラーメン",
            "フレンチ",
            "中華",
        ];
        foreach ($genres as $genre) {
            Genre::create([
                "genre" => $genre
            ]);
        }
    }
}
