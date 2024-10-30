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
        Schema::table('live_formation_participants', function (
            Blueprint $table
        ) {
            $table
                ->foreign('live_formation_id')
                ->references('id')
                ->on('live_formations')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('student_id')
                ->references('id')
                ->on('students')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('live_formation_participants', function (
            Blueprint $table
        ) {
            $table->dropForeign(['live_formation_id']);
            $table->dropForeign(['student_id']);
        });
    }
};
