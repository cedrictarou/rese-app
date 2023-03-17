<?php

namespace App\Services;

use App\Models\Genre;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use App\Models\Region;

class ShopService
{
    public static function getRegions()
    {
        $region_ids = Shop::pluck('region_id')->unique();
        $regions = Region::whereIn('id', $region_ids)->get();
        return $regions;
    }

    public static function getGenres()
    {
        $genre_ids = Shop::pluck('genre_id')->unique();
        $genres = Genre::whereIn('id', $genre_ids)->get();
        return $genres;
    }
}
