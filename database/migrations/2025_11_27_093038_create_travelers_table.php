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
        Schema::create('travelers', function (Blueprint $table) {
            $table->id();
             $table->string('full_name');
        $table->string('country');
        $table->string('email')->unique();
        $table->string('mobile_number');
        $table->string('mobile_number_2')->nullable();
        $table->boolean('active')->default(1); // <-- Add this
        $table->string('address');
        $table->string('city');
        $table->string('password')->nullable();
        $table->date('passport_expiry')->nullable();
        $table->string('passport_no')->nullable();
        $table->string('ID_number')->nullable();
        $table->string('profession')->nullable();
        $table->enum('gender', ['male', 'female'])->nullable();
        $table->string('passport_pic')->nullable();
        $table->string('profile_image')->nullable();
        $table->string('create_by')->nullable();
        $table->string('update_by')->nullable();
        $table->string('delete_by')->nullable();
        $table->string('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travelers');
    }
};
