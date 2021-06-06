<?php

namespace Tests\Unit;
use App\Http\Middleware\StoreDevice;
use Tests\TestCase;

class DeviceTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_can_create_device()
    {
        $data = [
            'uid' => $this->faker->text(20),
            'os' => $this->faker->text(20),
            'appId' => $this->faker->text(20),
            'language' => $this->faker->text(20)
        ];

        $this->post(route('store.device'), $data)
            ->assertStatus(201)
            ->assertJson($data);
    }
}
