<?php

namespace App\Http\Controllers;

use App\Models\Relationship;
use App\Models\User;
use DB;

class RelationshipController extends Controller
{
    public function follow(User $user)
    {
        if ($user->id == auth()->id()) {
            abort(404);
        }

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
            $numOfDeletedRows = Relationship::where([
                'followed_user_id' => $user->id,
                'follower_id' => auth()->id(),
            ])->delete();

            if ($numOfDeletedRows > 0) {
                auth()->user()->decrement('following', $numOfDeletedRows);
            }
        });
    }
}
