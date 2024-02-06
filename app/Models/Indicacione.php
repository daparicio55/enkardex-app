<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicacione extends Model
{
    use HasFactory;
    public $fillable = [
        'dosis',
        'frecuencia',
        'medicamento_id',
        'via_id',
        'kardex_id'
    ];
    public function medicamento(){
        return $this->belongsTo(Medicamento::class);
    }
    public function via(){
        return $this->belongsTo(Via::class);
    }
    public function dia_indicaciones(){
        return $this->hasMany(DiaIndicacione::class);
    }
}
