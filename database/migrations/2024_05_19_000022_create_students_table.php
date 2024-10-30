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
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('classe_id');
            $table->string('name');
            $table
                ->string('slug')
                ->nullable()
                ->unique();
            $table->string('nickname')->nullable();
            $table->string('home_adress')->nullable();
            $table->string('street')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('city')->nullable();
            $table->string('school_name')->nullable();
            $table->string('student_level')->nullable();
            $table->string('name_guardian')->nullable();
            $table->string('Profession')->nullable();
            $table->string('etablissement_travail')->nullable();

            $table->index('slug');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
