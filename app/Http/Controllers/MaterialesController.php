<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materiales;

class MaterialesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index(Request $request)
    {
        $search = $request->get('search');
        $materiales = Materiales::where('Existe','=',1)->search($search)->orderBy('id','DESC')->paginate(30);
        return [
            'pagination' => [
                'total'         => $materiales->total(),
                'current_page'  => $materiales->currentPage(),
                'per_page'      => $materiales->perPage(),
                'last_page'     => $materiales->lastPage(),
                'from'          => $materiales->firstItem(),
                'to'            => $materiales->lastItem(),
            ],
            'material' =>$materiales
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
        'Titulo' => 'required',
        'Clave' => 'required',
        'Year' => 'required',
        'Ejemplares' => 'required',
        'Tipo' => 'required'
      ]);

      Materiales::create($request->all());

      return;

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
        $this->validate($request, [
            'Titulo' => 'required',
            'Clave' => 'required',
            'Year' => 'required',
            'Ejemplares' => 'required',
            'Tipo' => 'required'
            ]);

            Materiales::where('Id', '=', $id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Materiales::where('Id', '=', $id)->delete();
        //Materiales::where('Id', '=', $id)->update(set Exite->"0");
        
    }
}
