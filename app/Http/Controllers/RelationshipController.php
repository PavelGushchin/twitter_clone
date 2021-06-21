<?php

namespace App\Http\Controllers;

use App\Models\Relationship;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class RelationshipController extends Controller
{
    public function follow(User $user)
    {
        DB::transaction(function () use ($user) {
            Relationship::create([
                'followed_user_id' => $user->id,
                'follower_id' => auth()->id(),
            ]);

            auth()->user()->increment('following');
        });
    }


    public function unfollow(User $user)
    {
        DB::transaction(function () use ($user) {
            Relationship::where([
                'followed_user_id' => $user->id,
                'follower_id' => auth()->id(),
            ])->delete();

            auth()->user()->decrement('following');
        });
    }
}
