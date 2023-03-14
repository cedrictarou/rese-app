<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'region_id',
        'genre_id',
        'description',
        'image',
    ];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function likes()
    {
        return $this->hasMany(Likes::class);
    }

    public function reserves()
    {
        return $this->hasMany(Reserve::class);
    }
}
