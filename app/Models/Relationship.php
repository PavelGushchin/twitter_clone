<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Relationship extends Model
{
    use HasFactory, SoftDeletes;

    public $incrementing = false;
    public $timestamps = false;
    protected $guarded = [];


    public function followed()
    {
        return $this->belongsTo(User::class, 'followed_user_id');
    }

    public function follower()
    {
        return $this->belongsTo(User::class, 'follower_id');
    }


    public function getCreatedAtAttribute($date)
    {
        return new Carbon($date);
    }
}
