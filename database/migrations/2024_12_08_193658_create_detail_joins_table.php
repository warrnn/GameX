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
        Schema::create('detail_joins', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->uuid("user_id");
            $table->foreign("user_id")->references("id")->on("users")->cascadeOnDelete();
            $table->uuid("community_id");
            $table->foreign("community_id")->references("id")->on("communities")->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_join');
    }
};
