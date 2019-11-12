<?php

namespace App\Http\Controllers;

use App\DetPrestamo;
use App\Prestamo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdeudoController extends Controller
{

    public function index(Request $request){
        $search = $request->get('search');
        $adeudos = Prestamo::whereRaw('(Fecha_final <= Fecha_entrega and Existe = 1) OR (Fecha_final < now() and Fecha_entrega is null and Existe = 1)')
            ->search($search)->paginate(10);
        return [
            'pagination' => [
                'total'         => $adeudos->total(),
                'current_page'  => $adeudos->currentPage(),
                'per_page'      => $adeudos->perPage(),
                'last_page'     => $adeudos->lastPage(),
                'from'          => $adeudos->firstItem(),
                'to'            => $adeudos->lastItem(),
            ],
            'adeudos' => $adeudos,
        ];
//        return $adeudos;
    }

    //Contar la cantidad de libros de un prestamo
    public function count($id){
//        $count = DetPrestamo::where('Folio','=',$id)->count();
//        return $count;
        $count = Prestamo::findOrFail($id);
        return $count->detalles->count();
    }
    //Buscar usuarios
    public function usuario($id){
        $usuario = DB::table('tblalumnos')->where('IdUsuario','=',$id)->value('NoControl');
        if ($usuario == ''){
            $usuario = DB::table('tbldocentes')->where('IdUsuario','=',$id)->value('NoNomina');
        }else if ($usuario == ''){
            $usuario = DB::table('tbladministrativos')->where('IdUsuario','=',$id)->value('NoNomina');
        }
        return $usuario;
    }
    //Mostrar un elemento (mediante el id)
    public function show($id){
        $detalle = DetPrestamo::where('Folio','=',$id)->get();
        return $detalle;
    }

    //form para editar, id -> datos elemento editar
//    public function edit($id)
//    {
//        $deudor = Prestamo::findOrFail($id);
//        $deudor ->Existe = 0;
//        $deudor->save();
//    }

   //Remove the specified resource from storage.
    public function destroy($id)
    {
        $deudor = Prestamo::findOrFail($id);
        $deudor ->Existe = 0;
        $deudor->save();
    }
}
