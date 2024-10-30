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
        Schema::create('live_formations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->decimal('price')->nullable();
            $table->unsignedBigInteger('teacher_id');
            $table->string('url')->nullable();
            $table->string('duration')->nullable();
            $table->dateTime('scheduled_at')->nullable();
            $table->boolean('active')->nullable();
            $table
                ->string('slug')
                ->nullable()
                ->unique();

            $table->index('slug');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('live_formations');
    }
};
