<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaExamene extends Model
{
    use HasFactory;
    public $fillable = [
        'examene_id',
        'dia_id',
        'doctore_id',
        'user_id',
        'fechahora'
    ];
    public function examene(){
        return $this->belongsTo(Examene::class,'examene_id','id');
    }
    public function done(){
        return $this->hasMany(DoneDiaexamene::class,'diaexamene_id','id');
    }
}
