<?php

namespace Database\Factories;

use App\Http\Middleware\StoreDevice;
use Illuminate\Database\Eloquent\Factories\Factory;

use Faker\Generator as Faker;

use App\Models\Device;

class DeviceFactory extends Factory
{
    /* @var $factory \Illuminate\Database\Eloquent\Factory */
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
     protected $model = Device::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'uuid' => $this->faker->text(20),
            'appId' => $this->faker->text(50),
            'os' => $this->faker->text(50),
            'language' => $this->faker->text(20),
            'client_token' => $this->faker->md5(uniqid(rand(), true)),
        ];
    }
}
