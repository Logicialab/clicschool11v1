<?php

use App\Models\Level;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('unit_courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('classe_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table
                ->string('slug')
                ->nullable()
                ->unique();
            $table->string('image')->nullable();
            $table->string('order')->nullable();
            $table->unsignedBigInteger('subject_id');
            $table->foreignIdFor(Level::class);

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
        Schema::dropIfExists('unit_courses');
    }
};
