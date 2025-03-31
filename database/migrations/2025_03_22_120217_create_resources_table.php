<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(
            'resources', function (Blueprint $table) {
                $table->id();
                $table->string('name')->comment('Имя ресурса');
                $table->string('type')->comment('Тип ресурса');
                $table->string('description')->nullable()->comment('Описание ресурса');
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resources');
    }
};
