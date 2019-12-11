<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetPrestamo extends Model
{
    protected $table = 'tbldetprestamos';
    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = [
        'Folio',
        'Codigo',
    ];
    public function ejemplar()
    {
        return $this->belongsTo(Ejemplares::class, 'Codigo', 'Codigo');
    }
//    function prestamo(){
//        return $this->hasMany(DetPrestamo::class, 'Folio');
//    }
}
