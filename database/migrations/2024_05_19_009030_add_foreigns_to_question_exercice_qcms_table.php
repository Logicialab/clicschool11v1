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
        Schema::table('question_exercice_qcms', function (Blueprint $table) {
            $table
                ->foreign('exercice_qcm_id')
                ->references('id')
                ->on('exercice_qcms')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('question_exercice_qcms', function (Blueprint $table) {
            $table->dropForeign(['exercice_qcm_id']);
        });
    }
};
