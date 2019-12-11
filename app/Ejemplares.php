<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ejemplares extends Model
{
    //tblejemplares
    protected $table = 'tblejemplares';
    protected $primaryKey = 'Codigo';
    public $timestamps = false;

    public function libro()
    {
        return $this->belongsTo(Ejemplares::class, 'ISBN', 'ISBN');
    }
}
