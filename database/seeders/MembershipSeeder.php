<?php

namespace Database\Seeders;

use App\Models\Membership;
use Illuminate\Database\Seeder;

class MembershipSeeder extends Seeder
{
    public function run(): void
    {
        $plans = [
            [
                'name' => 'Basic',
                'slug' => 'basic',
                'price' => 29.00,
                'duration_months' => 1,
                'duration_label' => '1 month access',
                'benefits' => [
                    'Gym floor access',
                    'Locker room',
                    'Basic equipment',
                ],
                'is_popular' => false,
            ],
            [
                'name' => 'Standard',
                'slug' => 'standard',
                'price' => 49.00,
                'duration_months' => 3,
                'duration_label' => '3 months access',
                'benefits' => [
                    'Everything in Basic',
                    'Group classes',
                    'Fitness assessment',
                ],
                'is_popular' => true,
            ],
            [
                'name' => 'Premium',
                'slug' => 'premium',
                'price' => 79.00,
                'duration_months' => 12,
                'duration_label' => '12 months access',
                'benefits' => [
                    'Everything in Standard',
                    'Personal trainer sessions',
                    'Nutrition guide',
                ],
                'is_popular' => false,
            ],
        ];

        foreach ($plans as $plan) {
            Membership::updateOrCreate(
                ['slug' => $plan['slug']],
                $plan
            );
        }
    }
}
