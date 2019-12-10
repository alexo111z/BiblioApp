<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Editoriales;

class EditorialesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $editoriales = Editoriales::where('Existe','=',1)->search($search)->paginate(15);
        return [
            'pagination' => [
                'total'         => $editoriales->total(),
                'current_page'  => $editoriales->currentPage(),
                'per_page'      => $editoriales->perPage(),
                'last_page'     => $editoriales->lastPage(),
                'from'          => $editoriales->firstItem(),
                'to'            => $editoriales->lastItem(),
            ],
            'editoriales' =>$editoriales
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
        ]);

        Editoriales::create($request->all());
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
        ]);
        Editoriales::where('Id', '=', $id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Editoriales::where('Id', '=', $id)->delete();
    }
}
