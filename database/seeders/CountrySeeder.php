<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        Country::updateOrCreate(
            ['iso_code' => 'IN'],
            [
                'name' => 'India',
                'phone_code' => '+91',
                'currency_id' => null,
                'is_active' => true,
            ]
        );
    }
}