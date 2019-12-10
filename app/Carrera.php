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

    public function scopeSearch($query, $search)
    {
        if($search && $search != "")
            return $query -> where('Clave', 'LIKE', "%$search%")->orWhere('Nombre', 'LIKE', "%$search%");
    }

}
