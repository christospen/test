<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use App\User;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        $posts = $user->posts()->paginate(4);
        return view('profiles.index', compact('user','posts'));
    }

    public function create()
    {
        return view('profiles.form');
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'title' => ['required'],
            'picture' => ['required', 'image'],
            'bio' => [],
            'url' => [],
            'phone' => [],
            'gender' => []
        ]);

        $imagePath = $data['picture']->store('profile', 'public');
        $data['picture'] = $imagePath;
        $image = Image::make($request->file('picture')->getRealPath())->fit(1200, 1200);
        $image->save('storage/thumbnails/' . $imagePath);


        auth()->user()->profile()->create($data);
        return redirect('/u/' . auth()->user()->username);
    }
}
