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
        Schema::create('drone_locations', function (Blueprint $table) {
            $table->id();
            $table->string('latitude');
            $table->string('logitude');
            $table->unsignedBigInteger('drone_id');
            $table -> foreign('drone_id')
                   ->references('id')
                   ->on('drones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drone_lacations');
    }
};
