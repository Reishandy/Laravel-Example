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
        Schema::create('aircraft', function (Blueprint $table) {
            $table->id();
//            $table->unsignedBigInteger('manufacturer_id');
            $table->foreignIdFor(\App\Models\Manufacturer::class);
            $table->string('code')->unique();
            $table->string('name');
            $table->string('type');
//            $table->string('role');
//            $table->string('origin');
//            $table->string('manufacturer');
//            $table->integer('introduced_year');
//            $table->integer('crew');
//            $table->integer('speed_max_kmh');
//            $table->integer('range_km');
//            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aircraft');
    }
};
