<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {

    static $password;

    return [
        'name'           => $faker->name,
        'email'          => $faker->unique()->safeEmail,
        'password'       => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Company::class, function (Faker\Generator $faker) {

    return [
        'name'           => $faker->name,
        'beebole_id'     => $faker->numberBetween($min = 1000, $max = 9999)
    ];
});

$factory->define(App\TroubleTicket::class, function (Faker\Generator $faker) {

    $user = factory('App\User')->create();

    return [
        'title'       => $faker->word,
        'user_id'     => $user->id,
        'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'company'     => 'Tyndall Federal Credit Union',
        'category'    => 'Web',
        'status'      => 'Pending',
        'priority'    => $faker->numberBetween($min = 1, $max = 3),
        'complete'    => $faker->boolean($chanceOfGettingTrue = 50),
        'completed_at'=> ''
    ];

});
