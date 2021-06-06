<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */
use App\Models\Device;

use Faker\Generator as Faker;

$factory->define(Device::class, function (Faker $faker) {
    return [
        'uid' => "unique-device-udid",
        'os' =>  "Android",
        'appId' => "234213",
        'language' => "tr"
    ];
});

