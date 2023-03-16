<?php

namespace Database\Seeders;

use App\Models\CampBenefit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CampBenefitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $camp_benefit = [
            [
                "camp_id" => 1,
                "name" => "Camp 1 benefit 1",
            ],
            [
                "camp_id" => 1,
                "name" => "Camp 1 benefit 2",
            ],
            [
                "camp_id" => 2,
                "name" => "Camp 2 benefit 1",
            ],
            [
                "camp_id" => 2,
                "name" => "Camp 2 benefit 2",
            ],
        ];
        CampBenefit::insert($camp_benefit);
    }
}
