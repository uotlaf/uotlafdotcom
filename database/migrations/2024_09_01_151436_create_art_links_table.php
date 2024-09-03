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
        Schema::create('art_links', function (Blueprint $table) {
            $table->foreignId('art_id')->references('id')->on('arts')->onDelete('cascade');
            $table->string("name");
            $table->string("link");
            $table->string("icon");
            $table->timestamps();
            $table->softDeletes();
            $table->primary(["art_id", "name"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('art_links');
    }
};
