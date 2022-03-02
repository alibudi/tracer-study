<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    use HasFactory;
    protected $table = "groups";
     protected $primaryKey = 'id';
    protected $fillable = ['name','created_at','updated_at'];
}
