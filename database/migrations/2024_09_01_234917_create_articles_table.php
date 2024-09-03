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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("subtitle")->nullable();
            $table->string("author");
            $table->string("path_banner_light")->nullable();
            $table->string("path_banner_dark")->nullable();
            $table->string("identifier")->unique();
            $table->string("language");
            $table->string("assets_folder")->nullable();
            $table->boolean("hide_from_posts")->default(false);
            $table->integer("views")->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
