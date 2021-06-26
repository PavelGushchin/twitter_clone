<?php

namespace App\Http\Controllers;

use App\Models\Relationship;
use App\Models\User;

class WhoToFollowController extends Controller
{
    public function suggestUsers()
    {
        $alreadyFollowedUsers = Relationship::select('followed_user_id')
            ->where(['follower_id' => auth()->id()])
            ->get()
            ->pluck('followed_user_id');

        $whoToFollow = User::where('id', '<>', auth()->id())
            ->whereNotIn('id', $alreadyFollowedUsers)
            ->select('id', 'name', 'nickname', 'avatar')
            ->inRandomOrder()
            ->limit(5)
            ->get();

        return $whoToFollow;
    }
}
