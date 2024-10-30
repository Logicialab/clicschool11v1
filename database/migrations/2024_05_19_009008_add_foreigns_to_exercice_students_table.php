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
        Schema::table('exercice_students', function (Blueprint $table) {
            $table
                ->foreign('exercice_id')
                ->references('id')
                ->on('exercices')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('student_id')
                ->references('id')
                ->on('students')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('exercice_students', function (Blueprint $table) {
            $table->dropForeign(['exercice_id']);
            $table->dropForeign(['student_id']);
        });
    }
};
