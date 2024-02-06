<?php

namespace Database\Seeders;

use App\Models\Egrupo;
use App\Models\Egvalore;
use App\Models\Escala;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Escalas extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $escala1 = Escala::create([
            'nombre'=>'ESCALA GLASGOW'
        ]);
            $grupo11 = Egrupo::create([
                'nombre'=>'Respuesta Ocular',
                'escala_id'=>$escala1->id,
            ]);
                Egvalore::create([
                    'nombre'=>'Espontanea',
                    'valor'=>4,
                    'egrupo_id'=>$grupo11->id
                ]);
                Egvalore::create([
                    'nombre'=>'A ordenes',
                    'valor'=>3,
                    'egrupo_id'=>$grupo11->id
                ]);
                Egvalore::create([
                    'nombre'=>'A estimulo doloroso',
                    'valor'=>2,
                    'egrupo_id'=>$grupo11->id
                ]);
                Egvalore::create([
                    'nombre'=>'No hay respuesta',
                    'valor'=>1,
                    'egrupo_id'=>$grupo11->id
                ]);
            $grupo12 = Egrupo::create([
                'nombre'=>'Respuesta Verbal',
                'escala_id'=>$escala1->id,
            ]);
                Egvalore::create([
                    'nombre'=>'Orientada',
                    'valor'=>5,
                    'egrupo_id'=>$grupo12->id
                ]);
                Egvalore::create([
                    'nombre'=>'Confusa',
                    'valor'=>4,
                    'egrupo_id'=>$grupo12->id
                ]);
                Egvalore::create([
                    'nombre'=>'Palabras',
                    'valor'=>3,
                    'egrupo_id'=>$grupo12->id
                ]);
                Egvalore::create([
                    'nombre'=>'Sonidos',
                    'valor'=>2,
                    'egrupo_id'=>$grupo12->id
                ]);
                Egvalore::create([
                    'nombre'=>'No hay respuesta',
                    'valor'=>1,
                    'egrupo_id'=>$grupo12->id
                ]);
            $grupo13 = Egrupo::create([
                'nombre'=>'Respuesta Motora',
                'escala_id'=>$escala1->id,
            ]);
                Egvalore::create([
                    'nombre'=>'Obedece ordenes',
                    'valor'=>6,
                    'egrupo_id'=>$grupo13->id
                ]);
                Egvalore::create([
                    'nombre'=>'Localiza el dolor',
                    'valor'=>5,
                    'egrupo_id'=>$grupo13->id
                ]);
                Egvalore::create([
                    'nombre'=>'Retira el dolor',
                    'valor'=>4,
                    'egrupo_id'=>$grupo13->id
                ]);
                Egvalore::create([
                    'nombre'=>'Flexion anormal',
                    'valor'=>3,
                    'egrupo_id'=>$grupo13->id
                ]);
                Egvalore::create([
                    'nombre'=>'Respuesta',
                    'valor'=>2,
                    'egrupo_id'=>$grupo13->id
                ]);
                Egvalore::create([
                    'nombre'=>'No moviliza',
                    'valor'=>1,
                    'egrupo_id'=>$grupo13->id
                ]);

        ////////////////////////////////////////
        $escala2 = Escala::create([
            'nombre'=>'ESCALA NORTON'
        ]);
            $grupo21 = Egrupo::create([
                'nombre'=>'Estado Físico',
                'escala_id'=>$escala2->id
            ]);
                Egvalore::create([
                    'nombre'=>'Bueno',
                    'valor'=>4,
                    'egrupo_id'=>$grupo21->id,
                ]);
                Egvalore::create([
                    'nombre'=>'Mediano',
                    'valor'=>3,
                    'egrupo_id'=>$grupo21->id,
                ]);
                Egvalore::create([
                    'nombre'=>'Regular',
                    'valor'=>2,
                    'egrupo_id'=>$grupo21->id,
                ]);
                Egvalore::create([
                    'nombre'=>'Muy Malo',
                    'valor'=>1,
                    'egrupo_id'=>$grupo21->id,
                ]);

            $grupo22 = Egrupo::create([
                'nombre'=>'Estado Mental',
                'escala_id'=>$escala2->id
            ]);
                Egvalore::create([
                    'nombre'=>'Alerta',
                    'valor'=>4,
                    'egrupo_id'=>$grupo22->id,
                ]);
                Egvalore::create([
                    'nombre'=>'Apatico',
                    'valor'=>3,
                    'egrupo_id'=>$grupo22->id,
                ]);
                Egvalore::create([
                    'nombre'=>'Confuso',
                    'valor'=>2,
                    'egrupo_id'=>$grupo22->id,
                ]);
                Egvalore::create([
                    'nombre'=>'Estuporoso',
                    'valor'=>1,
                    'egrupo_id'=>$grupo22->id,
                ]);

            $grupo23 = Egrupo::create([
                'nombre'=>'Actividad',
                'escala_id'=>$escala2->id
            ]);
                Egvalore::create([
                    'nombre'=>'Camina',
                    'valor'=>4,
                    'egrupo_id'=>$grupo23->id,
                ]);
                Egvalore::create([
                    'nombre'=>'Camina con ayuda',
                    'valor'=>3,
                    'egrupo_id'=>$grupo23->id,
                ]);
                Egvalore::create([
                    'nombre'=>'En silla de ruedas',
                    'valor'=>2,
                    'egrupo_id'=>$grupo23->id,
                ]);
                Egvalore::create([
                    'nombre'=>'En cama',
                    'valor'=>1,
                    'egrupo_id'=>$grupo23->id,
                ]);

            $grupo24 = Egrupo::create([
                'nombre'=>'Movilidad',
                'escala_id'=>$escala2->id
            ]);
                Egvalore::create([
                    'nombre'=>'Completa',
                    'valor'=>4,
                    'egrupo_id'=>$grupo24->id,
                ]);
                Egvalore::create([
                    'nombre'=>'Disminuida',
                    'valor'=>3,
                    'egrupo_id'=>$grupo24->id,
                ]);
                Egvalore::create([
                    'nombre'=>'Muy Limitada',
                    'valor'=>2,
                    'egrupo_id'=>$grupo24->id,
                ]);
                Egvalore::create([
                    'nombre'=>'Inmovil',
                    'valor'=>1,
                    'egrupo_id'=>$grupo24->id,
                ]);
                
            $grupo25 = Egrupo::create([
                'nombre'=>'Incontinencia',
                'escala_id'=>$escala2->id
            ]);
                Egvalore::create([
                    'nombre'=>'Ninguna',
                    'valor'=>4,
                    'egrupo_id'=>$grupo25->id,
                ]);
                Egvalore::create([
                    'nombre'=>'Ocasional',
                    'valor'=>3,
                    'egrupo_id'=>$grupo25->id,
                ]);
                Egvalore::create([
                    'nombre'=>'Urinaria o fecal',
                    'valor'=>2,
                    'egrupo_id'=>$grupo25->id,
                ]);
                Egvalore::create([
                    'nombre'=>'Urinaria y fecal',
                    'valor'=>1,
                    'egrupo_id'=>$grupo25->id,
                ]);

        $escala3 = Escala::create([
            'nombre'=>'ESCALA DOWNTON'
        ]);
            $grupo31 = Egrupo::create([
                'nombre'=>'Caidas previas',
                'escala_id'=>$escala3->id
            ]);
                Egvalore::create([
                    'nombre'=>'NO',
                    'valor'=>0,
                    'egrupo_id'=>$grupo31->id,
                ]);
                Egvalore::create([
                    'nombre'=>'SI',
                    'valor'=>0,
                    'egrupo_id'=>$grupo31->id,
                ]);

            $grupo32 = Egrupo::create([
                'nombre'=>'Medicacion',
                'escala_id'=>$escala3->id
            ]);
                Egvalore::create([
                    'nombre'=>'Ninguno',
                    'valor'=>0,
                    'egrupo_id'=>$grupo32->id,
                ]);
                Egvalore::create([
                    'nombre'=>'Tranquilizantes - Sedantes',
                    'valor'=>1,
                    'egrupo_id'=>$grupo32->id,
                ]);
                Egvalore::create([
                    'nombre'=>'Diureticos',
                    'valor'=>1,
                    'egrupo_id'=>$grupo32->id,
                ]);
                Egvalore::create([
                    'nombre'=>'Hipotensores',
                    'valor'=>1,
                    'egrupo_id'=>$grupo32->id,
                ]);
                Egvalore::create([
                    'nombre'=>'Antiparkinsonianos',
                    'valor'=>1,
                    'egrupo_id'=>$grupo32->id,
                ]);
                Egvalore::create([
                    'nombre'=>'Antidepresivos',
                    'valor'=>1,
                    'egrupo_id'=>$grupo32->id,
                ]);
                Egvalore::create([
                    'nombre'=>'Otros Medicamentos',
                    'valor'=>1,
                    'egrupo_id'=>$grupo32->id,
                ]);


            $grupo33 = Egrupo::create([
                'nombre'=>'Deficit sensorial',
                'escala_id'=>$escala3->id
            ]);
                Egvalore::create([
                    'nombre'=>'Ninguno',
                    'valor'=>0,
                    'egrupo_id'=>$grupo33->id,
                ]);
                Egvalore::create([
                    'nombre'=>'Alteraciones Visuales',
                    'valor'=>1,
                    'egrupo_id'=>$grupo33->id,
                ]);
                Egvalore::create([
                    'nombre'=>'Alteraciones Auditivas',
                    'valor'=>1,
                    'egrupo_id'=>$grupo33->id,
                ]);
                Egvalore::create([
                    'nombre'=>'Extremidades (ICTUS)',
                    'valor'=>1,
                    'egrupo_id'=>$grupo33->id,
                ]);


            $grupo34 = Egrupo::create([
                'nombre'=>'Estado mental',
                'escala_id'=>$escala3->id
            ]);
                Egvalore::create([
                    'nombre'=>'Orientado',
                    'valor'=>0,
                    'egrupo_id'=>$grupo34->id,
                ]);
                Egvalore::create([
                    'nombre'=>'Confuso',
                    'valor'=>1,
                    'egrupo_id'=>$grupo34->id,
                ]);

            $grupo35 = Egrupo::create([
                'nombre'=>'Deambulación',
                'escala_id'=>$escala3->id
            ]);
                Egvalore::create([
                    'nombre'=>'Normal',
                    'valor'=>0,
                    'egrupo_id'=>$grupo35->id,
                ]);
                Egvalore::create([
                    'nombre'=>'Segura con ayuda',
                    'valor'=>1,
                    'egrupo_id'=>$grupo35->id,
                ]);
                Egvalore::create([
                    'nombre'=>'Insegura con/sin ayuda',
                    'valor'=>1,
                    'egrupo_id'=>$grupo35->id,
                ]);
                Egvalore::create([
                    'nombre'=>'Imposible',
                    'valor'=>1,
                    'egrupo_id'=>$grupo35->id,
                ]);

        $escala4 = Escala::create([
            'nombre'=>'CAIDA DE MACDEMS'
        ]);
            $grupo41 = Egrupo::create([
                'nombre'=>'Edad',
                'escala_id'=>$escala4->id
            ]);
                Egvalore::create([
                    'nombre'=>'Recien Nacido',
                    'valor'=>2,
                    'egrupo_id'=>$grupo41->id,
                ]);
                Egvalore::create([
                    'nombre'=>'Lactante menor',
                    'valor'=>2,
                    'egrupo_id'=>$grupo41->id,
                ]);
                Egvalore::create([
                    'nombre'=>'Lactante mayor',
                    'valor'=>3,
                    'egrupo_id'=>$grupo41->id,
                ]);
                Egvalore::create([
                    'nombre'=>'Pre escolar',
                    'valor'=>3,
                    'egrupo_id'=>$grupo41->id,
                ]);
                Egvalore::create([
                    'nombre'=>'Escolar',
                    'valor'=>1,
                    'egrupo_id'=>$grupo41->id,
                ]);

            $grupo42 = Egrupo::create([
                'nombre'=>'Antecedentes de caida',
                'escala_id'=>$escala4->id
            ]);
                Egvalore::create([
                    'nombre'=>'SI',
                    'valor'=>1,
                    'egrupo_id'=>$grupo42->id,
                ]);
                Egvalore::create([
                    'nombre'=>'NO',
                    'valor'=>0,
                    'egrupo_id'=>$grupo42->id,
                ]);

            $grupo43 = Egrupo::create([
                'nombre'=>'Antecedentes',
                'escala_id'=>$escala4->id
            ]);
                Egvalore::create([
                    'nombre'=>'Sin antecedentes',
                    'valor'=>0,
                    'egrupo_id'=>$grupo43->id,
                ]);
                Egvalore::create([
                    'nombre'=>'Hiperactividad',
                    'valor'=>1,
                    'egrupo_id'=>$grupo43->id,
                ]);
                Egvalore::create([
                    'nombre'=>'Problemas musculares',
                    'valor'=>1,
                    'egrupo_id'=>$grupo43->id,
                ]);
                Egvalore::create([
                    'nombre'=>'Sindrome convulsivo',
                    'valor'=>1,
                    'egrupo_id'=>$grupo43->id,
                ]);
                Egvalore::create([
                    'nombre'=>'Daño organico cerebral',
                    'valor'=>1,
                    'egrupo_id'=>$grupo43->id,
                ]);
                Egvalore::create([
                    'nombre'=>'Otros',
                    'valor'=>1,
                    'egrupo_id'=>$grupo43->id,
                ]);
                
            $grupo44 = Egrupo::create([
                'nombre'=>'Compromiso de conciencia',
                'escala_id'=>$escala4->id
            ]);
                Egvalore::create([
                    'nombre'=>'NO',
                    'valor'=>0,
                    'egrupo_id'=>$grupo44->id,
                ]);
                Egvalore::create([
                    'nombre'=>'SI',
                    'valor'=>1,
                    'egrupo_id'=>$grupo44->id,
                ]);
    }
}
