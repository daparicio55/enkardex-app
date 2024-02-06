<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaEscala extends Model
{
    use HasFactory;
    public function escala(){
        return $this->belongsTo(Escala::class);
    }
    public function detalles(){
        return $this->hasMany(DiaEscalaDetalle::class,'diaescala_id','id');
    }
}
