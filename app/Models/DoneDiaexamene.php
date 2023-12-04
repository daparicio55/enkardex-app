<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoneDiaexamene extends Model
{
    public $fillable =[
        'diaexamene_id',
        'user_id',
        'fechahora',
    ];
    use HasFactory;
    public function diaexamene(){
        return $this->belongsTo(DiaExamene::class,'diaexamene_id','id');
    }
}
