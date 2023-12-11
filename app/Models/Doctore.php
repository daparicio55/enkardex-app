<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctore extends Model
{
    public $fillable = [
        'nombres',
        'apellidos'
    ];
    use HasFactory;
    public function kardexes(){
        return $this->hasMany(Kardex::class);
    }
}
