<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    public $timestamps = false;


    public function tweet()
    {
        return $this->morphOne(Tweet::class, 'mediable');
    }


    public function getCreatedAtAttribute($date)
    {
        return new Carbon($date);
    }
}
