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
        Schema::create('article_article_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('article_id')->references('id')->on('articles')->onDelete('cascade');
            $table->foreignId('article_tag_id')->references('id')->on('article_tags')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_article_tag');
    }
};
