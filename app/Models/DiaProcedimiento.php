<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaProcedimiento extends Model
{
    public $fillable = [
        'procedimiento_id',
        'dia_id',
        'fechahora',
        'user_id',
        'observacion'
    ];
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
    public function done(){
        return $this->hasOne(DoneDiaProcedimiento::class,'diaprocedimiento_id','id');
    }
}
