<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
        return $this->hasMany(Like::class);
    }

    public function reserves()
    {
        return $this->hasMany(Reserve::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function scopeSearch($query, $search)
    {
        foreach ($search as $key => $value) {
            switch ($key) {
                case 'region':
                    if ($value) {
                        $query->where('region_id', $value);
                    }
                    break;
                case 'genre':
                    if ($value) {
                        $query->where('genre_id', $value);
                    }
                    break;
                case 'words':
                    if ($value) {
                        $query->where(function ($query) use ($value) {
                            $query->where('name', 'like', '%' . $value . '%')
                                ->orWhere('description', 'like', '%' . $value . '%');
                        });
                    }
                    break;
            }
        }
        return $query;
    }

    public function isLikedBy()
    {
        $user_id = Auth::id();
        $likedByUser = false;
        foreach ($this->likes as $like) {
            if ($like->user_id === $user_id) {
                $likedByUser = true;
                break;
            }
        }
        return $likedByUser;
    }
}
