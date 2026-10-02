<?php

namespace Database\Seeders;

use App\Models\Currency;
use App\Models\Pooja;
use App\Models\PoojaCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PoojaCatalogSeeder extends Seeder
{
    public function run(): void
    {
        $currency = Currency::query()->firstOrCreate(
            ['code' => 'INR'],
            [
                'name' => 'Indian Rupee',
                'symbol' => '₹',
                'decimal_places' => 2,
                'is_active' => true,
            ]
        );

        $categories = [
            [
                'code' => 'DAILY',
                'name' => 'Daily Poojas',
                'description' => 'Traditional daily worship services for peace, wellbeing and blessings.',
                'sort_order' => 10,
            ],
            [
                'code' => 'HOMAM',
                'name' => 'Homams',
                'description' => 'Sacred fire rituals performed for health, prosperity, success and spiritual wellbeing.',
                'sort_order' => 20,
            ],
            [
                'code' => 'SPECIAL',
                'name' => 'Special Poojas',
                'description' => 'Devotional rituals for specific intentions, blessings and important occasions.',
                'sort_order' => 30,
            ],
            [
                'code' => 'GRIHA',
                'name' => 'Griha Pooja',
                'description' => 'Traditional rituals for homes, new beginnings, prosperity and family wellbeing.',
                'sort_order' => 40,
            ],
            [
                'code' => 'FESTIVAL',
                'name' => 'Festival Poojas',
                'description' => 'Poojas associated with major Hindu festivals and auspicious devotional occasions.',
                'sort_order' => 50,
            ],
        ];

        $categoryModels = [];

        foreach ($categories as $category) {
            $categoryModels[$category['code']] = PoojaCategory::query()->updateOrCreate(
                ['category_code' => $category['code']],
                [
                    'name' => $category['name'],
                    'slug' => Str::slug($category['name']),
                    'description' => $category['description'],
                    'sort_order' => $category['sort_order'],
                    'is_active' => true,
                ]
            );
        }

        $poojas = [
            // Daily Poojas
            ['code' => 'PN-DAILY-001', 'category' => 'DAILY', 'name' => 'Ganapathi Pooja', 'description' => 'A traditional worship service seeking Lord Ganesha’s blessings for auspicious beginnings and removal of obstacles.', 'duration' => 45, 'price' => 401, 'image' => 'images/home/ganapathi.jpg', 'featured' => true],
            ['code' => 'PN-DAILY-002', 'category' => 'DAILY', 'name' => 'Shiva Pooja', 'description' => 'A devotional Shiva worship service for peace, wellbeing and spiritual strength.', 'duration' => 45, 'price' => 451, 'image' => 'images/home/rudrabhishekam.jpg'],
            ['code' => 'PN-DAILY-003', 'category' => 'DAILY', 'name' => 'Vishnu Pooja', 'description' => 'Traditional worship of Lord Vishnu seeking harmony, protection and blessings for the family.', 'duration' => 45, 'price' => 451, 'image' => 'images/home/satyanarayana.jpg'],
            ['code' => 'PN-DAILY-004', 'category' => 'DAILY', 'name' => 'Durga Pooja', 'description' => 'A devotional service dedicated to Goddess Durga for strength, protection and wellbeing.', 'duration' => 60, 'price' => 501, 'image' => 'images/home/lakshmi.jpg'],
            ['code' => 'PN-DAILY-005', 'category' => 'DAILY', 'name' => 'Hanuman Pooja', 'description' => 'A traditional Hanuman worship service for courage, devotion and spiritual protection.', 'duration' => 45, 'price' => 451, 'image' => 'images/home/ganapathi.jpg'],

            // Homams
            ['code' => 'PN-HOMAM-001', 'category' => 'HOMAM', 'name' => 'Ganapathi Homam', 'description' => 'A sacred fire ritual traditionally performed for success, prosperity and removal of obstacles.', 'duration' => 60, 'price' => 501, 'image' => 'images/home/ganapathi.jpg', 'featured' => true],
            ['code' => 'PN-HOMAM-002', 'category' => 'HOMAM', 'name' => 'Navagraha Homam', 'description' => 'A traditional homam performed with prayers to the nine planetary deities for balance and wellbeing.', 'duration' => 120, 'price' => 1501, 'image' => 'images/home/rudrabhishekam.jpg'],
            ['code' => 'PN-HOMAM-003', 'category' => 'HOMAM', 'name' => 'Maha Mrityunjaya Homam', 'description' => 'A sacred Vedic fire ritual traditionally associated with wellbeing, strength and spiritual protection.', 'duration' => 120, 'price' => 1801, 'image' => 'images/home/rudrabhishekam.jpg'],
            ['code' => 'PN-HOMAM-004', 'category' => 'HOMAM', 'name' => 'Lakshmi Kubera Homam', 'description' => 'A devotional fire ritual seeking blessings for prosperity, abundance and financial wellbeing.', 'duration' => 120, 'price' => 1601, 'image' => 'images/home/lakshmi.jpg'],
            ['code' => 'PN-HOMAM-005', 'category' => 'HOMAM', 'name' => 'Sudarshana Homam', 'description' => 'A traditional homam dedicated to Lord Sudarshana for protection, clarity and wellbeing.', 'duration' => 120, 'price' => 1701, 'image' => 'images/home/satyanarayana.jpg'],

            // Special Poojas
            ['code' => 'PN-SPECIAL-001', 'category' => 'SPECIAL', 'name' => 'Rudrabhishekam', 'description' => 'A traditional Shiva worship ceremony for peace, health and spiritual wellbeing.', 'duration' => 90, 'price' => 1101, 'image' => 'images/home/rudrabhishekam.jpg', 'featured' => true],
            ['code' => 'PN-SPECIAL-002', 'category' => 'SPECIAL', 'name' => 'Lakshmi Pooja', 'description' => 'A devotional ceremony seeking Goddess Lakshmi’s blessings for prosperity and family happiness.', 'duration' => 60, 'price' => 501, 'image' => 'images/home/lakshmi.jpg', 'featured' => true],
            ['code' => 'PN-SPECIAL-003', 'category' => 'SPECIAL', 'name' => 'Satyanarayana Pooja', 'description' => 'A traditional worship ceremony performed for peace, blessings and harmony.', 'duration' => 90, 'price' => 601, 'image' => 'images/home/satyanarayana.jpg', 'featured' => true],
            ['code' => 'PN-SPECIAL-004', 'category' => 'SPECIAL', 'name' => 'Saraswati Pooja', 'description' => 'A devotional service seeking blessings for learning, knowledge and creative pursuits.', 'duration' => 60, 'price' => 501, 'image' => 'images/home/lakshmi.jpg'],
            ['code' => 'PN-SPECIAL-005', 'category' => 'SPECIAL', 'name' => 'Hanuman Chalisa Pooja', 'description' => 'A devotional Hanuman worship service centered on prayer, courage and spiritual strength.', 'duration' => 60, 'price' => 451, 'image' => 'images/home/ganapathi.jpg'],

            // Griha Pooja
            ['code' => 'PN-GRIHA-001', 'category' => 'GRIHA', 'name' => 'Griha Pravesh Pooja', 'description' => 'A traditional house-entry ceremony performed for auspicious beginnings and family wellbeing.', 'duration' => 120, 'price' => 2101, 'image' => 'images/home/satyanarayana.jpg', 'featured' => true],
            ['code' => 'PN-GRIHA-002', 'category' => 'GRIHA', 'name' => 'Vastu Shanti Pooja', 'description' => 'A traditional ritual performed for harmony, peace and positive energy within the home.', 'duration' => 120, 'price' => 1801, 'image' => 'images/home/rudrabhishekam.jpg'],
            ['code' => 'PN-GRIHA-003', 'category' => 'GRIHA', 'name' => 'Ganapathi Griha Pooja', 'description' => 'A home worship service invoking Lord Ganesha’s blessings for auspiciousness and protection.', 'duration' => 75, 'price' => 901, 'image' => 'images/home/ganapathi.jpg'],
            ['code' => 'PN-GRIHA-004', 'category' => 'GRIHA', 'name' => 'Navagraha Shanti Pooja', 'description' => 'A traditional home ritual seeking planetary harmony and wellbeing for the family.', 'duration' => 120, 'price' => 1601, 'image' => 'images/home/lakshmi.jpg'],

            // Festival Poojas
            ['code' => 'PN-FESTIVAL-001', 'category' => 'FESTIVAL', 'name' => 'Vinayaka Chavithi Pooja', 'description' => 'A festive Ganapathi worship service performed during Vinayaka Chavithi for auspiciousness and blessings.', 'duration' => 90, 'price' => 801, 'image' => 'images/home/ganapathi.jpg', 'featured' => true],
            ['code' => 'PN-FESTIVAL-002', 'category' => 'FESTIVAL', 'name' => 'Navaratri Durga Pooja', 'description' => 'A devotional festival service dedicated to Goddess Durga during Navaratri.', 'duration' => 90, 'price' => 901, 'image' => 'images/home/lakshmi.jpg'],
            ['code' => 'PN-FESTIVAL-003', 'category' => 'FESTIVAL', 'name' => 'Diwali Lakshmi Pooja', 'description' => 'A traditional Diwali worship service seeking blessings for prosperity, peace and abundance.', 'duration' => 75, 'price' => 801, 'image' => 'images/home/lakshmi.jpg'],
            ['code' => 'PN-FESTIVAL-004', 'category' => 'FESTIVAL', 'name' => 'Krishna Janmashtami Pooja', 'description' => 'A devotional festival worship service celebrating the birth of Lord Krishna.', 'duration' => 75, 'price' => 701, 'image' => 'images/home/satyanarayana.jpg'],
            ['code' => 'PN-FESTIVAL-005', 'category' => 'FESTIVAL', 'name' => 'Varalakshmi Vratam Pooja', 'description' => 'A traditional festival worship service seeking Goddess Lakshmi’s blessings for family prosperity and wellbeing.', 'duration' => 90, 'price' => 801, 'image' => 'images/home/lakshmi.jpg'],
        ];

        foreach ($poojas as $index => $data) {
            $pooja = Pooja::query()->updateOrCreate(
                ['pooja_code' => $data['code']],
                [
                    'pooja_category_id' => $categoryModels[$data['category']]->id,
                    'name' => $data['name'],
                    'slug' => Str::slug($data['name']),
                    'short_description' => $data['description'],
                    'description' => $data['description'],
                    'duration_minutes' => $data['duration'],
                    'status' => 'active',
                    'is_featured' => (bool) ($data['featured'] ?? false),
                    'is_active' => true,
                    'sort_order' => $index + 1,
                ]
            );

            if (! $pooja->media()->exists()) {
                $pooja->media()->create([
                    'media_type' => 'image',
                    'file_path' => $data['image'],
                    'title' => $data['name'],
                    'sort_order' => 0,
                    'is_featured' => true,
                    'is_active' => true,
                ]);
            }

            if (! $pooja->pricing()->exists()) {
                $pooja->pricing()->create([
                    'currency_id' => $currency->id,
                    'pricing_type' => 'base',
                    'amount' => $data['price'],
                    'discount_amount' => 0,
                    'is_default' => true,
                    'is_active' => true,
                ]);
            }
        }
    }
}
