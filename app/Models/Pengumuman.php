<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;
    protected $table = "pengumumen";
    protected $primaryKey = 'id';
   protected $fillable = ['title','content','created_at','updated_at'];
}
