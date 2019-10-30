<?php

namespace App\Http\Controllers;

use App\Carrera;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    //Display a listing of the resource.    Request $request
    public function index(){
        $carreras = Carrera::get()->where('Existe', 1);
        return $carreras;
//        $search = $request ->get("search");
//        $carreras = Carrera::orderBy('Nombre','DESC')
//            ->search($search)
//            ->paginate(10);
//        return [
//            'pagination' => [
//                'total'         => $carreras->total(),
//                'current_page'  => $carreras->currentPage(),
//                'per_page'      => $carreras->perPage(),
//                'last_page'     => $carreras->lastPage(),
//                'from'          => $carreras->firstItem(),
//                'to'            => $carreras->lastItem(),
//            ],
//            'carreras' =>$carreras
//        ];
    }

    //Show the form for creating a new resource.
    public function create()
    {
        //formulario
    }

    //Store a newly created resource in storage.
    public function store(Request $request)
    {
        //
    }

    // Display the specified resource.
    public function show($id)
    {
        //
    }

    // Show the form for editing the specified resource.
    public function edit($id){
        $carrera = Carrera::findOrFail($id);
        //Fromulario con datos
        return $carrera;
    }

    //Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        //
    }

   //Remove the specified resource from storage.
    public function destroy($id)
    {
        $carrera = Carrera::findOrFail($id);
        $carrera->Existe = 0;
        $carrera->save();
    }
}
