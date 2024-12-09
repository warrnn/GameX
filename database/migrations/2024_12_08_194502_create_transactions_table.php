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
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->date("transaction_date");
            $table->string("payment_proof");
            $table->string("shipping_number")->nullable();
            $table->enum("status", ["PROCESS", "DELIVERY", "SUCCESS", "FAILED"]);
            $table->uuid("buyer_id");
            $table->foreign("buyer_id")->references("id")->on("buyers")->cascadeOnDelete();
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
        Schema::dropIfExists('transaction');
    }
};
