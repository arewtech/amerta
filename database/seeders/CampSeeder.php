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
                "price" => 100,
                "description" => "Camp 1 description",
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
                "price" => 500,
                "description" => "Camp 2 description",
                // "benefits" => [
                //     [
                //         "title" => "Camp 2 benefit 1",
                //     ],
                //     [
                //         "title" => "Camp 2 benefit 2",
                //     ],
                // ],
            ],
        ];

        foreach ($camps as $camp) {
            Camp::create($camp);
            // $campModel = \App\Models\Camp::create($camp);
            // $campModel->benefits()->createMany($camp["benefits"]);
        }
    }
}
