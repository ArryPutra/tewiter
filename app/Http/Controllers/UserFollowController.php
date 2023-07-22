<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserFollow;
use Illuminate\Http\Request;

class UserFollowController extends Controller
{
    public function store(User $user) {
        $existingLike = UserFollow::where('user_id', Auth()->User()->id)
                                    ->where('follow_user_id', $user->id)
                                    ->first();
        
        if ($existingLike) {
            $existingLike->delete();
        } else {
            UserFollow::create([
                'user_id' => Auth()->User()->id,
                'follow_user_id' => $user->id
            ]);
        }
    }
}
