<?php

namespace App\Http\Controllers;

use App\Carrera;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    //Display a listing of the resource.    Request $request
    public function index(Request $request){
        $carreras = Carrera::orderBy('Clave')->where('Existe', 1)->paginate(10);
        return [
            'pagination' => [
                'total'         => $carreras->total(),
                'current_page'  => $carreras->currentPage(),
                'per_page'      => $carreras->perPage(),
                'last_page'     => $carreras->lastPage(),
                'from'          => $carreras->firstItem(),
                'to'            => $carreras->lastItem(),
            ],
            'carreras' => $carreras,
        ];

    }

    //Store a newly created resource in storage.
    public function store(Request $request)
    {
        $this->validate($request, [
            'Clave' => 'required',
            'Nombre' => 'required',
        ]);
        Carrera::create([
            'Clave' => $request['Clave'],
            'Nombre' => $request['Nombre'],
            'Existe' => 1,
            ]);
        return;
    }

    //Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'Clave' => 'required',
            'Nombre' => 'required',
        ]);

        Carrera::findOrFail($id)->update($request->all());
        return;
    }

   //Remove the specified resource from storage.
    public function destroy($id)
    {
        $carrera = Carrera::findOrFail($id);
        $carrera->Existe = 0;
        $carrera->save();
    }
}
