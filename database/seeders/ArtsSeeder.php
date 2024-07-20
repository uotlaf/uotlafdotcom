<?php

namespace Database\Seeders;

use App\Models\Art;
use Exception;
use Illuminate\Database\Seeder;

class ArtsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @throws Exception
     */
    public function run(): void
    {
        Art::importFromStorage();
    }
}
