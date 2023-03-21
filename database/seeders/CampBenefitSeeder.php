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
                "name" => "Apa Itu Laravel",
            ],
            [
                "camp_id" => 1,
                "name" => "Mengenal Routing Laravel",
            ],
            [
                "camp_id" => 1,
                "name" => "Mengenal Controller Laravel",
            ],
            [
                "camp_id" => 1,
                "name" => "Mengenal Model Laravel",
            ],
            [
                "camp_id" => 2,
                "name" => "Apa itu Refactoring Code",
            ],
            [
                "camp_id" => 2,
                "name" => "Mengenal SOLID Principle",
            ],
            [
                "camp_id" => 2,
                "name" => "Mengenal Clean Code",
            ],
            [
                "camp_id" => 2,
                "name" => "Mengenal Design Pattern",
            ],
            // [
            //     "camp_id" => 3,
            //     "name" => "Apa itu Vue",
            // ],
            // [
            //     "camp_id" => 3,
            //     "name" => "Mengenal Vue CLI",
            // ],
            // [
            //     "camp_id" => 3,
            //     "name" => "Mengenal Vue Router",
            // ],
            // [
            //     "camp_id" => 3,
            //     "name" => "Mengenal Vuex",
            // ],
        ];
        CampBenefit::insert($camp_benefit);
    }
}
