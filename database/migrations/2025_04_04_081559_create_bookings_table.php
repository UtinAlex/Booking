<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(
            'bookings', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->foreign('user_id')->on('users')->references('id')
                    ->cascadeOnDelete()
                    ->cascadeOnUpdate();
                $table->unsignedBigInteger('resources_id');
                $table->foreign('resources_id')->on('resources')->references('id')
                    ->cascadeOnDelete()
                    ->cascadeOnUpdate();
                $table->dateTime('start_time')->comment('Начало бронирования');
                $table->dateTime('end_time')->comment('Окончание бронирования');
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
