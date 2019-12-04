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
        $libros = Libros::join('tblcarreras', 'tblcarreras.clave', '=', 'tbllibros.IdCarrera')
                ->join('tbleditoriales' , 'tbleditoriales.Id','=','tbllibros.IdEditorial')  
                ->join('tbldewey' , 'tbldewey.Id','=','tbllibros.dewey')  
                ->join('tblautores','tblautores.IdAutor','=','tbllibros.IdAutor')
                ->select(
                    'tbllibros.ISBN',
                    'tbllibros.Titulo',
                    'tbllibros.IdAutor',
                    'tbllibros.IdEditorial',
                    'tbllibros.IdCarrera',
                    'tbllibros.dewey',
                    'tblAutores.Nombre as Nombre',
                    'tblAutores.Apellidos as Ape',
                    'tbleditoriales.Nombre as Editorial',
                    'tblcarreras.Nombre as Carrera',
                    'tbldewey.Nombre as Dewey',
                    'tbllibros.Edicion',
                    'tbllibros.Year',
                    'tbllibros.Volumen',
                    'tbllibros.Ejemplares',
                    'tbllibros.EjemDisp',
                    'tbllibros.Imagen',
                    'tbllibros.FechaRegistro'
                   
                )
                ->where('tbllibros.Existe', '=', 1)
                ->orderby('ISBN', 'ASC')
                ->search($search)
                ->paginate(10); 
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
        'Ejemplares' => 'required'
      ]);
      $isbn = $request->post("ISBN");
      $titulo = $request->post("Titulo");
      $Idautor = $request->post("IdAutor");
      $IdEdi = $request->post("IdEditorial");
        $IdCar = $request->post("IdCarrera");
       $dewey = $request->post("dewey");
       $edicion = $request->post("Edicion");
       $year = $request->post("Year");
       $volu = $request->post("Volumen");
       $ejemplares = $request->post("Ejemplares");
       $imagen = "http://127.0.0.1:8000/images/template.png";
       DB::insert("INSERT INTO tbllibros VALUES('$isbn', '$titulo', '$Idautor', '$IdEdi', '$IdCar', '$dewey','$edicion','$year','$volu' ,'$ejemplares', '$ejemplares','$imagen', CURRENT_DATE, 1)");
        #########################//generacion de codigo
        if ($dewey < 10) {
            $dewey = "00".$dewey;
        }else if($dewey >= 10 && $dewey <100){
            $dewey = "0".$dewey;
        }
        $codigo = "1".$dewey;
        $ejemplaresdewey = DB::select("select (count(*)+1) as ejemplaresdewey from tbllibros, tblejemplares where tblejemplares.ISBN = tbllibros.ISBN and tbllibros.dewey = {$dewey}");
        foreach ($ejemplaresdewey as $key) {
                if (($key->ejemplaresdewey) < 10) {
                    $cant = "00".($key->ejemplaresdewey);
                }else if (($key->ejemplaresdewey) >= 10 &&  ($key->ejemplaresdewey)<100) {
                    $cant = "0".($key->ejemplaresdewey);
                }else {
                    $cant = ($key->ejemplaresdewey);
                }
        }
        $codigo= $codigo.$cant;
        if($edicion <10)
            $edicion = "0".$edicion;
        $codigo = $codigo . $edicion;
        for ($x=1; $x <= $ejemplares; $x++) {
            $id = ''; 
            if($x<10){
                $id = $codigo . "00".$x;
            }else if ($x>=10 && $x <100) {
                $id = $codigo . "0".$x;
            }
            DB::insert("insert into tblejemplares values({$id}, {$isbn},CURRENT_DATE,1)");
        }
        return $codigo;
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