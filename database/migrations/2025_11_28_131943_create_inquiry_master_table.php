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
        Schema::create('inquiry_master', function (Blueprint $table) {
             $table->id();
        $table->unsignedBigInteger('client_id')->nullable();
        $table->unsignedBigInteger('travel_flight_id')->nullable();
        $table->date('entry_date')->nullable();
        $table->string('status')->default('Pending');
        $table->text('remarks')->nullable();
        $table->boolean('active')->default(1);
        $table->string('delivery_address')->nullable();
        $table->string('contact_person')->nullable();
        $table->string('contact_no')->nullable();
        $table->string('Qrcode')->nullable();
         $table->integer('delete_by')->nullable();
        $table->timestamp('deleted_at')->nullable();
        $table->string('ucode')->nullable();
        $table->unsignedBigInteger('traveler_id')->nullable();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiry_master');
    }
};
