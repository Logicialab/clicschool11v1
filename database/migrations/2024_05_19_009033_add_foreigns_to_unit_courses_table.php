<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('unit_courses', function (Blueprint $table) {
            $table
                ->foreign('classe_id')
                ->references('id')
                ->on('classes')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('subject_id')
                ->references('id')
                ->on('subjects')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('unit_courses', function (Blueprint $table) {
            $table->dropForeign(['classe_id']);
            $table->dropForeign(['subject_id']);
        });
    }
};
