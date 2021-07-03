<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Epost extends Model
{
    use HasFactory;
    protected $table = "eposts";
    protected $fillable = ['title'];

    Public function comment(){
        return $this->hasMany(Comment::class);
    }
}
