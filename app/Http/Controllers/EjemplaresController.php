<?php

namespace App\Http\Controllers;
use App\Ejemplares;
USE App\Libros;
use Illuminate\Http\Request;
use DB;

class EjemplaresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ejemplares = Ejemplares::orderBy('Codigo')->where ('Existe', 1,) ->get();
        return $ejemplares; 
    }

        public function obtenerISBN (string $ISBN){            
                $ejemplares = Ejemplares::orderBy('Codigo')->where ([ ['Existe', 1],['ISBN', $ISBN],]) ->get();
                return $ejemplares;   
                     
        }
      

          /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Codigo)
    {
        $this->validate($request, [
            'Codigo' => 'required',
            'ISBN' => 'required',
            'FechaRegistro' => 'required',
            'CD' => 'required'
        ]);

        Ejemplares::where('Codigo', '=', $Codigo)->update($request->all());
    }
    
    //Remove the specified resource from storage.
    public function destroy($Codigo)
    {
        $ejemplar = ejemplares::findOrFail($Codigo);
        $ejemplar->Existe = 0;
        $ejemplar->save();

        $ejeeliminar=  DB::select("select  (ejemplares -1) as ejeeliminar from tbllibros where tbllibros.ISBN = {$ISBN}");
        
        LIBROS::where('ISBN', '=', $ISBN)->update(array(
            
            'Ejemplares'=>$ejeeliminar
     
));
    }
}