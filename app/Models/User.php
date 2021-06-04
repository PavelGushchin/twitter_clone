<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function tweets()
    {
        return $this->hasMany(Tweet::class, 'author_id');
    }


    public function profile()
    {
        return $this->hasOne(Profile::class);
    }


    public function followers()
    {
        return $this->hasMany(Relationship::class, 'followed_user_id');
    }


    public function following()
    {
        return $this->hasMany(Relationship::class, 'follower_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }


    public function retweets()
    {
        return $this->hasMany(Retweet::class);
    }


    public function tagedOnImages()
    {
        return $this->belongsToMany(Image::class, 'users_on_images');
    }
}
