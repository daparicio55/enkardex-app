<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Egrupo extends Model
{
    use HasFactory;
    public $fillable = [
        'nombre',
        'escala_id'
    ];

    public function escala(){
        return $this->belongsTo(Escala::class);
    }

    public function egvalores(){
        return $this->hasMany(Egvalore::class);
    }
}
