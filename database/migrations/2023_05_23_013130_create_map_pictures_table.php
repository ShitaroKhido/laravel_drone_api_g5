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
        Schema::create('map_pictures', function (Blueprint $table) {
            $table->id();
            $table->binary('scanned_map');
            $table->unsignedBigInteger('drone_id');
            $table -> foreign('drone_id')
                   ->references('id')
                   ->on('drones')
                   ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('map_pictures');
    }
};
