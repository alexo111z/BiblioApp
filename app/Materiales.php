<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materiales extends Model
{
    public $table = "tblmateriales";
    protected $fillable = ['Titulo','Clave','Year','Ejemplares','Tipo', 'Existe'];
    public $timestamps = false;

    public function scopeSearch($query,$search)
    {
        if($search && $search != "")
            return $query -> where('Titulo', 'LIKE', "%$search%");
    }
}

