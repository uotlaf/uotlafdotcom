<?php

namespace Tests\Feature\Models;

use App\Models\Artist as ArtistModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Artist extends TestCase
{
    /**
     * A basic feature test example.
     */

    public function new(): void {
        $this->assertTrue(ArtistModel::new("Testname", "TestLink"));
    }

    public function seed(): void {
        $this->assertTrue(ArtistModel::seed(
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
}
