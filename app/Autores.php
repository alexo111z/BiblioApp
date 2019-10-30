<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autores extends Model
{
    protected $table = 'tblautores';
    public $timestamps = false;
    protected $fillable = ['nombre', 'apellidos'];


    public function scopeSearch($query, $search)
    {
        if($search && $search != "")
            return $query -> where('nombre', 'LIKE', "%$search%")->orWhere('apellidos', 'LIKE', "%$search%");
    }
}
