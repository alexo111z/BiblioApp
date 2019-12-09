<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Multa extends Model
{
    //
    protected $table = 'tblmultas';
    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = [
        'Folio',
        'Multa',
        'Fecha',
        'Notas',
    ];
}
