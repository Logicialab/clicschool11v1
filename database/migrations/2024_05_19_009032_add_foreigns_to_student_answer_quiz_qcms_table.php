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
        Schema::table('student_answer_quiz_qcms', function (Blueprint $table) {
            $table
                ->foreign('questionQuizQcm_id')
                ->references('id')
                ->on('question_quiz_qcms')
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
        Schema::table('student_answer_quiz_qcms', function (Blueprint $table) {
            $table->dropForeign(['questionQuizQcm_id']);
            $table->dropForeign(['student_id']);
        });
    }
};
