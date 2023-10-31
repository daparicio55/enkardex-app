<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaDieta extends Model
{
    use HasFactory;
    public function dieta(){
        return $this->belongsTo(Dieta::class);
    }
    public function dia(){
        return $this->belongsTo(Dia::class);
    }
}
