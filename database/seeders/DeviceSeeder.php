<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
class DeviceSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\Device::factory(10)->create();
    }
}
