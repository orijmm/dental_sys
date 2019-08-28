<?php

use Faker\Generator as Faker;
use App\ConceptoGasto;

$factory->define(ConceptoGasto::class, function (Faker $faker) {

    return [
        'detalle' => $faker->word,
        'user_id' => \App\User::orderByRaw('RAND()')->first()->id,
    ];
});

