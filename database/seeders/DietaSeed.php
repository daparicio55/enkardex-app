<?php

namespace Database\Seeders;

use App\Models\Dieta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DietaSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $datos = [
            ['nombre'=>'NPO ( nada por via oral)'],
            ['nombre'=>'Dieta Normal'],
            ['nombre'=>'Dieta Liquida '],
            ['nombre'=>'Dieta Licuada '],
            ['nombre'=>'Dieta Blanda'],
            ['nombre'=>'Dieta Con Modificacion de la textura'],
            ['nombre'=>'Dieta Hiperproteica'],
            ['nombre'=>'Dieta Hipercelulosica'],
            ['nombre'=>'Dieta Sin Residuos'],
            ['nombre'=>'Dieta Hipocalorica'],
            ['nombre'=>'Dieta Hipoglucida'],
            ['nombre'=>'Dieta Hiposodica'],
            ['nombre'=>'Dieta Hipoproteica'],
            ['nombre'=>'Dieta Hipograsa'],
            ['nombre'=>'Dieta Hipoalergenica'],
            ['nombre'=>'Dieta Hipopurinica'],
        ];
        foreach ($datos as $key => $dato) {
            # code...
            Dieta::create($dato);
        }
    }
}
