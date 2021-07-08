<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Astudent extends Model
{
    use HasFactory;
    protected $table = "astudents";
    protected $fillable=["firstname", "lastname", "email", "phone"];
}
