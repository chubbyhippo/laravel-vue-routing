<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Status;
use App\User;
use Faker\Generator as Faker;

$factory->define(Status::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            $user_id = User::inRandomOrder()->limit(1)->pluck('id')[0];
            return $user_id ? $user_id : factory(User::class);
        },
        'body' => $faker->paragraph

    ];
});
