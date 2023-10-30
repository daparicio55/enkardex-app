<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaEauxiliare extends Model
{
    use HasFactory;
    public function eauxiliare(){
        return $this->belongsTo(Eauxiliare::class,'eauxiliare_id','id');
    }
}
