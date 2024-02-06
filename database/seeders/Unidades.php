<?php

namespace Database\Seeders;

use App\Models\Unidade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Unidades extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $datos = [
            ['nombre'=>'got'],
            ['nombre'=>'mgota / µgota'],
            ['nombre'=>'L'],
            ['nombre'=>'mL'],
            ['nombre'=>'µL'],
            ['nombre'=>'cc / cm³'],
            ['nombre'=>'fl oz'],
            ['nombre'=>'cdita'],
            ['nombre'=>'cda'],
            ['nombre'=>'unid.'],
            ['nombre'=>'Kg'],
            ['nombre'=>'g'],
            ['nombre'=>'mg'],
            ['nombre'=>'mcg / µg'],
            ['nombre'=>'mcHA'],
            ['nombre'=>'ng'],
            ['nombre'=>'lb'],
            ['nombre'=>'oz'],
            ['nombre'=>'dosis'],
            ['nombre'=>'Eq'],
            ['nombre'=>'mEq'],
            ['nombre'=>'U'],
            ['nombre'=>'TU'],
            ['nombre'=>'mU'],
            ['nombre'=>'UI'],
            ['nombre'=>'miles UI'],
            ['nombre'=>'millones UI'],
            ['nombre'=>'d'],
            ['nombre'=>'h'],
            ['nombre'=>'Almh'],
            ['nombre'=>'Bolsa'],
            ['nombre'=>'Cap'],
            ['nombre'=>'Car'],
            ['nombre'=>'Cart'],
            ['nombre'=>'Com'],
            ['nombre'=>'Fras'],
            ['nombre'=>'Fras-Amp'],
            ['nombre'=>'Gom'],
            ['nombre'=>'Jer'],
            ['nombre'=>'Ovu'],
            ['nombre'=>'Parche'],
            ['nombre'=>'Past'],
            ['nombre'=>'Perl'],
            ['nombre'=>'Pil'],
            ['nombre'=>'Pip'],
            ['nombre'=>'Sach'],
            ['nombre'=>'Sob'],
            ['nombre'=>'Sup'],
            ['nombre'=>'Tab'],
            ['nombre'=>'Tin.Mad.'],
            ['nombre'=>'Troc'],
            ['nombre'=>'%'],
            ['nombre'=>'‰']
        ];
        foreach ($datos as $key => $dato) {
            # code...
            Unidade::create($dato);
        }
    }
}
