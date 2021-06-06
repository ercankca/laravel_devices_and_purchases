<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function test_making_an_api_request()
    {
        $this->withoutMiddleware();
        $response = $this->json('POST',
            '/api/test',
            ['x-device-uid' => 'unique-device-udid',
                'os' =>  "Android",
                'appId' => "234213",
                'language' => "tr"]

        );
        $response->assertSessionHasErrors();
    }
}
