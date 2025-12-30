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
        Schema::create('inquiry_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inquiry_master_id');
            $table->unsignedBigInteger('item_id')->nullable();
            $table->string('description')->nullable();
            $table->integer('qty')->default(1);
            $table->string('unit')->nullable();
            $table->decimal('rate', 10, 2)->default(0);
            $table->decimal('amount', 10, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiry_detail');
    }
};
