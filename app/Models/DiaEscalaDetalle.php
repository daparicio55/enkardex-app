<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaEscalaDetalle extends Model
{
    use HasFactory;
    public function valor(){
        return $this->belongsTo(Egvalore::class,'egvalores_id');
    }
}
