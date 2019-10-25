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

        $datas=DB::table('tblprestamos')->join('tblusuarios','tblusuarios.id','=','tblprestamos.idprestatario')
        ->join('tblalumnos','tblalumnos.idusuario','=','tblusuarios.id')
        ->select('tblalumnos.nombre')->get();
        return view('Prestamos.index',compact('datas'));
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
        //
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
        //
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
