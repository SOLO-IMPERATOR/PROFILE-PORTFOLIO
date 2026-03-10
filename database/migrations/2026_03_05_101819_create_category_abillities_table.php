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
        Schema::create('category_abillities', function (Blueprint $table) {
            $table->id()->from(1000);
            $table->timestamps();
            $table->string('name')->required();
            $table->string('class_icon')->nullable();
            $table->string('svg')->nullable();
            $table->string('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_abillities');
    }
};
