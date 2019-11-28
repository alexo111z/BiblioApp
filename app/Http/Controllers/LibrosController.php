<?php

namespace App\Http\Controllers;
use App\Libros;
use DB;
use Illuminate\Http\Request;

class LibrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $libros = Libros::where('Existe','=',1)->search($search)->orderBy('ISBN','DESC')->paginate(10);
        return [
            'pagination' => [
                'total'         => $libros->total(),
                'current_page'  => $libros->currentPage(),
                'per_page'      => $libros->perPage(),
                'last_page'     => $libros->lastPage(),
                'from'          => $libros->firstItem(),
                'to'            => $libros->lastItem(),
            ],
            'libro' =>$libros
        ];
    }

    public function selects()
    {   
        $autores= DB::table('tblautores')->get();
        $editoriales= DB::table('tbleditoriales')->get();
        $carreras= DB::table('tblcarreras')->get();
        $deweys= DB::table('tbldewey')->get();

        return view('Libros.principal', compact('autores', 'editoriales','carreras','deweys'));
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
        'ISBN' => 'required',
        'Titulo' => 'required',
        'IdAutor' => 'required',
        'IdEditorial' => 'required',
        'IdCarrera' => 'required',
        'dewey' => 'required',
        'Edicion' => 'required',
        'Year' => 'required',
        'Volumen' => 'required',
        'Ejemplares' => 'required',
        'EjemDisp' => 'required',
        'Imagen' => 'required',
        'FechaRegistro' => 'required'
      ]);

      Libros::create($request->all());

      return;

    }

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ISBN)
    {
        $this->validate($request, [
            'ISBN' => 'required',
            'Titulo' => 'required',
            'IdAutor' => 'required',
            'IdEditorial' => 'required',
            'IdCarrera' => 'required',
            'dewey' => 'required',
            'Edicion' => 'required',
            'Year' => 'required',
            'Volumen' => 'required',
            'Ejemplares' => 'required',
            'EjemDisp' => 'required',
            'Imagen' => 'required',
            'FechaRegistro' => 'required'
        ]);

        LIBROS::where('ISBN', '=', $ISBN)->update($request->all());
    }

    
    //Remove the specified resource from storage.
    public function destroy($ISBN)
    {
        $libro = Libros::findOrFail($ISBN);
        $libro->Existe = 0;
        $libro->save();
    }
}