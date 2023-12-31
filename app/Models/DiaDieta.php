<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaDieta extends Model
{
    use HasFactory;
    public $fillable = [
        'dia_id',
        'dieta_id',
    ];
    public function dieta(){
        return $this->belongsTo(Dieta::class,'dieta_id','id');
    }
    public function dia(){
        return $this->belongsTo(Dia::class);
    }
}
