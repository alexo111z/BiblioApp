<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Autores;

class AutoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $autores = Autores::where('Existe','=',1)->search($search)->paginate(10);
        return [
            'pagination' => [
                'total'         => $autores->total(),
                'current_page'  => $autores->currentPage(),
                'per_page'      => $autores->perPage(),
                'last_page'     => $autores->lastPage(),
                'from'          => $autores->firstItem(),
                'to'            => $autores->lastItem(),
            ],
            'autores' =>$autores
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
        $this ->validate($request, [
            'Nombre' => 'required',
            'Apellidos' => 'required'
        ]);

        Autores::create($request->all());

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
            'Nombre' => 'required',
            'Apellidos' => 'required'
        ]);

        Autores::where('IdAutor', '=', $id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Autores::where('IdAutor', '=', $id)->delete();
    }
}
