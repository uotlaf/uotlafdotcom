<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('art_artist', function (Blueprint $table) {
            $table->id();
            $table->foreignId('art_id')->references('id')->on('arts')->onDelete('cascade');
            $table->foreignId('artist_id')->references('id')->on('artists')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('art_artist');
    }
};
