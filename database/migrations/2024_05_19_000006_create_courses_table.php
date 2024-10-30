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
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('unitCourse_id');
            $table->string('title');
            $table
                ->string('slug')
                ->nullable()
                ->unique();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->text('body')->nullable();
            $table->json('content_json')->nullable();
            $table->integer('order')->nullable();
            $table->unsignedBigInteger('teacher_id');
            $table
                ->boolean('active')
                ->default(false)
                ->nullable();

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
        Schema::dropIfExists('courses');
    }
};
