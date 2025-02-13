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
        Schema::create('practicas', function (Blueprint $table) {
            $table->id(); // Identificador único
            $table->string('nombre', 100); // Nombre de la práctica
            $table->text('descripcion'); // Descripción de la práctica
            $table->date('fecha_inicio'); // Fecha de inicio de la práctica
            $table->date('fecha_fin'); // Fecha de fin de la práctica
            $table->foreignId('alumno_id') // Clave foránea
                  ->constrained('alumnos') // Referencia a la tabla alumnos
                  ->onDelete('cascade'); // Si se elimina el alumno, se eliminan sus prácticas
            $table->timestamps(); // Campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('practicas');
    }
};