<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicacione extends Model
{
    use HasFactory;
    public function medicamento(){
        return $this->belongsTo(Medicamento::class);
    }
    public function via(){
        return $this->belongsTo(Via::class);
    }
}
