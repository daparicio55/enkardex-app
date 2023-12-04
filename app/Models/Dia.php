<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dia extends Model
{
    public $fillable = [
        'fecha',
        'kardex_id',
    ];
    use HasFactory;
    public function kardex(){
        return $this->belongsTo(Kardex::class);
    }
    public function ddietas(){
        return $this->hasMany(DiaDieta::class,'dia_id','id');
    }
    public function dprocedmientos(){
        return $this->hasMany(DiaProcedimiento::class,'dia_id','id');
    }
    public function dexamenes(){
        return $this->hasMany(DiaExamene::class,'dia_id','id');
    }
}
