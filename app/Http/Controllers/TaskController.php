<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataa=DB::table('tblprestamos')->join('tblusuarios','tblusuarios.id','=','tblprestamos.idprestatario')
        ->join('tblalumnos','tblalumnos.idusuario','=','tblusuarios.id')
        ->select('tblprestamos.folio','tblalumnos.nombre','tblalumnos.apellidos','tblprestamos.fecha_inicio'
        ,'tblprestamos.fecha_final','tblprestamos.fecha_entrega','tblprestamos.renovaciones')
        ->where('tblprestamos.existe','=','1');        
        

        $datab=DB::table('tblprestamos')->join('tblusuarios','tblusuarios.id','=','tblprestamos.idprestatario')
        ->join('tbldocentes','tbldocentes.idusuario','=','tblusuarios.id')
        ->select('tblprestamos.folio','tbldocentes.nombre','tbldocentes.apellidos','tblprestamos.fecha_inicio'
        ,'tblprestamos.fecha_final','tblprestamos.fecha_entrega','tblprestamos.renovaciones')
        ->where('tblprestamos.existe','=','1');  

        $datas=DB::table('tblprestamos')->join('tblusuarios','tblusuarios.id','=','tblprestamos.idprestatario')
        ->join('tbladministrativos','tbladministrativos.idusuario','=','tblusuarios.id')
        ->select('tblprestamos.folio','tbladministrativos.nombre','tbladministrativos.apellidos','tblprestamos.fecha_inicio'
        ,'tblprestamos.fecha_final','tblprestamos.fecha_entrega','tblprestamos.renovaciones')
        ->where('tblprestamos.existe','=','1')
        ->union($dataa)
        ->union($datab)
        ->orderby('folio')
        ->get();   

        return $datas;

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
        $this->validate($request,[
                'Renovation'=>'required'

        ]);

        $renovation = $request->input('Renovation');

        
        DB::table('tblprestamos')->insert([
            'Folio'=>241,
            'idprestatario'=>'1',
            'fecha_inicio'=>'2019-12-12',
            'fecha_final'=>'2019-12-12',
            'fecha_entrega'=>'2019-12-12',
            'renovaciones'=>$renovation,
            'existe'=>1,
        ]);

        return;


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tasks=DB::table('tblprestamos')->where('Folio','=',$id)->get();

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
        $this->validate($request,[
            'renovaciones'=>'required',
        ]);
        $renovation = $request->input('renovaciones');

        $tasks=DB::table('tblprestamos')->where('Folio','=',$id)->update(['renovaciones' => $renovation]);

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
        $tasks=DB::table('tblprestamos')->where('Folio','=',$id)->update(['Existe' => 0]);
        return $tasks;
        
    }
}
