<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoneDiaProcedimiento extends Model
{
    use HasFactory;
    public $fillable = [
        'diaprocedimiento_id',
        'user_id',
        'fechahora',
    ];
    public function diaprocedimiento(){
        return $this->belongsTo(DiaProcedimiento::class,'diaprocedimiento_id','id');
    }
}
