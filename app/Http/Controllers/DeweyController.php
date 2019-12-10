<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DEWEY;

class DeweyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dewey = DB::select('SELECT * FROM tbldewey WHERE (Id % 100) = 0');
        return $dewey;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lista = DEWEY::where([
            ['Id', '>', $id],
            ['Id', '<', ($id+100)],
        ])->paginate(15);
        return [
            'pagination' => [
                'total'         => $lista->total(),
                'current_page'  => $lista->currentPage(),
                'per_page'      => $lista->perPage(),
                'last_page'     => $lista->lastPage(),
                'from'          => $lista->firstItem(),
                'to'            => $lista->lastItem(),
            ],
            'lista' =>$lista
        ];
    }
    public function obtenerTopico($id)
    {
        $topico = DEWEY::where([
            ['Id', '>', $id],
            ['Id', '<', ($id+100)]
            ])->get();

        return $topico;
    }
}
