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
        Schema::create('arts', function (Blueprint $table) {
            $table->id();
            $table->string("identifier");
            $table->string("name");
            $table->text("description");
            $table->string("path_light");
            $table->string("path_dark")->nullable();
            $table->boolean("is_banner");
            $table->string("path_card_light");
            $table->string("path_card_dark")->nullable();
            $table->boolean("suggestive")->default(false);
            $table->timestamps();
            $table->softDeletes();
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
