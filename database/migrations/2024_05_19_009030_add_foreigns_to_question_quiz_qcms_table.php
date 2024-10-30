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
        Schema::table('question_quiz_qcms', function (Blueprint $table) {
            $table
                ->foreign('quizqcm_id')
                ->references('id')
                ->on('quiz_qcms')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('question_quiz_qcms', function (Blueprint $table) {
            $table->dropForeign(['quizqcm_id']);
        });
    }
};
