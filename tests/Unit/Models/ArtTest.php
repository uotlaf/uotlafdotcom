<?php

namespace Models;

use App\Models\Art;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ArtTest extends TestCase
{

    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed();
    }

    public function testNew()
    {
        $this->assertTrue(Art::new(
            "Test Art",
            "Test description",
            1,
            "",
            "",
            false,
            false
        ));
    }

    public function testSeed()
    {
        $this->assertTrue(Art::seed(
            [
                [
                    "name" => "Testename1",
                    "description" => "Test description",
                    "artist" => 1,
                    "path_light" => "",
                    "path_dark" => "",
                    "has_dark_mode" => false,
                    "is_banner" => false,
                ],
                [
                    "name" => "Testename2",
                    "description" => "Test description",
                    "artist" => 1,
                    "path_light" => "",
                    "path_dark" => "",
                    "has_dark_mode" => true,
                    "is_banner" => false,
                ],
                [
                    "name" => "Testename3",
                    "description" => "Test description",
                    "artist" => 1,
                    "path_light" => "",
                    "path_dark" => "",
                    "has_dark_mode" => true,
                    "is_banner" => true,
                ]
            ]
        ));
    }
}
