<?php

namespace Tests\Unit;

use Database\Factories\DeviceFactory;
use Tests\TestCase;


class DeviceRequestTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function test_making_an_api_request()
    {
        $response = $this->postJson('/api/test', ['x-device-uid' => 'unique-device-udid']);

        $response
            ->assertStatus(201)
            ->assertJson([
                'created' => true,
            ]);
    }
}