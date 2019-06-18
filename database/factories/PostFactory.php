<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Post;
use Faker\Generator as Faker;
use Intervention\Image\Facades\Image;

$factory->define(Post::class, function (Faker $faker) {

    return [
        'caption'=> $faker->sentence(3),
        'description' => $faker->text,
        'picture' => 'http://www.liberaldictionary.com/wp-content/uploads/2018/12/photograph.jpg',//$faker->imageUrl(1200,1200,'food'),
        'user_id' => 0
    ];
});
