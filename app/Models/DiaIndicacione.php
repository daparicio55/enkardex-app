<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaIndicacione extends Model
{
    use HasFactory;
    protected $fillable = [
        'dia_id',
        'indicacione_id',
        'hora',
        'tipo',
        'registro'
    ];
    public function dia(){
        return $this->belongsTo(Dia::class);
    }
}
