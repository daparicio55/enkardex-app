<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaProcedimiento extends Model
{
    use HasFactory;
    public function procedimiento(){
        return $this->belongsTo(Procedimiento::class);
    }
    public function dia(){
        return $this->belongsTo(Dia::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
