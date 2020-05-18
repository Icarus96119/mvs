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

$factory->define(MVS\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});


$factory->define(MVS\Kunden::class, function (Faker $faker) {
    return [
	'user_id' => factory('MVS\Kunden')->create()->id,
	'vorname' => $faker->word(),
	'nachname' => $faker->word(),
	'strasse' => $faker->word(),
	'plz' => $faker->randomNumber(5),
	'wohnort' => $faker->word(),
	'mail' => $faker->word(),
	'telefon' => $faker->randomNumber(9),
        'geburtsdatum' => $faker->randomNumber(8)
    ];
});