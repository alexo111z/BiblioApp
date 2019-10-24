<?php

namespace App\Http\Controllers;

use App\Carrera;
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

        Carrera::create([
            'Clave' => $data['clave'],
            'Nombre' => $data['nombre'],
            'Existe' => 1,
        ]);

        return redirect()->route('carrera.show');
    }

    function formEdit(Carrera $carrera){

        return view('Carreras.editar', ['carrera' => $carrera]);
    }

    function update(){
        $data = request()->all();

        $carrera = Carrera::findOrFail($data['clave']);
        $carrera->Nombre = $data['nombre'];
        $carrera->save();

        return redirect()->route('carrera.show');
    }

    function softDelete(Carrera $carrera){

//        Carrera::destroy($carrera->Clave); //hard delete
        $carrera->Existe = 0;
        $carrera->save();

        return redirect()->route('carrera.show');
    }

}
