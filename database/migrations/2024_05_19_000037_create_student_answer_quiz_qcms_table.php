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
        Schema::create('student_answer_quiz_qcms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('questionQuizQcm_id');
            $table->unsignedBigInteger('student_id');
            $table->text('text');
            $table->boolean('is_correct')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_answer_quiz_qcms');
    }
};