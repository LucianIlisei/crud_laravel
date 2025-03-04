<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('alumnos', function (Blueprint $table) {
            $table->foreignId('proyecto_id')
                  ->nullable()
                  ->constrained('proyectos')
                  ->onDelete('cascade'); // Si un proyecto se elimina, se eliminan sus alumnos.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('alumnos', function (Blueprint $table) {
            $table->dropForeign(['proyecto_id']);
            $table->dropColumn('proyecto_id');
        });
    }
};
