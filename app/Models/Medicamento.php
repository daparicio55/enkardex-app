<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    use HasFactory;
    public $fillable = [
        'codigo',
        'denominacion',
        'especificaciones',
        'unidad',
        'restriccion',
        'indicaciones'
    ];
    public function indicationes(){
        return $this->hasMany(Indicacione::class);
    }
}
