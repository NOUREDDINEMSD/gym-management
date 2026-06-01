<?php

namespace Database\Seeders;

use App\Models\Member;
use App\Models\Membership;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    public function run(): void
    {
        $plans = Membership::pluck('id', 'slug');

        $members = [
            ['member_code' => 'GYM001', 'name' => 'Alex Parker', 'phone' => '555-1001', 'membership_id' => $plans['basic'], 'joined_at' => '2025-01-15'],
            ['member_code' => 'GYM002', 'name' => 'Nina Lopez', 'phone' => '555-1002', 'membership_id' => $plans['standard'], 'joined_at' => '2025-03-20'],
            ['member_code' => 'GYM003', 'name' => 'Chris Martin', 'phone' => '555-1003', 'membership_id' => $plans['premium'], 'joined_at' => '2024-11-08'],
            ['member_code' => 'GYM004', 'name' => 'Emma Wilson', 'phone' => '555-1004', 'membership_id' => $plans['standard'], 'joined_at' => '2025-06-01'],
            ['member_code' => 'GYM005', 'name' => 'James Reed', 'phone' => '555-1005', 'membership_id' => $plans['basic'], 'joined_at' => '2025-08-12'],
            ['member_code' => 'GYM006', 'name' => 'Sara Kim', 'phone' => '555-1006', 'membership_id' => $plans['premium'], 'joined_at' => '2024-09-30'],
        ];

        foreach ($members as $data) {
            Member::updateOrCreate(
                ['member_code' => $data['member_code']],
                $data
            );
        }
    }
}
