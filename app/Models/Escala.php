<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escala extends Model
{
    use HasFactory;
    public $fillable = [
        'nombre'
    ];
    public function egrupos(){
        return $this->hasMany(Egrupo::class);
    }
}
