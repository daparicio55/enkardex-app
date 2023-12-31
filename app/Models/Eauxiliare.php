<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eauxiliare extends Model
{
    public $fillable = [
        'descripcion',
        'examene_id',
        'doctore_id',
        'kardex_id',
    ];
    use HasFactory;
    public function examene(){
        return $this->belongsTo(Examene::class);
    }
    public function kardex(){
        return $this->belongsTo(Kardex::class);
    }
    public function doctore(){
        return $this->belongsTo(Doctore::class);
    }
}
