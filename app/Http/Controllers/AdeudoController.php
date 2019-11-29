<?php

namespace App\Http\Controllers;

use App\DetPrestamo;
use App\Prestamo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdeudoController extends Controller{

    public function index(Request $request){
        $search = $request->get('search');
        $fechaFinal = strtotime($request->get('fechaFinal'));
        $fechaInicio = strtotime($request->get('fechaInicio'));
        $condicionFecha = '';
        $condB = '';

        if ($fechaFinal && $fechaInicio) {
            $fechaFinal = date('Y-m-d', $fechaFinal);
            $fechaInicio = date('Y-m-d', $fechaInicio);
            $condicionFecha =  'AND (tblprestamos.Fecha_inicio >= \''.$fechaInicio.'\' AND tblprestamos.Fecha_inicio <= \''.$fechaFinal.'\')';
            //\dd($condicionFecha);
        }
        if ($search && $search != ""){
            $condB = ' AND (tblprestamos.folio = '.$search.')';//\dd($condB);
        }else{
            $condB = '';//\dd($condB);
        }

        // ->whereRaw('(tblprestamos.Fecha_final <= tblprestamos.Fecha_entrega and tblprestamos.Existe = 1) OR (tblprestamos.Fecha_final < now() and tblprestamos.Fecha_entrega is null and tblprestamos.Existe = 1)');
        $a = DB::table('tblprestamos')->join('tblusuarios','tblusuarios.id','=','tblprestamos.idprestatario')
        ->join('tblalumnos','tblalumnos.idusuario','=','tblusuarios.id')
        ->select('tblprestamos.folio','tblalumnos.NoControl as control','tblalumnos.nombre','tblalumnos.apellidos','tblprestamos.fecha_inicio',
        'tblprestamos.fecha_final','tblprestamos.fecha_entrega','tblprestamos.renovaciones','tblprestamos.existe')
        ->whereRaw('((tblprestamos.Fecha_final <= tblprestamos.Fecha_entrega) OR (tblprestamos.Fecha_final < now() and tblprestamos.Fecha_entrega is null))'.$condicionFecha.$condB);
        
        $b = DB::table('tblprestamos')->join('tblusuarios','tblusuarios.id','=','tblprestamos.idprestatario')
        ->join('tbldocentes','tbldocentes.idusuario','=','tblusuarios.id')
        ->select('tblprestamos.folio','tbldocentes.NoNomina as control','tbldocentes.nombre','tbldocentes.apellidos','tblprestamos.fecha_inicio',
        'tblprestamos.fecha_final','tblprestamos.fecha_entrega','tblprestamos.renovaciones','tblprestamos.existe')
        ->whereRaw('((tblprestamos.Fecha_final <= tblprestamos.Fecha_entrega) OR (tblprestamos.Fecha_final < now() and tblprestamos.Fecha_entrega is null))'.$condicionFecha.$condB);
        

        $c = DB::table('tblprestamos')->join('tblusuarios','tblusuarios.id','=','tblprestamos.idprestatario')
        ->join('tbladministrativos','tbladministrativos.idusuario','=','tblusuarios.id')
        ->select('tblprestamos.folio','tbladministrativos.NoNomina as control','tbladministrativos.nombre','tbladministrativos.apellidos','tblprestamos.fecha_inicio',
        'tblprestamos.fecha_final','tblprestamos.fecha_entrega','tblprestamos.renovaciones','tblprestamos.existe')
        ->whereRaw('((tblprestamos.Fecha_final <= tblprestamos.Fecha_entrega) OR (tblprestamos.Fecha_final < now() and tblprestamos.Fecha_entrega is null))'.$condicionFecha.$condB);


        //if (trim($search) == null or trim($search) == '') {
        $adeudos = DB::table('tblprestamos')->join('tblusuarios','tblusuarios.id','=','tblprestamos.idprestatario')
        ->join('tbladministrativos','tbladministrativos.idusuario','=','tblusuarios.id')
        ->select('tblprestamos.folio','tbladministrativos.NoNomina as control','tbladministrativos.nombre','tbladministrativos.apellidos','tblprestamos.fecha_inicio',
        'tblprestamos.fecha_final','tblprestamos.fecha_entrega','tblprestamos.renovaciones','tblprestamos.existe')
        ->whereRaw('((tblprestamos.Fecha_final <= tblprestamos.Fecha_entrega) OR (tblprestamos.Fecha_final < now() and tblprestamos.Fecha_entrega is null))'.$condicionFecha.$condB)
        ->union($a)->union($b)
        ->orderby('folio')->paginate(10);
        
        /*}else{
            $adeudos =DB::table('tblprestamos')->join('tblusuarios','tblusuarios.id','=','tblprestamos.idprestatario')
        ->join('tbladministrativos','tbladministrativos.idusuario','=','tblusuarios.id')
        ->select('tblprestamos.folio','tbladministrativos.NoNomina as control','tbladministrativos.nombre','tbladministrativos.apellidos','tblprestamos.fecha_inicio'
        ,'tblprestamos.fecha_final','tblprestamos.fecha_entrega','tblprestamos.renovaciones','tblprestamos.existe')
        ->where('tblprestamos.folio', $search)//->where('control', 'LIKE', "%$search%")
        ->whereRaw('(tblprestamos.Fecha_final <= tblprestamos.Fecha_entrega) OR (tblprestamos.Fecha_final < now() and tblprestamos.Fecha_entrega is null)')
        ->union($a)->union($b)
        ->orderby('folio')->paginate(10);
        }*/

        //$adeudos = Prestamo::whereRaw('((Fecha_final <= Fecha_entrega) OR (Fecha_final < now() and Fecha_entrega is null))'.$condicionFecha.$condB)
        //->paginate(10);

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
    }

    //Contar la cantidad de libros de un prestamo --no se usa --eliminado de web.php->routes
    public function count($id){
//        $count = DetPrestamo::where('Folio','=',$id)->count();
//        return $count;
        $count = Prestamo::findOrFail($id);
        return $count->detalles->count();
    }
    //Buscar usuarios  --no se usa
    public function usuario($id){
        $usuario = DB::table('tblalumnos')->where('IdUsuario','=',$id)->value('NoControl');
        if ($usuario == ''){
            $usuario = DB::table('tbldocentes')->where('IdUsuario','=',$id)->value('NoNomina');
        }
        if ($usuario == ''){
            $usuario = DB::table('tbladministrativos')->where('IdUsuario','=',$id)->value('NoNomina');
        }
        return $usuario;
    }
    //Mostrar un elemento (mediante el id)
    public function show($id){
        //DetPrestamo::where('Folio','=',$id)->get();
        $detalles = DB::table('tblprestamos')
            ->join('tbldetprestamos', 'tbldetprestamos.folio', '=', 'tblprestamos.folio')
            ->join('tblejemplares', 'tblejemplares.codigo', '=', 'tbldetprestamos.codigo')
            ->join('tbllibros', 'tbllibros.isbn', '=', 'tblejemplares.isbn')
            ->join('tbleditoriales', 'tbleditoriales.id', '=', 'tbllibros.ideditorial')
            ->join('tblautores', 'tblautores.idautor', '=', 'tbllibros.idautor')
            ->select(
                'tblprestamos.folio',
                'tblprestamos.fecha_inicio',
                'tblprestamos.fecha_final',
                'tblprestamos.fecha_entrega',
                'tblprestamos.renovaciones',
                'tbldetprestamos.codigo',
                'tbllibros.titulo',
                'tbllibros.imagen',
                'tbllibros.year',
                'tbleditoriales.nombre AS nombreeditorial',
                'tblautores.nombre AS nombreautor',
                'tblautores.apellidos AS apellidoautor'
            )
            ->where('tblprestamos.folio', '=', $id)
            ->get();
        return $detalles;
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
