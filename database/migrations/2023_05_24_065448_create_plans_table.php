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
                ->on('drones');
            $table->unsignedBigInteger('instruction_id');
            $table->foreign('instruction_id')
                ->references('id')
                ->on('instructions');
            $table->unsignedBigInteger('farm_id');
            $table->foreign('farm_id')
                ->references('id')
                ->on('farms');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
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
