<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ejemplares extends Model
{
    public $table = "tblejemplares";
    protected $primaryKey = 'Codigo';
    public $incrementing = false;
    protected $fillable = ['Codigo','ISBN','FechaRegistro','CD'];
    public $timestamps = false;

    public function scopeSearch($query,$search)
    {
        if($search && $search != "")
            return $query -> where('Codigo', 'LIKE', "%$search%");
}
}