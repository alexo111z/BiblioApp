<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $table = 'tblprestamos';
    protected $primaryKey = 'Folio';
    public $timestamps = false;

    protected $fillable = [
        'IdPrestatario',
        'Fecha_inicio',
        'Fecha_final',
        'Fecha_entrega',
        'Renovaciones',
        'Existe',
    ];

    function detalles(){
        return $this->hasMany(DetPrestamo::class,'Id' , 'Folio');
    }
    public function scopeSearch($query, $search)
    {
        if($search && $search != "")
            return $query->where('folio', 'LIKE', "%$search%")->where('control','LIKE',"%$search%");//->orWhere('IdPrestatario', 'LIKE', "%$search%");
    }
}
