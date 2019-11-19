<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autores extends Model
{
    public $table = "tblautores";
    protected $fillable = ['Nombre','Apellidos','Existe'];
    public $timestamps = false;

    public function scopeSearch($query,$search)
    {
        if($search && $search != "")
            return $query -> where('Titulo', 'LIKE', "%$search%")->orWhere('Apellidos', 'LIKE', "%$search%");
    }
    
}

