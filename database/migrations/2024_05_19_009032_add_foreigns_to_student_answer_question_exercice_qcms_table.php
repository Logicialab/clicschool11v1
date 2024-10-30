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
        Schema::table('student_answer_question_exercice_qcms', function (
            Blueprint $table
        ) {
            $table
                ->foreign('question_exercice_qcm_id', 'foreign_alias_0000001')
                ->references('id')
                ->on('question_exercice_qcms')
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
        Schema::table('student_answer_question_exercice_qcms', function (
            Blueprint $table
        ) {
            $table->dropForeign(['question_exercice_qcm_id']);
            $table->dropForeign(['student_id']);
        });
    }
};
