<?php

namespace Database\Seeders;

use App\Models\Art;
use Illuminate\Database\Seeder;

class ArtsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 1000; $i++) {
        Art::seed(
            [
                [
                    "name" => "Testename1",
                    "description" => "Test description",
                    "artist" => 1,
                    "path_light" => "",
                    "path_dark" => "",
                    "has_dark_mode" => false,
                    "is_banner" => false,
                    "created_at" => now(),
                ],
                [
                    "name" => "Testename2",
                    "description" => "Test description",
                    "artist" => 1,
                    "path_light" => "",
                    "path_dark" => "",
                    "has_dark_mode" => true,
                    "is_banner" => false,
                    "created_at" => now(),
                ],
                [
                    "name" => "Testename3",
                    "description" => "Test description",
                    "artist" => 1,
                    "path_light" => "",
                    "path_dark" => "",
                    "has_dark_mode" => true,
                    "is_banner" => true,
                    "created_at" => now(),
                ]
            ]
        );
        }
    }
}
