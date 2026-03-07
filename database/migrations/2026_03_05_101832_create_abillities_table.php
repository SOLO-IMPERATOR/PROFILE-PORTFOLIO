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
        Schema::create('abillities', function (Blueprint $table) {
            $table->id()->from(1000);
            $table->timestamps();
            $table->string('name')->required();
            $table->string('class_icon')->nullable();
            $table->string('svg')->nullable();
            $table->string('image')->nullable();
            $table->integer('level')->required();
            $table->foreignId('category_id')->constrained('category_abillities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abillities');
    }
};
