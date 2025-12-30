<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('inventory', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('under')->nullable();
            $table->boolean('isgroup')->default(false);
            $table->integer('level')->nullable();
            $table->text('description')->nullable();
            $table->boolean('active')->default(true);
            $table->decimal('rate', 12, 2)->default(0);
            $table->string('unit')->nullable(); // e.g. kg, grams
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('size')->nullable();
            $table->string('keyfield')->nullable();
            $table->unsignedBigInteger('create_by')->nullable();
            $table->timestamp('create_at')->nullable();
            $table->unsignedBigInteger('update_by')->nullable();
            $table->timestamp('update_at')->nullable();
            $table->unsignedBigInteger('delete_by')->nullable();
            $table->timestamp('delete_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inventory');
    }
};
