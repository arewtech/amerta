<?php

namespace Database\Seeders;

use App\Models\Camp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CampSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $camps = [
            [
                "title" => "Basic Laravel Camp",
                "slug" => "basic-laravel-camp",
                "tagline" =>
                    "Belajar Laravel dari dasar hingga mahir dengan para mentor yang berpengalaman",
                "price" => 130000,
                "description" => fake()->paragraph(5),
                "status" => "active",
                // "benefits" => [
                //     [
                //         "title" => "Camp 1 benefit 1",
                //     ],
                //     [
                //         "title" => "Camp 1 benefit 2",
                //     ],
                // ],
            ],
            [
                "title" => "Expert Laravel Camp",
                "slug" => "expert-laravel-camp",
                "tagline" =>
                    "Belajar Laravel lanjutan dari para mentor yang berpengalaman dan ahli di bidangnya",
                "price" => 360000,
                "description" => fake()->paragraph(5),
                "status" => "active",
            ],
            [
                "title" => "Expert Vue Camp",
                "slug" => "expert-vue-camp",
                "tagline" =>
                    "Belajar vue js masse, langsung aja masse kita sat set belajarnya digidaw",
                "price" => 127000,
                "description" => fake()->paragraph(5),
                "status" => "inactive",
            ],
        ];

        foreach ($camps as $camp) {
            Camp::create($camp);
            // $campModel = \App\Models\Camp::create($camp);
            // $campModel->benefits()->createMany($camp["benefits"]);
        }
    }
}
