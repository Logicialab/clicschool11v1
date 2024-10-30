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
        Schema::table('competition_answers', function (Blueprint $table) {
            $table
                ->foreign('competition_question_id')
                ->references('id')
                ->on('competition_questions')
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
        Schema::table('competition_answers', function (Blueprint $table) {
            $table->dropForeign(['competition_question_id']);
            $table->dropForeign(['student_id']);
        });
    }
};
