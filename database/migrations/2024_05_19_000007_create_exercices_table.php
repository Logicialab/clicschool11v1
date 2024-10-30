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
        Schema::create('exercices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('course_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table
                ->string('slug')
                ->nullable()
                ->unique();
            $table->boolean('active')->default(false);
            $table->string('file')->nullable();
            $table->integer('order')->nullable();
            $table->string('solution')->nullable();
            $table->string('file_solution')->nullable();
            $table->boolean('active_solution')->nullable();

            $table->index('title');
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
        Schema::dropIfExists('exercices');
    }
};
