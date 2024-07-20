<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('arts', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->text("description");
            $table->foreignId("artist")->references("id")->on("artists");
            $table->string("path_light");
            $table->string("path_dark")->nullable();
            $table->boolean("has_dark_mode");
            $table->boolean("is_banner");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arts');
    }
};
