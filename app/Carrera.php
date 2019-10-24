<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $table = 'tblcarreras';
    protected $primaryKey = 'Clave';
    public $timestamps = false;

    protected $fillable = [
        'Clave',
        'Nombre',
        'Existe',
    ];

}
