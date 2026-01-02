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
        if (!Schema::hasTable('messages')) {
            Schema::create('messages', function (Blueprint $table) {
                $table->id();

                $table->foreignId('inquiry_id')->constrained()->cascadeOnDelete();
                $table->foreignId('travel_flight_id')->nullable()->constrained('travel_flights')->nullOnDelete();

                $table->unsignedBigInteger('sender_id');
                $table->string('sender_type'); // client | traveler

                $table->unsignedBigInteger('receiver_id');
                $table->string('receiver_type'); // client | traveler

                $table->string('title');
                $table->text('description');
                $table->string('image')->nullable();
                $table->timestamp('read_at')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
