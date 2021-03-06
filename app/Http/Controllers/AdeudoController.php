<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\DetPrestamo;
use App\Prestamo;
use App\Multa;
use App\Ejemplares;
use App\libros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdeudoController extends Controller{

    public function index(Request $request){
        $search = $request->get('search');
        $fechaFinal = strtotime($request->get('fechaFinal'));
        $fechaInicio = strtotime($request->get('fechaInicio'));
        $tipo = (int) $request->get('tipo');
        $condicionFecha = '';
        $condA = '';
        $condB = '';
        $condC = '';

        if ($fechaFinal && $fechaInicio) {
            $fechaFinal = date('Y-m-d', $fechaFinal);
            $fechaInicio = date('Y-m-d', $fechaInicio);
            $condicionFecha =  'AND (tblprestamos.Fecha_inicio >= \''.$fechaInicio.'\' AND tblprestamos.Fecha_inicio <= \''.$fechaFinal.'\')';
            //\dd($condicionFecha);
        }
        if ($search && $search != ""){
            $condA = ' AND (tblprestamos.folio LIKE \'%'.$search.'%\' OR tblalumnos.NoControl LIKE \'%'.$search.'%\' OR tblalumnos.nombre LIKE \'%'.$search.'%\' OR tblalumnos.apellidos LIKE \'%'.$search.'%\')';//\dd($condA);
            $condB = ' AND (tblprestamos.folio LIKE \'%'.$search.'%\' OR tbldocentes.NoNomina LIKE \'%'.$search.'%\' OR tbldocentes.nombre LIKE \'%'.$search.'%\' OR tbldocentes.apellidos LIKE \'%'.$search.'%\')';
            $condC = ' AND (tblprestamos.folio LIKE \'%'.$search.'%\' OR tbladministrativos.NoNomina LIKE \'%'.$search.'%\' OR tbladministrativos.nombre LIKE \'%'.$search.'%\' OR tbladministrativos.apellidos LIKE \'%'.$search.'%\')';
        }else{
            $condA = '';//\dd($condA);
            $condB = '';
            $condC = '';
        }
        if (! $tipo || $tipo == 4) {
            $tipo = 0;
        }

        // ->whereRaw('(tblprestamos.Fecha_final <= tblprestamos.Fecha_entrega and tblprestamos.Existe = 1) OR (tblprestamos.Fecha_final < now() and tblprestamos.Fecha_entrega is null and tblprestamos.Existe = 1)');
        $a = DB::table('tblprestamos')->join('tblusuarios','tblusuarios.id','=','tblprestamos.idprestatario')
        ->join('tblalumnos','tblalumnos.idusuario','=','tblusuarios.id')
        ->select('tblprestamos.folio','tblalumnos.NoControl as control','tblalumnos.nombre','tblalumnos.apellidos','tblprestamos.fecha_inicio',
        'tblprestamos.fecha_final','tblprestamos.fecha_entrega','tblprestamos.renovaciones','tblprestamos.existe')
        ->whereRaw('((tblprestamos.Fecha_final < tblprestamos.Fecha_entrega) OR (tblprestamos.Fecha_final < now() and tblprestamos.Fecha_entrega is null))'.$condicionFecha.$condA.'AND (1='.$tipo.' or '.$tipo.'=0 )');
        
        $b = DB::table('tblprestamos')->join('tblusuarios','tblusuarios.id','=','tblprestamos.idprestatario')
        ->join('tbldocentes','tbldocentes.idusuario','=','tblusuarios.id')
        ->select('tblprestamos.folio','tbldocentes.NoNomina as control','tbldocentes.nombre','tbldocentes.apellidos','tblprestamos.fecha_inicio',
        'tblprestamos.fecha_final','tblprestamos.fecha_entrega','tblprestamos.renovaciones','tblprestamos.existe')
        ->whereRaw('((tblprestamos.Fecha_final < tblprestamos.Fecha_entrega) OR (tblprestamos.Fecha_final < now() and tblprestamos.Fecha_entrega is null))'.$condicionFecha.$condB.'AND (2='.$tipo.' or '.$tipo.'=0 )');
        
        //if (trim($search) == null or trim($search) == '') {
        $adeudos = DB::table('tblprestamos')->join('tblusuarios','tblusuarios.id','=','tblprestamos.idprestatario')
        ->join('tbladministrativos','tbladministrativos.idusuario','=','tblusuarios.id')
        ->select('tblprestamos.folio','tbladministrativos.NoNomina as control','tbladministrativos.nombre','tbladministrativos.apellidos','tblprestamos.fecha_inicio',
        'tblprestamos.fecha_final','tblprestamos.fecha_entrega','tblprestamos.renovaciones','tblprestamos.existe')
        ->whereRaw('((tblprestamos.Fecha_final < tblprestamos.Fecha_entrega) OR (tblprestamos.Fecha_final < now() and tblprestamos.Fecha_entrega is null))'.$condicionFecha.$condC.'AND (3='.$tipo.' or '.$tipo.'=0 )')
        ->union($a)->union($b)
        ->orderby('folio')->paginate(10);
        


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

    //Contar la cantidad de libros de un prestamo
    public function count($id){
//        $count = DetPrestamo::where('Folio','=',$id)->count();
//        return $count;
        $count = Prestamo::findOrFail($id);
        return $count->detalles->count();
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
   
   //Remove the specified resource from storage.
    public function delete($id, $monto, Request $request)
    {
        $back = (int) $request->get('back');
        $user = Session::get('userData');
        if ($user == null OR $user == 0 OR $user == '') {
            $notes = 'Persona a cargo: No identificada';
        }else{
            if ($monto > 100) {
                $notes = $user['Nombre'].' '.$user['Apellidos'];
                $monto = 0;
            }else{
                $notes = $user['Nombre'].' '.$user['Apellidos'];
            }
        }
        if( $back == 0 ){
            $monto = 0;
        }else{
            $cods = DetPrestamo::where('Folio', '=', $id)->get();
            foreach ($cods as $cod) {
                $ejm = Ejemplares::find($cod->Codigo);
                $ejm->Existe = 1;
                $ejm->save();
                $libro = libros::find($ejm->ISBN);
                $libro->EjemDisp = $libro->EjemDisp + 1;
                $libro->save();
            }
        }

        $date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', now())->format('Y-m-d');
        $deudor = Prestamo::findOrFail($id);
        $deudor ->Existe = 0;
        $deudor ->Fecha_entrega = $date;
        $deudor->save();
        Multa::create([
            'Folio' => $id,
            'Multa' => $monto,
            'Fecha' => $date,
            'Notas' => $notes,
        ]);
    }
}
