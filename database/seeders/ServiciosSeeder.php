<?php

namespace Database\Seeders;

use App\Models\Servicios;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Servicios::create([
            'nombre' => 'Corte de Cabello Tradicional',
            'descripcion' => 'Corte clásico con lavado y peinado incluido.',
            'precio' => 12.00,
            'duracion_estimada' => 30,
        ]);

        Servicios::create([
            'nombre' => 'Perfilado de Barba',
            'descripcion' => 'Afeitado con toalla caliente y diseño de barba.',
            'precio' => 8.00,
            'duracion_estimada' => 20,
        ]);
    }
}
