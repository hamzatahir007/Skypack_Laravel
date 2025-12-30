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
        Schema::create('travel_flights', function (Blueprint $table) {
              $table->id();

        $table->unsignedBigInteger('traveler_id'); // client id
        $table->string('pnr_no')->nullable();
        $table->date('flight_date')->nullable();
        $table->string('origin')->nullable();
        $table->dateTime('origin_date_time')->nullable();
        $table->string('destination')->nullable();
        $table->dateTime('destination_date_time')->nullable();

        $table->string('status')->default('Pending'); // Pending / Completed / Cancelled
        $table->boolean('active')->default(1);

        $table->string('ticket_pic')->nullable();

        $table->decimal('weight', 10, 2)->nullable();
        $table->decimal('rate_per_unit', 10, 2)->nullable();
        $table->decimal('total', 10, 2)->nullable();

        $table->string('keyfield')->nullable();
        $table->string('Qrcode')->nullable();

        // system fields
        $table->integer('create_by')->nullable();
        $table->integer('update_by')->nullable();
        $table->integer('delete_by')->nullable();
        $table->timestamp('deleted_at')->nullable();

        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travel_flights');
    }
};
