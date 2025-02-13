<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Practica;
use App\Models\Alumno;

class PracticaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $descripciones = [
            'Desarrollo de una aplicación web',
            'Investigación sobre inteligencia artificial',
            'Análisis de datos de mercado',
            'Desarrollo de una aplicación móvil',
            'Implementación de un sistema de gestión',
            'Desarrollo de un videojuego',
            'Investigación sobre ciberseguridad',
            'Desarrollo de una API REST',
            'Análisis de datos financieros',
            'Desarrollo de un sistema de recomendación'
        ];

        $empresas = [
            'INDRA SOLUCIONES TECNOLOGIAS DE LA INFORMACION SLU',
            'TECNILOGICA ECOSISTEMAS SAU',
            'BITCOINFORME SL.',
            'SABADELL DIGITAL S.A.',
            'ORACLE IBERICA SRL',
            'SAGE SPAIN, S.L.',
            'SPECIALIST COMPUTER CENTRES SL',
            'SISTEMAS INFORMATICOS ABIERTOS SAU',
            'LANTIK SOCIEDAD ANONIMA MEDIO PROPIO',
            'RURAL SERVICIOS INFORMATICOS SL',
            'STRATESYS TECHNOLOGY SOLUTIONS SL.',
            'WOLTERS KLUWER TAX AND ACCOUNTING ESPAÑA SL.',
            'TYPEFORM SL.',
            'ADSMURAI SL.',
            'GMV SOLUCIONES GLOBALES INTERNET SA',
            'CEGID SPAIN SA.',
            'SINGULAR PEOPLE EUROPE SLU',
            'PANDA SECURITY, S.L.U.',
            'OPEN DIGITAL SERVICES SL.',
            'MARBILL SPAIN SL.',
            'BILBOMATICA SOCIEDAD ANONIMA',
            'CRITEO ESPAÑA SL.',
            'LA FOURCHETTE ESPAÑA SL',
            'INFORMATIKA ZERBITZUEN FORU ELKARTEA-SOCIEDAD FORAL DE SERVICIOS INFORMATICOS SA',
            'DENODO SL',
            'SAS INSTITUTE SA',
            'TWILIO SPAIN SL.',
            'QLIK TECH IBERICA SL',
            'PLAIN CONCEPTS SOCIEDAD LIMITADA',
            'VARISTON INFORMATION TECHNOLOGY S.L.',
            'ESRI ESPAÑA SOLUCIONES GEOESPACIALES SL.',
            'SITICORE SL.',
            'IGALIA SL',
            'PAX TECH IBERIA, SOCIEDAD LIMITADA.',
            'JUNIPER CONSULTING SL.',
            'EVENTOS SINGULARES FLANDER SL.',
            'KANTOX EUROPEAN UNION S.L.',
            'CAJAMAR TECNOLOGIA AIE.',
            'GRAITEC SPAIN SOCIEDAD LIMITADA.',
            'INTERGRAPH ESPAÑA SA',
            'SCALEFAST SL.',
            'OCADO SPAIN SL.',
            'POWERNET I SL',
            'RAVENPACK INTERNATIONAL SL.',
            'GTD SISTEMAS DE INFORMACION SAU',
            'SUMA OPERADOR DE TELECOMUNICACIONES SL.',
            'MERCANZA SL',
            'ZARTIS SPAIN SL.',
            'NICEPEOPLEATWORK SL',
            'SOPRA FINANCIAL SOLUTIONS IBERIA SL.',
            'SOFTWARE DEL SOL SOCIEDAD ANONIMA',
            'TTTECHAUTO SPAIN S.L.'
        ];

        $alumnos = Alumno::all();

        for ($i = 0; $i < 100; $i++) {
            Practica::create([
                'nombre' => $empresas[array_rand($empresas)],
                'descripcion' => $descripciones[array_rand($descripciones)],
                'fecha_inicio' => now()->subDays(rand(1, 365)),
                'fecha_fin' => now()->addDays(rand(1, 365)),
                'alumno_id' => $alumnos->random()->id
            ]);
        }
    }
}