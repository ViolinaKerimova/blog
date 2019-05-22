<?php

use Faker\Generator as Faker;
//pishem tuk
$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' =>'<p>' . implode('</p> <p>', $faker->paragraphs ). '</p>' ,//masiv ot string 
        'users_id' => rand(1,2),
        'created_at' => $faker->dateTime
    ];
});
