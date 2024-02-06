<?php

namespace Database\Seeders;

use App\Models\Procedimiento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProcedimientoSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            ['nombre'=>'INTERACCIÓN ENFERMERA - USUARIO'],
            ['nombre'=>'ADMISION DE PERSONA USUARIA A HOSPITALIZACIÓN'],
            ['nombre'=>'ALTA DE LOA PERSONA USUARIA'],
            ['nombre'=>'REGISTRO DE KARDEX DE ENFERMERIA'],
            ['nombre'=>'CONTROL DE SIGNOS VITALES'],
            ['nombre'=>'GRAFICA DE SIGNOS VITALES'],
            ['nombre'=>'LAVADO DE MANOS'],
            ['nombre'=>'CALZADO Y RETIRO DE GUANTES ESTERILES'],
            ['nombre'=>'USO Y COLOCACIÓN DE RESPIRADOR N95'],
            ['nombre'=>'USO DE LA MASCARILLA SIMPLE'],
            ['nombre'=>'USO DEL MANDILÓN'],
            ['nombre'=>'BAÑO Y CUIDADO DE LA PIEL DEL PACIENTE'],
            ['nombre'=>'CUIDADO DE ENFERMERIA EN BAÑO DEL RN '],
            ['nombre'=>'ASEO PERINEAL FEMENINO'],
            ['nombre'=>'ASEO PERINEAL MASCULINO'],
            ['nombre'=>'ASEO DEL CABELLO'],
            ['nombre'=>'TENDIDO DE CAMA'],
            ['nombre'=>'MECANICA CORPORAL'],
            ['nombre'=>'CAMBIOS POSTURALES'],
            ['nombre'=>'OXIGENOTERAPIA'],
            ['nombre'=>'COLOCACIÓN DE MASCARA DE RESERVORIO'],
            ['nombre'=>'ASPIRACIÓN DE SECRECIONES'],
            ['nombre'=>'RIESGO DE ASPIRACIÓN'],
            ['nombre'=>'NEBULIZACIONES'],
            ['nombre'=>'NEBULIZACIÓN EN PEDIATRIA'],
            ['nombre'=>'CUIDADOS DE ENFERMERIA EN INHALOTERAPIA EN PEDIATRIA'],
            ['nombre'=>'ELECTROCARDIOGRAMA'],
            ['nombre'=>'REANIMACIÓN CARDIOPULMONAR BASICO'],
            ['nombre'=>'REANIMACIÓN CARDIOPULMONAR AVANZADO'],
            ['nombre'=>'COLOCACIÓN DE SONDA NASOGASTRICO EN ADULTO'],
            ['nombre'=>'COLOCACIÓN DE SONDA NASOGASTRICO EN PEDIATRIA'],
            ['nombre'=>'COLOCACIÓN DE SONDA NASOGASTRICO O OROGHASTRICO EN RN'],
            ['nombre'=>'ALIMENTACIÓN POR SONDA NASOGASTRICA'],
            ['nombre'=>'LAVADO GASTRICO'],
            ['nombre'=>'APLICACIÓN DE ENEMA'],
            ['nombre'=>'CETETERIZACIÓN INTRAVENOSA DE VIA PERIFERICA  EN RN'],
            ['nombre'=>'CETETERIZACIÓN INTRAVENOSA  DE VIA PERIFERICA  EN  PACIENTE PEDIATRICOS'],
            ['nombre'=>'CETETERIZACIÓN INTRAVENOSA  DE VIA PERIFERICA  EN   PACIENTE ADULTO'],
            ['nombre'=>'CETETERIZACIÓN INTRAVENOSA DE VIA PERIFERICA  EN   PACIENTE ADULTO MAYOR '],
            ['nombre'=>'CETETERIZACIÓN INTRAVENOSA DE CATETERISMO URINARIO'],
            ['nombre'=>'ADMINISTRACIÓN DE MEDICAMENTOS VIA ORAL'],
            ['nombre'=>'ADMINISTRACIÓN DE MEDICAMENTOS VIA INTRAMISCULAR'],
            ['nombre'=>'ADMINISTRACIÓN DE MEDICAMENTOS VIA ENDOVENOSO'],
            ['nombre'=>'TRANSFUSIÓN SANGUINEA'],
            ['nombre'=>'CAMBIO DE FRASCO DE DRENAJE TORAXICO'],
            ['nombre'=>'PROCEDIMIENTO DE ENFERMERIA EN VENDAJES'],
            ['nombre'=>'SUJECCIÓN MECANICA'],
            ['nombre'=>'TRASLADO DE PACIENTE PARA EXAMENES COMPLEMENTARIOS'],
            ['nombre'=>'BALANCE HIDRICO EN ADULTO'],
            ['nombre'=>'BALANCE HIDRICO EN PEDIATRIA'],
            ['nombre'=>'APLICACIÓN DE MEDIOS FISICOS'],
            ['nombre'=>'CUIDADOS POST MORTEN'],
            ['nombre'=>'TOMA DE HEMOGLUCOTEST ADULTO'],
            ['nombre'=>'TOMA DE HEMOGLUCOTEST RN'],
            ['nombre'=>'CUIDADO EN PACIENTE POSTRADOS'],
            ['nombre'=>'CUIDADOS EN PREVENCIÓN DE INFECCIONES ASOCIADAS AL CATETER'],
            ['nombre'=>'IRRIGACIÓN  VESICAL CONTINUA'],
            ['nombre'=>'CUIDADO DE ENFERMERIA EN OSTOMIAS'],
            ['nombre'=>'CUIDADOS EN PREVENCIÓN DE CAIDAS'],
            ['nombre'=>'CUIDADOS EN PREVENCIÓN DE ULCERAS POR PRESION'],
            ['nombre'=>'TOMA DE MUESTRA DE ORINA'],
            ['nombre'=>'CUIDADO DEL CORDÓN UMBILICAL EN EL RECIEN NACIDO'],
        ];
        foreach ($data as $key => $d) {
            # code...
            Procedimiento::create($d);
        }
    }
}
