<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Editoriales extends Model
{
    public $table = "tbleditoriales";
    protected $fillable = ['Nombre','Existe'];
    public $timestamps = false;
}
