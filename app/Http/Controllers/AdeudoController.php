<?php

namespace App\Http\Controllers;

use App\Prestamo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdeudoController extends Controller
{

    public function index()
    {
        //        SELECT * FROM `tblprestamos` WHERE Fecha_final <= Fecha_entrega,
        //        SELECT * FROM `tblprestamos` WHERE Fecha_final < now() and Fecha_entrega is null
        $adeudos = Prestamo::whereRaw('(Fecha_final <= Fecha_entrega and Existe = 1) OR (Fecha_final < now() and Fecha_entrega is null and Existe = 1)')->get();
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
        //ROBARCELO A PALOMINO formato de detalles
    }

    //form para editar, id -> datos elemento editar
    public function edit($id)
    {
        $deudor = Prestamo::findOrFail($id);
        $deudor ->Existe = 0;
        $deudor->save();
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
