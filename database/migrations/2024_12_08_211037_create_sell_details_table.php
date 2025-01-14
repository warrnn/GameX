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
        Schema::create('sell_details', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->uuid("seller_id");
            $table->foreign("seller_id")->references("id")->on("sellers")->cascadeOnDelete();
            $table->uuid("game_id");
            $table->foreign("game_id")->references("id")->on("games")->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sell_details');
    }
};
