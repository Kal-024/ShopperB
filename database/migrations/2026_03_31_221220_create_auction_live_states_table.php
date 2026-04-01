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
        Schema::create('auction_live_states', function (Blueprint $table) {
            $table->id();
            $table->foreignId('auction_id')->constrained('auction')->onDelete('cascade');
            $table->foreignId('current_item_id')->constrained('auction_item')->onDelete('cascade');
            $table->timestamp('started_at');
            $table->timestamp('ended_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auction_live_states');
    }
};
