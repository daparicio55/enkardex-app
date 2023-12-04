<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaEauxiliare extends Model
{
    use HasFactory;
    public $fillable = [
        'eauxiliare_id',
        'dia_id',
        'hora',
        'estado',
        'registro',
        'user_id',
    ];
    public function eauxiliare(){
        return $this->belongsTo(Eauxiliare::class,'eauxiliare_id','id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
