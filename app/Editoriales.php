<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Editoriales extends Model
{
    public $table = "tbleditoriales";
    protected $fillable = ['Nombre','Existe'];
    public $timestamps = false;

    public function scopeSearch($query, $search)
    {
        if($search && $search !='')
            return $query->where('Nombre', 'LIKE', "%$search%");
    }
}
