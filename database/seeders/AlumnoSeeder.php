<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Alumno;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nombres = [
            'Juan', 'María', 'Pedro', 'Ana', 'Luis', 'Laura', 'Carlos', 'Marta', 'Jorge', 'Elena',
            'Sofía', 'Miguel', 'Lucía', 'Diego', 'Paula', 'Alberto', 'Carmen', 'Raúl', 'Sara', 'David',
            'Andrés', 'Beatriz', 'Fernando', 'Gloria', 'Hugo', 'Isabel', 'Jaime', 'Karla', 'Leonardo', 'Manuela',
            'Nicolás', 'Olga', 'Pablo', 'Rocío', 'Sergio', 'Teresa', 'Ulises', 'Valeria', 'Walter', 'Ximena',
            'Yolanda', 'Zacarías', 'Adriana', 'Bruno', 'Clara', 'Diana', 'Emilio', 'Fabiola', 'Gabriel', 'Helena',
            'Ignacio', 'Julia', 'Kevin', 'Lorena', 'Marcos', 'Natalia', 'Oscar', 'Patricia', 'Quintín', 'Rafael',
            'Silvia', 'Tomás', 'Ursula', 'Víctor', 'Wendy', 'Xavier', 'Yago', 'Zoe'
        ];

        $apellidos = [
            'García', 'Martínez', 'Rodríguez', 'López', 'González', 'Pérez', 'Sánchez', 'Ramírez', 'Torres', 'Flores',
            'Rivera', 'Gómez', 'Díaz', 'Cruz', 'Morales', 'Ortiz', 'Reyes', 'Ruiz', 'Vargas', 'Castillo',
            'Jiménez', 'Mendoza', 'Romero', 'Herrera', 'Medina', 'Aguilar', 'Castro', 'Vega', 'Ramos', 'Chávez',
            'Soto', 'Gutiérrez', 'Rojas', 'Guerrero', 'Molina', 'Delgado', 'Ortiz', 'Silva', 'Núñez', 'Cabrera',
            'Ríos', 'Campos', 'Peña', 'Vargas', 'Cortés', 'Acosta', 'Miranda', 'Pacheco', 'Santos', 'Espinoza'
        ];

        foreach ($nombres as $nombre) {
            Alumno::create([
                'nombre' => $nombre . ' ' . $apellidos[array_rand($apellidos)],
                'email' => strtolower($nombre) . '@example.com',
                'edad' => rand(18, 25)
            ]);
        }
    }
}