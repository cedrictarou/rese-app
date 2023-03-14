<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_time',
        'num_of_people',
        'user_id',
        'shop_id',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function getDate()
    {
        $carbon = Carbon::createFromFormat('Y-m-d H:i:s', $this->date_time);
        return $carbon->format('Y-m-d');
    }

    public function getTime()
    {
        $carbon = Carbon::createFromFormat('Y-m-d H:i:s', $this->date_time);
        return $carbon->format('H:i');
    }
}
