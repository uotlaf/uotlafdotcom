<?php

namespace Database\Seeders;

use App\Models\Artist;
use Illuminate\Database\Seeder;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Artist::seed(
            [
                [
                    "name" => "Five_Flare",
                    "link" => "https://twitter.com/Five_Flare"
                ],
                [
                    "name" => "Bernachá",
                    "link" => "https://twitter.com/AndreLovesSushi"
                ]
            ]
        );
    }
}
