<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ejemplares extends Model
{
    public $table = "tblejemplares";
    protected $primaryKey = 'Codigo';
    public $incrementing = false;
    protected $fillable = ['Codigo','ISBN','FechaRegistro','CD','Existe'];
    public $timestamps = false;

}