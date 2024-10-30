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
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table
                ->string('slug')
                ->nullable()
                ->unique();
            $table->string('image')->nullable();
            $table
                ->boolean('active')
                ->default(false)
                ->nullable();
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->boolean('featured')->nullable();

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
        Schema::dropIfExists('articles');
    }
};
