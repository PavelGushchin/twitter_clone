<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Like extends Model
{
    use HasFactory, SoftDeletes;

    public $incrementing = false;
    public $timestamps = false;


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tweet()
    {
        return $this->belongsTo(Tweet::class);
    }


    public function getCreatedAtAttribute($date)
    {
        return new Carbon($date);
    }
}
