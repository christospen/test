<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'bio' => $faker->text,
        'url'=> $faker->url,
        'picture' => 'http://www.fubiz.net/wp-content/uploads/2017/03/Marc-Ward-Fubiz-1.jpg',//$faker->imageUrl(400,400,'people'),
        'phone' => $faker->phoneNumber,
        'gender' => 'male'
    ];
});
