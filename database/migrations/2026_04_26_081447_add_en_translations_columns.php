<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('category_abillities', function (Blueprint $table) {
            $table->string('name_en')->nullable()->after('name');
        });

        Schema::table('abillities', function (Blueprint $table) {
            $table->string('name_en')->nullable()->after('name');
        });

        Schema::table('project_categories', function (Blueprint $table) {
            $table->string('name_en')->nullable()->after('name');
        });

        Schema::table('project_tags', function (Blueprint $table) {
            $table->string('name_en')->nullable()->after('name');
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->string('name_en')->nullable()->after('name');
            $table->text('description_en')->nullable()->after('description');
        });
    }

    public function down(): void
    {
        Schema::table('category_abillities', fn (Blueprint $t) => $t->dropColumn('name_en'));
        Schema::table('abillities', fn (Blueprint $t) => $t->dropColumn('name_en'));
        Schema::table('project_categories', fn (Blueprint $t) => $t->dropColumn('name_en'));
        Schema::table('project_tags', fn (Blueprint $t) => $t->dropColumn('name_en'));
        Schema::table('projects', function (Blueprint $t) {
            $t->dropColumn(['name_en', 'description_en']);
        });
    }
};
