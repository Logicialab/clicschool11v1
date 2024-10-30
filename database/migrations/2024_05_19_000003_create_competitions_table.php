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
        Schema::create('competitions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->date('date_start');
            $table->date('date_end')->nullable();
            $table->string('file')->nullable();
            $table
                ->boolean('active')
                ->default(false)
                ->nullable();
            $table->unsignedBigInteger('classe_id');
            $table
                ->string('slug')
                ->nullable()
                ->unique();
            $table->integer('order')->nullable();

            $table->index('slug');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competitions');
    }
};
