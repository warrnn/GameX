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
        Schema::create('post', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("value");
            $table->uuid("user_id");
            $table->foreign("user_id")->references("id")->on("user")->onDelete("cascade");
            $table->uuid("community_id");
            $table->foreign("community_id")->references("id")->on("community")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post');
    }
};
