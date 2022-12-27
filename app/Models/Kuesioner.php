<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuesioner extends Model
{
    use HasFactory;
    protected $table = "kuesioners";
    protected $primaryKey = 'id';
   protected $fillable = ['question','a','b','c','d','created_at','updated_at'];
}
