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
        Schema::table('travel_flights', function (Blueprint $table) {
    $table->text('description')->nullable()->after('rate_per_unit');
    $table->json('restrictions')->nullable()->after('description');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('travel_flights', function (Blueprint $table) {
            //
        });
    }
};
