<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DateTime;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');

        if (is_null($search)) {
            $dataa = DB::table('tblprestamos')->join('tblusuarios', 'tblusuarios.id', '=', 'tblprestamos.idprestatario')
                ->join('tblalumnos', 'tblalumnos.idusuario', '=', 'tblusuarios.id')
                ->select(
                    'tblprestamos.folio',
                    'tblalumnos.nombre',
                    'tblalumnos.apellidos',
                    'tblprestamos.fecha_inicio',
                    'tblprestamos.fecha_final',
                    'tblprestamos.fecha_entrega',
                    'tblprestamos.renovaciones'
                )
                ->where('tblprestamos.existe', '=', '1');


            $datab = DB::table('tblprestamos')->join('tblusuarios', 'tblusuarios.id', '=', 'tblprestamos.idprestatario')
                ->join('tbldocentes', 'tbldocentes.idusuario', '=', 'tblusuarios.id')
                ->select(
                    'tblprestamos.folio',
                    'tbldocentes.nombre',
                    'tbldocentes.apellidos',
                    'tblprestamos.fecha_inicio',
                    'tblprestamos.fecha_final',
                    'tblprestamos.fecha_entrega',
                    'tblprestamos.renovaciones'
                )
                ->where('tblprestamos.existe', '=', '1');

            $datas = DB::table('tblprestamos')->join('tblusuarios', 'tblusuarios.id', '=', 'tblprestamos.idprestatario')
                ->join('tbladministrativos', 'tbladministrativos.idusuario', '=', 'tblusuarios.id')
                ->select(
                    'tblprestamos.folio',
                    'tbladministrativos.nombre',
                    'tbladministrativos.apellidos',
                    'tblprestamos.fecha_inicio',
                    'tblprestamos.fecha_final',
                    'tblprestamos.fecha_entrega',
                    'tblprestamos.renovaciones'
                )
                ->where('tblprestamos.existe', '=', '1')
                ->union($dataa)
                ->union($datab)
                ->orderby('folio')
                ->get();
        } else {
            $dataa = DB::table('tblprestamos')->join('tblusuarios', 'tblusuarios.id', '=', 'tblprestamos.idprestatario')
                ->join('tblalumnos', 'tblalumnos.idusuario', '=', 'tblusuarios.id')
                ->select(
                    'tblprestamos.folio',
                    'tblalumnos.nombre',
                    'tblalumnos.apellidos',
                    'tblprestamos.fecha_inicio',
                    'tblprestamos.fecha_final',
                    'tblprestamos.fecha_entrega',
                    'tblprestamos.renovaciones'
                )
                ->where('tblprestamos.existe', '=', '1')->where('tblalumnos.NoControl', 'like', $search . '%')
                ->orWhere('tblalumnos.Apellidos', 'like', $search . '%');


            $datab = DB::table('tblprestamos')->join('tblusuarios', 'tblusuarios.id', '=', 'tblprestamos.idprestatario')
                ->join('tbldocentes', 'tbldocentes.idusuario', '=', 'tblusuarios.id')
                ->select(
                    'tblprestamos.folio',
                    'tbldocentes.nombre',
                    'tbldocentes.apellidos',
                    'tblprestamos.fecha_inicio',
                    'tblprestamos.fecha_final',
                    'tblprestamos.fecha_entrega',
                    'tblprestamos.renovaciones'
                )
                ->where('tblprestamos.existe', '=', '1')->where('tbldocentes.NoNomina', 'like', $search . '%')
                ->orWhere('tbldocentes.Apellidos', 'like', $search . '%');

            $datas = DB::table('tblprestamos')->join('tblusuarios', 'tblusuarios.id', '=', 'tblprestamos.idprestatario')
                ->join('tbladministrativos', 'tbladministrativos.idusuario', '=', 'tblusuarios.id')
                ->select(
                    'tblprestamos.folio',
                    'tbladministrativos.nombre',
                    'tbladministrativos.apellidos',
                    'tblprestamos.fecha_inicio',
                    'tblprestamos.fecha_final',
                    'tblprestamos.fecha_entrega',
                    'tblprestamos.renovaciones'
                )
                ->where('tblprestamos.existe', '=', '1')->where('tbladministrativos.NoNomina', 'like', $search . '%')
                ->orWhere('tbladministrativos.Apellidos', 'like', $search . '%')
                ->union($dataa)
                ->union($datab)
                ->orderby('folio')
                ->get();
        }


        foreach ($datas as $prestamo) {
            $fechaf = strtotime($prestamo->fecha_final);
            $now = strtotime('today');
            if ($fechaf < $now) {
                $prestamo->Estado = 'Expirado';
            } else {
                $prestamo->Estado = 'Vigente';
            }
        }






        return $datas;
    }


    public function getdetails($folio)
    {
        $detailsdata = DB::table('tblprestamos')->join('tblusuarios', 'tblusuarios.id', '=', 'tblprestamos.idprestatario')
            ->join('tblalumnos', 'tblalumnos.idusuario', '=', 'tblusuarios.id')
            ->join('tbldetprestamos', 'tbldetprestamos.Folio', '=', 'tblprestamos.Folio')
            ->join('tblejemplares', 'tblejemplares.codigo', '=', 'tbldetprestamos.codigo')
            ->join('tbllibros', 'tbllibros.isbn', '=', 'tblejemplares.isbn')
            ->join('tbleditoriales', 'tbleditoriales.id', '=', 'tbllibros.ideditorial')
            ->join('tblautores', 'tblautores.idautor', '=', 'tbllibros.idautor')
            ->select(
                'tblprestamos.folio',
                'tblalumnos.nombre',
                'tblalumnos.apellidos',
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
            ->where('tblprestamos.folio', '=', $folio)
            ->where('tblprestamos.existe', '=', '1')
            ->get();
        return $detailsdata;
    }

    public function array()
    {

        $listbooks = DB::table('tblprestamos')
            ->get();
        foreach ($listbooks as $prestamo) {
            $fechaf = strtotime($prestamo->Fecha_final);
            $now = strtotime('today');
            if ($fechaf > $now) {
                $prestamo->Estado = 'Expirado';
            } else {
                $prestamo->Estado = 'Vigente';
            }
        }

        echo ($fechaf);
        echo ('<br/>');
        echo ($now);
        //return $now;
    }

    public function getlistbooks($codigolibro)
    {
        if (is_null($codigolibro)) { } else {
            $listbooks = DB::table('tbllibros')
                ->join('tblejemplares', 'tblejemplares.isbn', '=', 'tbllibros.isbn')
                ->where('tbllibros.existe', '=', '1')
                ->where('tblejemplares.existe', '=', '1')
                ->where('tblejemplares.codigo', 'like', $codigolibro . '%')
                ->orWhere('tbllibros.titulo', 'like', $codigolibro . '%')
                ->get();
        }
        return $listbooks;
    }

    public function getlistcontrol($numcontrol)
    {
        if (is_null($numcontrol)) { } else {
            $dataalumn = DB::table('tblusuarios')->join('tblalumnos', 'tblalumnos.idusuario', '=', 'tblusuarios.id')
                ->select(
                    'tblusuarios.id',
                    'tblalumnos.nocontrol AS control1',
                    'tblalumnos.nombre',
                    'tblalumnos.apellidos',
                )->where('tblalumnos.existe', '=', '1')->where('tblalumnos.NoControl', 'like', $numcontrol . '%');


            $datadoc = DB::table('tblusuarios')->join('tbldocentes', 'tbldocentes.idusuario', '=', 'tblusuarios.id')
                ->select(
                    'tblusuarios.id',
                    'tbldocentes.nonomina AS control1',
                    'tbldocentes.nombre',
                    'tbldocentes.apellidos',
                )->where('tbldocentes.existe', '=', '1')->where('tbldocentes.NoNomina', 'like', $numcontrol . '%');

            $listcontrol = DB::table('tblusuarios')->join('tbladministrativos', 'tbladministrativos.idusuario', '=', 'tblusuarios.id')
                ->select(
                    'tblusuarios.id',
                    'tbladministrativos.nonomina AS control1',
                    'tbladministrativos.nombre',
                    'tbladministrativos.apellidos',
                )->where('tbladministrativos.existe', '=', '1')->where('tbladministrativos.NoNomina', 'like', $numcontrol . '%')
                ->union($dataalumn)
                ->union($datadoc)
                ->orderby('id')
                ->get();
        }
        return $listcontrol;
    }

    public function getselectedbook($codigolibro)
    {

        if (is_null($codigolibro)) { } else {

            $pedimento = explode(",", $codigolibro);
            if(count($pedimento)==1){
            $finalbook = DB::table('tbllibros')
            ->join('tblejemplares', 'tblejemplares.isbn', '=', 'tbllibros.isbn')
            ->join('tblautores', 'tblautores.idautor', '=', 'tbllibros.idautor')
            ->join('tbleditoriales', 'tbleditoriales.id', '=', 'tbllibros.ideditorial')
            ->select(
                'tblejemplares.codigo',                
                'tbllibros.titulo',
                'tbllibros.year',
                'tbllibros.imagen',
                'tblautores.nombre AS nautor',
                'tblautores.apellidos AS aautor',
                'tbleditoriales.nombre AS enombre')
            ->where('tbllibros.existe', '=', '1')
            ->where('tblejemplares.existe', '=', '1')
            ->where('tblejemplares.codigo', '=', $pedimento[0])
            ->orderby('Codigo')
            ->get();

            }


            if(count($pedimento)==2){

                $book1 = DB::table('tbllibros')
            ->join('tblejemplares', 'tblejemplares.isbn', '=', 'tbllibros.isbn')
            ->join('tblautores', 'tblautores.idautor', '=', 'tbllibros.idautor')
            ->join('tbleditoriales', 'tbleditoriales.id', '=', 'tbllibros.ideditorial')
            ->select(
                'tblejemplares.codigo',                
                'tbllibros.titulo',
                'tbllibros.year',
                'tbllibros.imagen',
                'tblautores.nombre AS nautor',
                'tblautores.apellidos AS aautor',
                'tbleditoriales.nombre AS enombre')
            ->where('tbllibros.existe', '=', '1')
            ->where('tblejemplares.existe', '=', '1')
            ->where('tblejemplares.codigo', '=', $pedimento[0]); 


                $finalbook = DB::table('tbllibros')
                ->join('tblejemplares', 'tblejemplares.isbn', '=', 'tbllibros.isbn')
                ->join('tblautores', 'tblautores.idautor', '=', 'tbllibros.idautor')
            ->join('tbleditoriales', 'tbleditoriales.id', '=', 'tbllibros.ideditorial')
            ->select(
                'tblejemplares.codigo',                
                'tbllibros.titulo',
                'tbllibros.year',
                'tbllibros.imagen',
                'tblautores.nombre AS nautor',
                'tblautores.apellidos AS aautor',
                'tbleditoriales.nombre AS enombre')
                ->where('tbllibros.existe', '=', '1')
                ->where('tblejemplares.existe', '=', '1')
                ->where('tblejemplares.codigo', '=', $pedimento[1])
                ->union($book1)
                ->orderby('Codigo')
                ->get();
    
                }





            if(count($pedimento)==3){
                $book1 = DB::table('tbllibros')
            ->join('tblejemplares', 'tblejemplares.isbn', '=', 'tbllibros.isbn')
            ->join('tblautores', 'tblautores.idautor', '=', 'tbllibros.idautor')
            ->join('tbleditoriales', 'tbleditoriales.id', '=', 'tbllibros.ideditorial')
            ->select(
                'tblejemplares.codigo',                
                'tbllibros.titulo',
                'tbllibros.year',
                'tbllibros.imagen',
                'tblautores.nombre AS nautor',
                'tblautores.apellidos AS aautor',
                'tbleditoriales.nombre AS enombre')
            ->where('tbllibros.existe', '=', '1')
            ->where('tblejemplares.existe', '=', '1')
            ->where('tblejemplares.codigo', '=', $pedimento[0]);                   
            


            $book2 = DB::table('tbllibros')
                ->join('tblejemplares', 'tblejemplares.isbn', '=', 'tbllibros.isbn')
                ->join('tblautores', 'tblautores.idautor', '=', 'tbllibros.idautor')
            ->join('tbleditoriales', 'tbleditoriales.id', '=', 'tbllibros.ideditorial')
            ->select(
                'tblejemplares.codigo',                
                'tbllibros.titulo',
                'tbllibros.year',
                'tbllibros.imagen',
                'tblautores.nombre AS nautor',
                'tblautores.apellidos AS aautor',
                'tbleditoriales.nombre AS enombre')
                ->where('tbllibros.existe', '=', '1')
                ->where('tblejemplares.existe', '=', '1')
                ->where('tblejemplares.codigo', '=', $pedimento[1]);
                

                $finalbook = DB::table('tbllibros')
                ->join('tblejemplares', 'tblejemplares.isbn', '=', 'tbllibros.isbn')
                ->join('tblautores', 'tblautores.idautor', '=', 'tbllibros.idautor')
                ->join('tbleditoriales', 'tbleditoriales.id', '=', 'tbllibros.ideditorial')
                ->select(
                    'tblejemplares.codigo',                
                    'tbllibros.titulo',
                    'tbllibros.year',
                    'tbllibros.imagen',
                    'tblautores.nombre AS nautor',
                    'tblautores.apellidos AS aautor',
                    'tbleditoriales.nombre AS enombre')
                ->where('tbllibros.existe', '=', '1')
                ->where('tblejemplares.existe', '=', '1')
                ->where('tblejemplares.codigo', '=', $pedimento[2])
                ->union($book1)
                ->union($book2)
                ->orderby('Codigo')
                ->get();

            }    





        }
        return $finalbook;

    }

    public function getselectedbook1()
    {
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'Renovation' => 'required'

        ]);

        $renovation = $request->input('Renovation');


        DB::table('tblprestamos')->insert([
            'Folio' => 241,
            'idprestatario' => '1',
            'fecha_inicio' => '2019-12-12',
            'fecha_final' => '2019-12-12',
            'fecha_entrega' => '2019-12-12',
            'renovaciones' => $renovation,
            'existe' => 1,
        ]);

        return;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $id)
    {
        $search = $id->get("numcontrol");
        $prestamos = DB::table('tblprestamos')->where('IdPrestatario', '=', $search)->get()
            ->get();
        return $prestamos;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tasks = DB::table('tblprestamos')->where('Folio', '=', $id)->get();

        return $tasks;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $moredays = $request->input('days');
        $fecha_final = $request->input('fecha_final');
        $renovaciones = $request->input('renovaciones');
        $renovaciones = $renovaciones + 1;
        $fechaff = date('Y-m-d', strtotime($fecha_final . ' + ' . $moredays . ' days'));
        $tasks = DB::table('tblprestamos')->where('Folio', '=', $id)->update(['fecha_final' => $fechaff, 'renovaciones' => $renovaciones]);
        return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tasks = DB::table('tblprestamos')->where('Folio', '=', $id)->update(['Existe' => 0]);
        return $tasks;
    }
}
