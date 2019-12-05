<?php

namespace App\Http\Controllers;
use App\Ejemplares;
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
        $search = $request->get('search');
        $ejemplares = Ejemplares::where('Existe','=',1)->search($search)->paginate(10);
        return [
            'pagination' => [
                'total'         => $ejemplares->total(),
                'current_page'  => $ejemplares->currentPage(),
                'per_page'      => $ejemplares->perPage(),
                'last_page'     => $ejemplares->lastPage(),
                'from'          => $ejemplares->firstItem(),
                'to'            => $ejemplares->lastItem(),
            ],
            'ejemplar' =>$ejemplares
        ];
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
        'Codigo' => 'required',
        'ISBN' => 'required',
        'CD' => 'required'
      ]);
      $cod = $request->post("Codigo");
      $isbn= $request->post("ISBN");
      $cd = $request->post("CD");

      DB::insert("INSERT INTO tblejemplares VALUES('$cod', '$isbn', CURRENT_DATE, '$cd', 1)");
    




      return;
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
        $ejemplar = Ejemplares::findOrFail($Codigo);
        $ejemplar->Existe = 0;
        $ejemplar->save();
    }
}