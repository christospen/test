<?php

namespace App\Http\Controllers;

use App\Follower;
use App\Like;
use App\Post;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $followed = Follower::select(['user_id'])
            ->where([
                'follower_id' => auth()->user()->id
            ])->get()->toArray();

        $userIds = array_map(function($f){
            return $f['user_id'];
            },$followed
        );

        $posts = Post::whereIn('user_id',$userIds)->orderBy('created_at','Desc')->simplePaginate(5);
        return view('home', compact('posts'));
    }
}
