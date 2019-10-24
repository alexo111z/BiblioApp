<?php

namespace App\Http\Controllers;

use App\Carrera;
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
        $carrera = null;
        return view('Carreras.nueva', ['carrera' => $carrera]);
    }

    function add(){
        $data = request()->validate([
            'clave' => ['required', 'unique:tblcarreras,Clave'],
            'nombre' => ['required', 'unique:tblcarreras,Nombre'],
        ],[
            'name.required' => 'El campo esta vacio'
        ]);

//        dd($data);

        Carrera::create([
            'Clave' => $data['clave'],
            'Nombre' => $data['nombre'],
            'Existe' => 1,
        ]);

        return redirect()->route('carrera.show');
    }

    function formEdit(Carrera $carrera){

        return view('Carreras.nueva', ['carrera' => $carrera]);

    }

    function update(Carrera $carrera){
        $data = request()->all();

        dd($data);

        $carrera->update($data);

        return redirect()->route('carrera.show');
    }

}
