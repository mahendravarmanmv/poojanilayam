<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::updateOrCreate(
            ['slug' => 'customer'],
            [
                'name' => 'Customer (Devotee)',
                'description' => 'Registered devotee/customer user of Pooja Nilayam.',
                'is_active' => true,
            ]
        );
    }
}
