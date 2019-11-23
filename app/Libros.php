<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libros extends Model
{
    public $table = "tbllibros";
    protected $primaryKey = 'ISBN';
    public $incrementing = false;
    protected $fillable = ['Titulo','IdAutor','IdEditorial','IdCarrera','dewey','Edicion','Year','Volumen','Ejemplares','EjemDisp','Imagen','FechaRegistro', 'Existe'];
    public $timestamps = false;

    public function scopeSearch($query,$search)
    {
        if($search && $search != "")
            return $query -> where('Titulo', 'LIKE', "%$search%");
}
}