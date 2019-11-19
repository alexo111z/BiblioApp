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
    public function index()
    {
        $materiales = Materiales::orderBy('id','DESC')->get();
        return $materiales;
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $materiales1 = Materiales::findOrFail($id);
        $materiales1->delete();
    }
}
