<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarreraController extends Controller
{
    function show(){

        $carreras = DB::table('tblcarreras')->get();

        $title = 'Listado carreras';

        return view('Carreras.principal', compact('carreras', 'title'));
    }

    function formAdd(){

    }

    function add(){
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required',
        ],[
            'name.required' => 'El campo esta vacio'
        ]);
    }
}
