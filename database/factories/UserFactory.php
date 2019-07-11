<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Role;
use App\Avatar;
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

$factory->define(User::class, function (Faker $faker) {
	 $name = $faker->name . " " . $faker->lastName;
    return [
        'name' => $name,
        'slug' =>srt_slug($name, '-'),
        'picture' => Avatar::all()->random()->id,
        'phone' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'role_id' => Role::all()->random()->id,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
