<?php

use Faker\Generator as Faker;
use App\ConceptoGasto;

$factory->define(ConceptoGasto::class, function (Faker\Generator $faker) {

    return [
        'detalle' => $faker->word
    ];
});

