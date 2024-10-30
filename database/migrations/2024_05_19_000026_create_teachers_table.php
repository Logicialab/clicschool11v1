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
        Schema::create('teachers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('nickname')->nullable();
            $table->text('bio')->nullable();
            $table->string('image')->nullable();
            $table->decimal('salaire')->nullable();
            $table
                ->string('slug')
                ->nullable()
                ->unique();
            $table->string('school_name')->nullable();
            $table->string('specialite')->nullable();

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
        Schema::dropIfExists('teachers');
    }
};
