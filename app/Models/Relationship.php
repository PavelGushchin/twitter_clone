<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Relationship extends Model
{
    use HasFactory, SoftDeletes;

    public $incrementing = false;
    public $timestamps = false;


    public function getCreatedAtAttribute($date)
    {
        return new Carbon($date);
    }

}
