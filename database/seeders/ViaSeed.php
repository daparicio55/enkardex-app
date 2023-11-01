<?php

namespace Database\Seeders;

use App\Models\Via;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ViaSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $datos = [
            ['nombre'=>'VIA ORAL'],
            ['nombre'=>'VIA SUBLINGUAL'],
            ['nombre'=>'VIA INTRADERMICA'],
            ['nombre'=>'VIA SUBCUTANEA'],
            ['nombre'=>'VIA INTRAMUSCULAR'],
            ['nombre'=>'VIA ENDOVENOSA'],
            ['nombre'=>'VIA INTRA TECAL'],
            ['nombre'=>'VIA RECTAL'],
            ['nombre'=>'VIA VAGINAL'],
            ['nombre'=>'VIA OCULAR'],
            ['nombre'=>'VIA OTICA'],
            ['nombre'=>'VIA NASAL'],
            ['nombre'=>'VIA INHALATORIA'],
            ['nombre'=>'VIA CUTANEA'],
            ['nombre'=>'VIA TRANSDERMICA'],
            ['nombre'=>'OTROS'],
        ];
        foreach ($datos as $key => $dato) {
            # code...
            Via::create($dato);
        }
    }
}
