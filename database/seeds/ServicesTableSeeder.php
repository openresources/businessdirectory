<?php

use Illuminate\Database\Seeder;
use App\Service;
use App\Common\ServicesList;

class ServicesTableSeeder extends Seeder
{
    public function run()
    {
        $services = ServicesList::services();

        $services->each(function ($service) {
            factory(Service::class)->create([
                'name' => $service['name'],
                'description' => $service['description']
            ]);
        });
    }
}
