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
        Schema::create('question_exercice_qcms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('exercice_qcm_id');
            $table->string('title');
            $table->string('type')->nullable();
            $table->text('description')->nullable();
            $table->string('q1');
            $table->string('q2')->nullable();
            $table->string('q3')->nullable();
            $table->string('q4')->nullable();
            $table->string('answer')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_exercice_qcms');
    }
};
