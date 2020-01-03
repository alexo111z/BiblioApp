<?php

namespace App\Http\Controllers;
use App\Libros;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Milon\Barcode\DNS1D;
use PDF;

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
                    'tblautores.Nombre as Nombre',
                    'tblautores.Apellidos as Ape',
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

    public function store(Request $request)
    {
        $barCodeGenerator = new DNS1D();

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
        'CD' => 'required'
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
       $cd = $request->post("CD");
       $imagen = $barCodeGenerator->getBarcodePNG($isbn, 'C39+');

       DB::insert("INSERT INTO tbllibros VALUES('$isbn', '$titulo', '$Idautor', '$IdEdi', '$IdCar', '$dewey','$edicion','$year','$volu' ,'$ejemplares', '$ejemplares', '$imagen', CURRENT_DATE,1)");

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
            else{
                $id = $codigo.$x;
            }
            DB::insert("insert into tblejemplares values({$id}, {$isbn}, CURRENT_DATE, {$cd},  1)");
        }

        return response(200);
    }

    public function update(Request $request, $ISBN)
    {
        $libro = Libros::find($ISBN);

        $atributos = $this->validate($request, [
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
        ]);
        
        if ($atributos['Ejemplares'] < $libro->EjemDisp) {
            return response('No es posible disminuir la cantidad de ejemplares desde esta ventana, ya que debe elegir un ejemplar en especifico. Por favor dirijase a la ventana detalles libros', 400);
        } else if ($atributos['Ejemplares'] - $libro->EjmpDisp) {
            $nuevos = true;
            if ($atributos['dewey'] < 10) {
                $atributos['dewey'] = "00".$atributos['dewey'];
            }else if($atributos['dewey'] >= 10 && $atributos['dewey'] < 100){
                $atributos['dewey'] = "0".$atributos['dewey'];
            }
            $codigo = "1".$atributos['dewey'];

            $ejemplaresdewey = DB::select("select (count(*)+1) as ejemplaresdewey from tbllibros, tblejemplares where tblejemplares.ISBN = tbllibros.ISBN and tbllibros.dewey = {$atributos['dewey']}");
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
            if($atributos['Edicion'] <10)
            $atributos['Edicion'] = "0".$atributos['Edicion'];
            $codigo = $codigo . $atributos['Edicion'];

            $pdfFileName = sprintf(
                'codigo-de-barras-isbn-%s.pdf',
                $ISBN
            );
            $barcodeImageGenerator = new DNS1D();
            $barcodeImages = [];
            for ($x=($libro->EjemDisp + 1); $x <= $atributos['Ejemplares']; $x++) {
                $id = '';
                if($x<10){
                    $id = $codigo . "00".$x;
                }else if ($x>=10 && $x <100) {
                    $id = $codigo . "0".$x;
                }
                else{
                    $id = $codigo.$x;
                }
                $cd = DB::table('tblejemplares')->where('ISBN', $ISBN)->value('CD');
                DB::insert("insert into tblejemplares values({$id}, {$ISBN}, CURRENT_DATE, {$cd},  1)");

                $barcodeImages[] = [
                    'code' => $id,
                    'image' => $barcodeImageGenerator->getBarcodePNG(
                        $id,
                        'C39+'
                    ),
                ];
            }

            $barcodePdf = PDF::loadView(
                'Libros.barcode',
                [
                    'isbn' => $ISBN,
                    'barcodeImages' => $barcodeImages,
                ]
            );
        }

        LIBROS::where('ISBN', '=', $ISBN)->update($request->all());
        return base64_encode($barcodePdf->stream());
    }



}
