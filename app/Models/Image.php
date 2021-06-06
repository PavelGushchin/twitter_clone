<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    public $timestamps = false;


    public function tweet()
    {
        return $this->morphTo(Tweet::class, 'mediable');
    }

    public function taggedUsers()
    {
        return $this->belongsToMany(User::class, 'users_on_images');
    }


    public function getCreatedAtAttribute($date)
    {
        return new Carbon($date);
    }
}
