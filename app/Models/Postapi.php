<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postapi extends Model
{
    use HasFactory;
    protected $table ='postapis';
    protected $fillable =['title','body'];
}
