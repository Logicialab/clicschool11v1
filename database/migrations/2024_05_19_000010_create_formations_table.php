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
        Schema::create('formations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->unsignedBigInteger('formation_type_id');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('status')->nullable();
            $table->unsignedBigInteger('teacher_id');
            $table->boolean('active')->default(false);
            $table
                ->string('slug')
                ->nullable()
                ->unique();
            $table->decimal('price');

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
        Schema::dropIfExists('formations');
    }
};
