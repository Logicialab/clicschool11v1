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
        Schema::create('exercice_students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('exercice_id');
            $table->unsignedBigInteger('student_id');
            $table->string('file')->nullable();
            $table->text('content')->nullable();
            $table->boolean('is_correct')->nullable();
            $table->string('note')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercice_students');
    }
};
