<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ans_kuesioner extends Model
{
    use HasFactory;
    protected $table = "ans_kuesioners";
    protected $primaryKey = 'id';
   protected $fillable = ['user_id','kuesioner_id','value','created_at','updated_at'];
}
