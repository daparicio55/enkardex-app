<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kardex extends Model
{
    use HasFactory;
    public function paciente(){
        return $this->belongsTo(Paciente::class,'paciente_id','id');
    }
    public function ambiente(){
        return $this->belongsTo(Ambiente::class,'ambiente_id','id');
    }
    public function indicaciones(){
        return $this->hasMany(Indicacione::class);
    }
    public function dias(){
        return $this->hasMany(Dia::class);
    }
}
