<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Egvalore extends Model
{
    use HasFactory;

    public $fillable = [
        'nombre',
        'valor',
        'egrupo_id'
    ];

    public function egrupo(){
        return $this->belongsTo(Egrupo::class);
    }
    
}
