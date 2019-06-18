<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follower;
use App\User;


class UsersController extends Controller
{
    public function follow($userId){
        Follower::create([
            'user_id' => $userId,
            'follower_id' => auth()->user()->id
        ]);

        return back();
    }

    public function unfollow($userId){

        Follower::where([
           'user_id' => $userId,
           'follower_id' => auth()->user()->id
        ])->delete();

        return back();
    }
}
