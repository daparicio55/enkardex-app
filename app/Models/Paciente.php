<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;
    public $fillable = [
        "nombres",
        "apellidoPaterno",
        "apellidoMaterno",
        "nacimiento",
        "edad",
        "sexo",
        "historia",
        "numeroDocumento",
        'telefono'
    ];
    public function alergias(){
        return $this->hasMany(Alergia::class);
    }
}
