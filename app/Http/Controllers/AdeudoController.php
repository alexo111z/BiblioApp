<?php

namespace App\Http\Controllers;

use App\Prestamo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdeudoController extends Controller
{

    public function index()
    {
        $adeudos = DB::table('tblprestamos')->whereRaw('Fecha_final < Fecha_entrega or Fecha_final < now() and Existe = 1')->get();
        return $adeudos;
    }

    //form para registro
    public function create()
    {
        //
    }

    //Crear el registro
    public function store(Request $request)
    {
        //
    }

    //Mostrar un elemento (mediante el id)
    public function show($id)
    {
        //
    }

    //form para editar, id -> datos elemento editar
    public function edit($id)
    {
        //
    }

    //Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        //
    }

   //Remove the specified resource from storage.
    public function destroy($id)
    {
        //
    }
}
