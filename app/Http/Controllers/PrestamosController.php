<?php

namespace App\Http\Controllers;

use App\Prestamos;
use Illuminate\Http\Request;
use DB;

class PrestamosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$prestamos = Prestamos::orderBy('Folio','DESC')->paginate();
        
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
        ->paginate(2);


        //$datas = $dataa->merge($datab); 
       //var_dump($datas);
        //die();  
        
        return view('Prestamos.index',compact('datas'));
    }

    public function buscarprestamos(Request $busqueda)
    {
        $nombre = $busqueda->input('name');
        $datas=DB::table('tblprestamos')->join('tblusuarios','tblusuarios.id','=','tblprestamos.idprestatario')
        ->join('tblalumnos','tblalumnos.idusuario','=','tblusuarios.id')
        ->select('tblprestamos.folio','tblalumnos.nombre','tblalumnos.apellidos','tblprestamos.fecha_inicio'
        ,'tblprestamos.fecha_final','tblprestamos.fecha_entrega','tblprestamos.renovaciones')
        ->where('tblalumnos.nombre','like',$nombre)
        ->paginate(2);           

        return view('Prestamos.index',compact('datas'));        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Prestamos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $busqueda)
    {
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prestamos  $prestamos
     * @return \Illuminate\Http\Response
     */
    public function show(Prestamos $prestamos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prestamos  $prestamos
     * @return \Illuminate\Http\Response
     */
    public function edit(Prestamos $prestamos)
    {
        return view('Prestamos.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prestamos  $prestamos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prestamos $prestamos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prestamos  $prestamos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prestamos $prestamos)
    {
        //
    }
}
