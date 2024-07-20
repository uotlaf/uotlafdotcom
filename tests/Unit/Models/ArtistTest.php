<?php

namespace Models;

use App\Models\Artist;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ArtistTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed();
    }

    public function testSeed()
    {
        $this->assertTrue(Artist::seed(
            [
                [
                    "name" => "Testename1",
                    "link" => "Testlink1"
                ],
                [
                    "name" => "Testname2",
                    "link" => "Testlink2"
                ]
            ]
        ));
    }

    public function testNew()
    {
        $this->assertTrue(Artist::new("Testname", "TestLink"));
    }
}
