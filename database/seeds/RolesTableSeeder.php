<?php

use App\Common\Enums\Roles;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        foreach (Roles::getValues() as $value) {
            $name = (String) Str::of(Roles::getDescription($value))->title();
            factory(App\Role::class)->create([
                'name' => $name,
                'description' => $name,
                'display_name' => $name,
            ]);
        }
    }
}
