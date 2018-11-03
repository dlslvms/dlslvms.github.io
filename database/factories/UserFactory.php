<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'avatar' => null,
        'firstname' => null,
        'middlename' => null,
        'lastname' => null,
        'address' => null,
        'birthday' => null,
        'contact_number' => null,
        'user_number' => null,
        'user_type' => null,            
        'password' => bcrypt('admin1234'),
        'status' => null,
        'remember_token' => str_random(10),
    ];
});
