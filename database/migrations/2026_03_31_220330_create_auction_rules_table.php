<?php

use App\Models\Auction;
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
        Schema::create('auction_rules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('auction_id')->constrained('auction')->onDelete('cascade');
            $table->integer('max_purchases');
            $table->integer('regeneration_seconds');
            $table->integer('max_total_purchases');
            $table->integer('reservartion_timeout_seconds');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auction_rules');
    }
};
