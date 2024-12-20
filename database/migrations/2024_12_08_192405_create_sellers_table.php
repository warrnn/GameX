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
        Schema::create('sellers', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("domicile");
            $table->string("address");
            $table->string("phone", 16)->unique();
            $table->uuid("user_id");
            $table->foreign("user_id")->references("id")->on("users")->cascadeOnDelete();
            $table->enum("status", ["ACTIVE", "INACTIVE"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seller');
    }
};
