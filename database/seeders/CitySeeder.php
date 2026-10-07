<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\State;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        $cities = [
            'Andhra Pradesh' => ['Amaravati'],
            'Arunachal Pradesh' => ['Itanagar'],
            'Assam' => ['Dispur'],
            'Bihar' => ['Patna'],
            'Chhattisgarh' => ['Raipur'],
            'Goa' => ['Panaji'],
            'Gujarat' => ['Gandhinagar'],
            'Haryana' => ['Chandigarh'],
            'Himachal Pradesh' => ['Shimla'],
            'Jharkhand' => ['Ranchi'],
            'Karnataka' => ['Bengaluru'],
            'Kerala' => ['Thiruvananthapuram'],
            'Madhya Pradesh' => ['Bhopal'],
            'Maharashtra' => ['Mumbai'],
            'Manipur' => ['Imphal'],
            'Meghalaya' => ['Shillong'],
            'Mizoram' => ['Aizawl'],
            'Nagaland' => ['Kohima'],
            'Odisha' => ['Bhubaneswar'],
            'Punjab' => ['Chandigarh'],
            'Rajasthan' => ['Jaipur'],
            'Sikkim' => ['Gangtok'],
            'Tamil Nadu' => ['Chennai'],
            'Telangana' => ['Hyderabad'],
            'Tripura' => ['Agartala'],
            'Uttar Pradesh' => ['Lucknow'],
            'Uttarakhand' => ['Dehradun'],
            'West Bengal' => ['Kolkata'],

            // Union Territories
            'Andaman and Nicobar Islands' => ['Port Blair'],
            'Chandigarh' => ['Chandigarh'],
            'Dadra and Nagar Haveli and Daman and Diu' => ['Daman'],
            'Delhi' => ['New Delhi'],
            'Jammu and Kashmir' => ['Srinagar'],
            'Ladakh' => ['Leh'],
            'Lakshadweep' => ['Kavaratti'],
            'Puducherry' => ['Puducherry'],
        ];

        foreach ($cities as $stateName => $stateCities) {
            $state = State::where('name', $stateName)->first();

            if (!$state) {
                continue;
            }

            foreach ($stateCities as $cityName) {
                City::updateOrCreate(
                    [
                        'state_id' => $state->id,
                        'name' => $cityName,
                    ],
                    [
                        'is_active' => true,
                    ]
                );
            }
        }
    }
}