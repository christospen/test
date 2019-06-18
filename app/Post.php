<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Like;

class Post extends Model
{
    protected $fillable = [
        'caption',
        'description',
        'picture'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function likes(){
        $this->hasMany(Like::class);
    }

    public function liked(){
        $this->likes()->where([
            'user_id'=> auth()->user()->id
        ])->get()->count();
    }

    public function postPicture(){
        if(strstr($this->picture,'http')){
            return $this->picture;
        }else{
            return asset('storage/thumbnails/'.$this->picture);
        }
    }

    public function userProfilePicture(){
        return $this->user->profile->profilePicture();
    }

    public function username(){
        return $this->user->username;
    }


}
