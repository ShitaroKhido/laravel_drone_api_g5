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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->dateTime('assigned_datetime');
            $table->unsignedBigInteger('drone_id');
            $table->foreign('drone_id')
                ->references('id')
                ->on('drones')
                ->onDelete('cascade');
            $table->unsignedBigInteger('instrction_id');
            $table->foreign('instrction_id')
                ->references('id')
                ->on('instrctions')
                ->onDelete('cascade');
            $table->unsignedBigInteger('farm_id');
            $table->foreign('farm_id')
                ->references('id')
                ->on('farms')
                ->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
