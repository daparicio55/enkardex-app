<?php

use App\Models\Dia;
use App\Models\DiaIndicacione;
use App\Models\Indicacione;
use App\Models\Kardex;
use Illuminate\Support\Carbon;


function func(){
    return "1";
}
function ceros($numero){
    $ceros = null;
    for ($i= strlen($numero); $i < 4; $i++) { 
        # code...
        $ceros = $ceros . '0';
    }
    return $ceros.$numero;
}
function horacolor($hora){
    $h = Carbon::parse(date('H:i:s', strtotime($hora)));
    /* $h = $hora; */
    $turno = null;
    $color = null;
    $minicio = Carbon::parse('07:00:00');
    $mfin = Carbon::parse('12:59:00');
    $tinicio = Carbon::parse('13:00:00');
    $tfin = Carbon::parse('18:59:00');
    $ninicio = Carbon::parse('19:00:00');
    $nfin = Carbon::parse('06:59:00');
    if ($h->between($minicio,$mfin)){
        $turno = "Mañana";
        $color = 'primary';
    }
    if ($h->between($tinicio,$tfin)){
        $turno = "Tarde";
        $color = 'warning';
    }
    if ($h->between($ninicio,Carbon::parse('23:59:00')) || $h->between(Carbon::parse('00:00:00'),$nfin)){
        $turno = "Noche";
        $color = 'danger';
    }
    $h = date('H:i:00', strtotime($h));
    $array = [
        'hora'=>$h,
        'turno'=>$turno,
        'color'=>$color
    ];
    return (object) $array;
}
function estadohora($dia,$indicacione,$hora){
    $estado = null;
    $res = DiaIndicacione::where('hora','=',$hora)
    ->where('dia_id','=',$dia)
    ->where('indicacione_id','=',$indicacione)
    ->first();
    if(isset($res->tipo)){
        $estado = $res->tipo;
    }
    return $estado;
}
function icono($indicacione_id,$dia_id,$hora){
    $h = date('H:i:s', strtotime($hora));
    $dia_indicaione = DiaIndicacione::where('indicacione_id','=',$indicacione_id)
    ->where('dia_id','=',$dia_id)
    ->where('hora','=',$h)
    ->first();
    if (isset($dia_indicaione->tipo)){
        if ($dia_indicaione->tipo == "aplicado"){
            return "fas fa-check";
        }
        if ($dia_indicaione->tipo == "no aplica"){
            return "fas fa-ban";
        }
    }else{
        return "fas fa-hourglass-half";
    }
}
function horas($kardex_id,$dia_id,$indicacione_id){
    $array=[];
    $kardex = Kardex::findOrFail($kardex_id);
    $dia = Dia::findOrFail($dia_id);
    $indicacione = Indicacione::findOrFail($indicacione_id);
    $ffin =  Carbon::parse($kardex->dias()->orderBy('fecha','desc')->first()->fecha .' '.'23:59:00');
    $inicio =  Carbon::parse($kardex->fingreso .' '. $kardex->hingreso);
    /* $inicio->addHours($frecuencia);
    return $inicio->addHours($frecuencia); */

    while ($ffin->gt($inicio)) {
        if($inicio->isSameDay($dia->fecha)){
            $h = horacolor($inicio);
            array_push($array,$h);
            /* array_push($array,[
                'fecha' => date('d-m-y H:i:s',strtotime($inicio)),
                'color'=> $color,
            ]); */
        }
        
        $inicio->addHours($indicacione->frecuencia);
    }
    $objeto = (Object)$array;
    return $objeto;
}
