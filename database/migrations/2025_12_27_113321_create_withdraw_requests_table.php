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
        Schema::create('withdraw_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inquiry_master_id');
            $table->unsignedBigInteger('traveler_id');
            $table->decimal('amount', 10, 2);
            $table->string('status')->default('Pending');
            $table->string('screenshot')->nullable();
            $table->string('delete_by')->nullable();
            $table->string('deleted_at')->nullable();
            $table->timestamps();

            // Optional FK
            $table->foreign('traveler_id')
                ->references('id')->on('travelers')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('withdraw_requests');
    }
};
