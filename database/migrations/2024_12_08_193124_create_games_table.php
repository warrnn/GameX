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
        Schema::create('games', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("name");
            $table->text("description");
            $table->integer("price");
            $table->uuid("category_id");
            $table->foreign("category_id")->references("id")->on("categories")->cascadeOnDelete();
            $table->string("publisher");
            $table->date("release_date");
            $table->enum("base", ["DIGITAL", "PHYSICAL"]);
            $table->string("portrait_image_path");
            $table->string("landscape_image_path");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game');
    }
};
