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
        Schema::create('live_formation_participants', function (
            Blueprint $table
        ) {
            $table->bigIncrements('id');
            $table->string('time')->nullable();
            $table->unsignedBigInteger('live_formation_id');
            $table->unsignedBigInteger('student_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('live_formation_participants');
    }
};
