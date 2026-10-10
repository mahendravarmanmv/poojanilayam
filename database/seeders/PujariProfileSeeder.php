<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\PujariAvailability;
use App\Models\PujariExperience;
use App\Models\PujariLanguage;
use App\Models\PujariProfile;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PujariProfileSeeder extends Seeder
{
    public function run(): void
    {
        // Demo data for local development. Do not use as real priest data.
        $languageDefinitions = [
            ['name' => 'Telugu', 'code' => 'te', 'native_name' => 'తెలుగు'],
            ['name' => 'Sanskrit', 'code' => 'sa', 'native_name' => 'संस्कृतम्'],
            ['name' => 'Hindi', 'code' => 'hi', 'native_name' => 'हिन्दी'],
            ['name' => 'English', 'code' => 'en', 'native_name' => 'English'],
        ];

        $languagesByCode = [];

        foreach ($languageDefinitions as $definition) {
            $language = Language::firstOrCreate(
                ['code' => $definition['code']],
                [
                    'name' => $definition['name'],
                    'native_name' => $definition['native_name'],
                    'is_active' => true,
                ]
            );

            $languagesByCode[$definition['code']] = $language;
        }

        $priests = [
            [
                'number' => 'DEMO-PUJ-001',
                'name' => 'Sri Ananda Sharma',
                'email' => 'demo.pujari001@example.test',
                'experience_years' => 15,
                'bio' => 'Demo profile for traditional Hindu poojas and Vedic rituals.',
                'experiences' => [
                    [
                        'title' => 'Vedic Poojas',
                        'organization' => 'Demo Temple',
                        'years' => 10,
                        'description' => 'Demo experience record for Vedic rituals.',
                    ],
                    [
                        'title' => 'Homam',
                        'organization' => 'Demo Temple',
                        'years' => 5,
                        'description' => 'Demo experience record for homam ceremonies.',
                    ],
                ],
                'languages' => ['te', 'sa', 'hi'],
            ],
            [
                'number' => 'DEMO-PUJ-002',
                'name' => 'Sri Venkata Ramana',
                'email' => 'demo.pujari002@example.test',
                'experience_years' => 12,
                'bio' => 'Demo profile for family ceremonies and traditional poojas.',
                'experiences' => [
                    [
                        'title' => 'Satyanarayana Vratham',
                        'organization' => 'Demo Temple',
                        'years' => 8,
                        'description' => 'Demo experience record for vratham ceremonies.',
                    ],
                    [
                        'title' => 'Griha Pravesham',
                        'organization' => 'Independent Practice',
                        'years' => 4,
                        'description' => 'Demo experience record for housewarming rituals.',
                    ],
                ],
                'languages' => ['te', 'sa'],
            ],
            [
                'number' => 'DEMO-PUJ-003',
                'name' => 'Sri Krishna Murthy',
                'email' => 'demo.pujari003@example.test',
                'experience_years' => 10,
                'bio' => 'Demo profile for daily worship and traditional Hindu ceremonies.',
                'experiences' => [
                    [
                        'title' => 'Daily Pooja',
                        'organization' => 'Demo Temple',
                        'years' => 7,
                        'description' => 'Demo experience record for daily worship.',
                    ],
                    [
                        'title' => 'Ganapathi Homam',
                        'organization' => 'Independent Practice',
                        'years' => 3,
                        'description' => 'Demo experience record for Ganapathi Homam.',
                    ],
                ],
                'languages' => ['te', 'sa', 'en'],
            ],
            [
                'number' => 'DEMO-PUJ-004',
                'name' => 'Sri Suresh Chary',
                'email' => 'demo.pujari004@example.test',
                'experience_years' => 8,
                'bio' => 'Demo profile for auspicious ceremonies and family rituals.',
                'experiences' => [
                    [
                        'title' => 'Marriage Ceremonies',
                        'organization' => 'Independent Practice',
                        'years' => 5,
                        'description' => 'Demo experience record for marriage rituals.',
                    ],
                    [
                        'title' => 'Namakarana',
                        'organization' => 'Independent Practice',
                        'years' => 3,
                        'description' => 'Demo experience record for naming ceremonies.',
                    ],
                ],
                'languages' => ['te', 'sa', 'hi'],
            ],
            [
                'number' => 'DEMO-PUJ-005',
                'name' => 'Sri Narasimha Shastry',
                'email' => 'demo.pujari005@example.test',
                'experience_years' => 18,
                'bio' => 'Demo profile for Vedic chanting and traditional religious rituals.',
                'experiences' => [
                    [
                        'title' => 'Vedic Chanting',
                        'organization' => 'Demo Temple',
                        'years' => 12,
                        'description' => 'Demo experience record for Vedic chanting.',
                    ],
                    [
                        'title' => 'Rudrabhishekam',
                        'organization' => 'Independent Practice',
                        'years' => 6,
                        'description' => 'Demo experience record for Rudrabhishekam.',
                    ],
                ],
                'languages' => ['te', 'sa', 'hi', 'en'],
            ],
        ];

        foreach ($priests as $data) {
            $user = User::withTrashed()
                ->where('email', $data['email'])
                ->first();

            if ($user && $user->trashed()) {
                $user->restore();
            }

            if (! $user) {
                $user = new User();
                $user->email = $data['email'];
            }

            $user->fill([
                'name' => $data['name'],
                'mobile' => null,
                'password' => Hash::make('DemoPujari@123'),
                'status' => 'active',
                'email_verified_at' => now(),
            ]);
            $user->save();

            UserProfile::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'first_name' => $data['name'],
                    'last_name' => null,
                    'display_name' => $data['name'],
                    'gender' => 'male',
                ]
            );

            $profile = PujariProfile::withTrashed()
                ->where('pujari_number', $data['number'])
                ->first();

            if ($profile && $profile->trashed()) {
                $profile->restore();
            }

            if (! $profile) {
                $profile = new PujariProfile();
                $profile->pujari_number = $data['number'];
            }

            $profile->fill([
                'user_id' => $user->id,
                'display_name' => $data['name'],
                'bio' => $data['bio'],
                'experience_years' => $data['experience_years'],
                'experience_details' => 'Demo data for local development.',
                'profile_status' => 'complete',
                'verification_status' => 'approved',
                'is_active' => true,
                'approved_at' => now(),
                'approved_by' => null,
            ]);
            $profile->save();

            foreach ($data['languages'] as $index => $code) {
                PujariLanguage::updateOrCreate(
                    [
                        'pujari_profile_id' => $profile->id,
                        'language_id' => $languagesByCode[$code]->id,
                    ],
                    [
                        'proficiency' => 'fluent',
                        'is_primary' => $index === 0,
                    ]
                );
            }

            foreach ($data['experiences'] as $experience) {
                PujariExperience::withTrashed()
                    ->where('pujari_profile_id', $profile->id)
                    ->where('title', $experience['title'])
                    ->get()
                    ->each(function ($record) {
                        if ($record->trashed()) {
                            $record->restore();
                        }
                    });

                PujariExperience::updateOrCreate(
                    [
                        'pujari_profile_id' => $profile->id,
                        'title' => $experience['title'],
                    ],
                    [
                        'temple_or_organization' => $experience['organization'],
                        'experience_years' => $experience['years'],
                        'started_on' => now()
                            ->subYears($experience['years'])
                            ->toDateString(),
                        'ended_on' => null,
                        'description' => $experience['description'],
                    ]
                );
            }

            // A recurring availability record makes the demo profile
            // appear available to the current PriestController.
            PujariAvailability::updateOrCreate(
                [
                    'pujari_profile_id' => $profile->id,
                    'availability_type' => 'recurring',
                    'day_of_week' => 0,
                    'start_time' => '08:00:00',
                ],
                [
                    'availability_date' => null,
                    'end_time' => '18:00:00',
                    'status' => 'available',
                    'timezone' => 'Asia/Kolkata',
                    'notes' => 'Demo availability; confirm with the pujari.',
                ]
            );
        }

        $this->command?->info(
            'Demo pujari profiles and related records seeded successfully.'
        );
    }
}
