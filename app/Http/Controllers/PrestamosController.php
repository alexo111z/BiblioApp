<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DateTime;

class PrestamosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');

        if (is_null($search)) {
            $dataa = DB::table('tblprestamos')->join('tblusuarios', 'tblusuarios.id', '=', 'tblprestamos.idprestatario')
                ->join('tblalumnos', 'tblalumnos.idusuario', '=', 'tblusuarios.id')
                ->select(
                    'tblprestamos.folio',
                    'tblalumnos.nombre',
                    'tblalumnos.apellidos',
                    'tblprestamos.fecha_inicio',
                    'tblprestamos.fecha_final',
                    'tblprestamos.fecha_entrega',
                    'tblprestamos.renovaciones'
                );



            $datab = DB::table('tblprestamos')->join('tblusuarios', 'tblusuarios.id', '=', 'tblprestamos.idprestatario')
                ->join('tbldocentes', 'tbldocentes.idusuario', '=', 'tblusuarios.id')
                ->select(
                    'tblprestamos.folio',
                    'tbldocentes.nombre',
                    'tbldocentes.apellidos',
                    'tblprestamos.fecha_inicio',
                    'tblprestamos.fecha_final',
                    'tblprestamos.fecha_entrega',
                    'tblprestamos.renovaciones'
                );

            $datas = DB::table('tblprestamos')->join('tblusuarios', 'tblusuarios.id', '=', 'tblprestamos.idprestatario')
                ->join('tbladministrativos', 'tbladministrativos.idusuario', '=', 'tblusuarios.id')
                ->select(
                    'tblprestamos.folio',
                    'tbladministrativos.nombre',
                    'tbladministrativos.apellidos',
                    'tblprestamos.fecha_inicio',
                    'tblprestamos.fecha_final',
                    'tblprestamos.fecha_entrega',
                    'tblprestamos.renovaciones'
                )
                ->union($dataa)
                ->union($datab)
                ->orderby('fecha_final', 'DESC')
                ->paginate(4);
        } else {
            $dataa = DB::table('tblprestamos')->join('tblusuarios', 'tblusuarios.id', '=', 'tblprestamos.idprestatario')
                ->join('tblalumnos', 'tblalumnos.idusuario', '=', 'tblusuarios.id')
                ->select(
                    'tblprestamos.folio',
                    'tblalumnos.nombre',
                    'tblalumnos.apellidos',
                    'tblprestamos.fecha_inicio',
                    'tblprestamos.fecha_final',
                    'tblprestamos.fecha_entrega',
                    'tblprestamos.renovaciones'
                )
                ->where('tblalumnos.NoControl', 'like', $search . '%')
                ->orWhere('tblalumnos.Apellidos', 'like', $search . '%');


            $datab = DB::table('tblprestamos')->join('tblusuarios', 'tblusuarios.id', '=', 'tblprestamos.idprestatario')
                ->join('tbldocentes', 'tbldocentes.idusuario', '=', 'tblusuarios.id')
                ->select(
                    'tblprestamos.folio',
                    'tbldocentes.nombre',
                    'tbldocentes.apellidos',
                    'tblprestamos.fecha_inicio',
                    'tblprestamos.fecha_final',
                    'tblprestamos.fecha_entrega',
                    'tblprestamos.renovaciones'
                )
                ->where('tbldocentes.NoNomina', 'like', $search . '%')
                ->orWhere('tbldocentes.Apellidos', 'like', $search . '%');

            $datas = DB::table('tblprestamos')->join('tblusuarios', 'tblusuarios.id', '=', 'tblprestamos.idprestatario')
                ->join('tbladministrativos', 'tbladministrativos.idusuario', '=', 'tblusuarios.id')
                ->select(
                    'tblprestamos.folio',
                    'tbladministrativos.nombre',
                    'tbladministrativos.apellidos',
                    'tblprestamos.fecha_inicio',
                    'tblprestamos.fecha_final',
                    'tblprestamos.fecha_entrega',
                    'tblprestamos.renovaciones'
                )
                ->where('tbladministrativos.NoNomina', 'like', $search . '%')
                ->orWhere('tbladministrativos.Apellidos', 'like', $search . '%')
                ->union($dataa)
                ->union($datab)
                ->orderby('fecha_final', 'DESC')
                ->paginate(4);
        }


        foreach ($datas as $prestamo) {
            $fechaf = strtotime($prestamo->fecha_final);
            $entregado = $prestamo->fecha_entrega;
            $now = strtotime('today');
            if (is_null($entregado)) {
                if ($now <= $fechaf) {
                    $prestamo->Estado = 'Vigente';
                } else {
                    $prestamo->Estado = 'Expirado';
                }
            } else {
                $prestamo->Estado = 'Entregado';
            }
        }






        return [
            'pagination' => [
                'total'         => $datas->total(),
                'current_page'  => $datas->currentPage(),
                'per_page'      => $datas->perPage(),
                'last_page'     => $datas->lastPage(),
                'from'          => $datas->firstItem(),
                'to'            => $datas->lastItem(),
            ],
            'prestamos' =>$datas
        ];
    }


    public function getdetails($folio)
    {
        $detailsdata = DB::table('tblprestamos')->join('tblusuarios', 'tblusuarios.id', '=', 'tblprestamos.idprestatario')
            ->join('tblalumnos', 'tblalumnos.idusuario', '=', 'tblusuarios.id')
            ->join('tbldetprestamos', 'tbldetprestamos.Folio', '=', 'tblprestamos.Folio')
            ->join('tblejemplares', 'tblejemplares.codigo', '=', 'tbldetprestamos.codigo')
            ->join('tbllibros', 'tbllibros.isbn', '=', 'tblejemplares.isbn')
            ->join('tbleditoriales', 'tbleditoriales.id', '=', 'tbllibros.ideditorial')
            ->join('tblautores', 'tblautores.idautor', '=', 'tbllibros.idautor')
            ->select(
                'tblprestamos.folio',
                'tblalumnos.nombre',
                'tblalumnos.apellidos',
                'tblprestamos.fecha_inicio',
                'tblprestamos.fecha_final',
                'tblprestamos.fecha_entrega',
                'tblprestamos.renovaciones',
                'tbldetprestamos.codigo',
                'tbllibros.titulo',
                'tbllibros.imagen',
                'tbllibros.year',
                'tbleditoriales.nombre AS nombreeditorial',
                'tblautores.nombre AS nombreautor',
                'tblautores.apellidos AS apellidoautor'
            )
            ->where('tblprestamos.folio', '=', $folio)
            ->get();
        return $detailsdata;
    }

    public function array()
    {

        $listbooks = DB::table('tblprestamos')
            ->get();
        foreach ($listbooks as $prestamo) {
            $fechaf = strtotime($prestamo->Fecha_final);
            $now = strtotime('today');
            if ($fechaf > $now) {
                $prestamo->Estado = 'Expirado';
            } else {
                $prestamo->Estado = 'Vigente';
            }
        }

        echo ($fechaf);
        echo ('<br/>');
        echo ($now);
        //return $now;
    }

    public function getlistbooks($codigolibro)
    {
        if (is_null($codigolibro)) { } else {
            $listbooks = DB::table('tbllibros')
                ->join('tblejemplares', 'tblejemplares.isbn', '=', 'tbllibros.isbn')
                ->where('tbllibros.existe', '=', '1')
                ->where('tblejemplares.existe', '=', '1')
                ->where('tblejemplares.codigo', 'like', $codigolibro . '%')
                ->orWhere('tbllibros.titulo', 'like', $codigolibro . '%')
                ->get();
        }
        return $listbooks;
    }

    public function getlistcontrol($numcontrol)
    {
        if (is_null($numcontrol)) { } else {
            $dataalumn = DB::table('tblusuarios')
            ->join('tblalumnos', 'tblalumnos.idusuario', '=', 'tblusuarios.id')
                ->select(
                    'tblusuarios.id',
                    'tblalumnos.nocontrol AS control1',
                    'tblalumnos.nombre',
                    'tblalumnos.apellidos'
                )->where('tblalumnos.existe', '=', '1')->where('tblalumnos.NoControl', 'like', $numcontrol . '%');


            $datadoc = DB::table('tblusuarios')->join('tbldocentes', 'tbldocentes.idusuario', '=', 'tblusuarios.id')
                ->select(
                    'tblusuarios.id',
                    'tbldocentes.nonomina AS control1',
                    'tbldocentes.nombre',
                    'tbldocentes.apellidos'
                )->where('tbldocentes.existe', '=', '1')->where('tbldocentes.NoNomina', 'like', $numcontrol . '%');

            $listcontrol = DB::table('tblusuarios')->join('tbladministrativos', 'tbladministrativos.idusuario', '=', 'tblusuarios.id')
                ->select(
                    'tblusuarios.id',
                    'tbladministrativos.nonomina AS control1',
                    'tbladministrativos.nombre',
                    'tbladministrativos.apellidos'
                )->where('tbladministrativos.existe', '=', '1')->where('tbladministrativos.NoNomina', 'like', $numcontrol . '%')
                ->union($dataalumn)
                ->union($datadoc)
                ->orderby('id')
                ->get();
        }
        return $listcontrol;
    }

    public function getselectedbook($codigolibro)
    {

        if (is_null($codigolibro)) { } else {

            $pedimento = explode(",", $codigolibro);
            if (count($pedimento) == 1) {
                $finalbook = DB::table('tbllibros')
                    ->join('tblejemplares', 'tblejemplares.isbn', '=', 'tbllibros.isbn')
                    ->join('tblautores', 'tblautores.idautor', '=', 'tbllibros.idautor')
                    ->join('tbleditoriales', 'tbleditoriales.id', '=', 'tbllibros.ideditorial')
                    ->select(
                        'tblejemplares.codigo',
                        'tbllibros.titulo',
                        'tbllibros.year',
                        'tbllibros.imagen',
                        'tblautores.nombre AS nautor',
                        'tblautores.apellidos AS aautor',
                        'tbleditoriales.nombre AS enombre'
                    )
                    ->where('tbllibros.existe', '=', '1')
                    ->where('tblejemplares.existe', '=', '1')
                    ->where('tblejemplares.codigo', '=', $pedimento[0])
                    ->orderby('Codigo')
                    ->get();
            }


            if (count($pedimento) == 2) {

                $book1 = DB::table('tbllibros')
                    ->join('tblejemplares', 'tblejemplares.isbn', '=', 'tbllibros.isbn')
                    ->join('tblautores', 'tblautores.idautor', '=', 'tbllibros.idautor')
                    ->join('tbleditoriales', 'tbleditoriales.id', '=', 'tbllibros.ideditorial')
                    ->select(
                        'tblejemplares.codigo',
                        'tbllibros.titulo',
                        'tbllibros.year',
                        'tbllibros.imagen',
                        'tblautores.nombre AS nautor',
                        'tblautores.apellidos AS aautor',
                        'tbleditoriales.nombre AS enombre'
                    )
                    ->where('tbllibros.existe', '=', '1')
                    ->where('tblejemplares.existe', '=', '1')
                    ->where('tblejemplares.codigo', '=', $pedimento[0]);


                $finalbook = DB::table('tbllibros')
                    ->join('tblejemplares', 'tblejemplares.isbn', '=', 'tbllibros.isbn')
                    ->join('tblautores', 'tblautores.idautor', '=', 'tbllibros.idautor')
                    ->join('tbleditoriales', 'tbleditoriales.id', '=', 'tbllibros.ideditorial')
                    ->select(
                        'tblejemplares.codigo',
                        'tbllibros.titulo',
                        'tbllibros.year',
                        'tbllibros.imagen',
                        'tblautores.nombre AS nautor',
                        'tblautores.apellidos AS aautor',
                        'tbleditoriales.nombre AS enombre'
                    )
                    ->where('tbllibros.existe', '=', '1')
                    ->where('tblejemplares.existe', '=', '1')
                    ->where('tblejemplares.codigo', '=', $pedimento[1])
                    ->union($book1)
                    ->orderby('Codigo')
                    ->get();
            }



            if (count($pedimento) == 3) {
                $book1 = DB::table('tbllibros')
                    ->join('tblejemplares', 'tblejemplares.isbn', '=', 'tbllibros.isbn')
                    ->join('tblautores', 'tblautores.idautor', '=', 'tbllibros.idautor')
                    ->join('tbleditoriales', 'tbleditoriales.id', '=', 'tbllibros.ideditorial')
                    ->select(
                        'tblejemplares.codigo',
                        'tbllibros.titulo',
                        'tbllibros.year',
                        'tbllibros.imagen',
                        'tblautores.nombre AS nautor',
                        'tblautores.apellidos AS aautor',
                        'tbleditoriales.nombre AS enombre'
                    )
                    ->where('tbllibros.existe', '=', '1')
                    ->where('tblejemplares.existe', '=', '1')
                    ->where('tblejemplares.codigo', '=', $pedimento[0]);



                $book2 = DB::table('tbllibros')
                    ->join('tblejemplares', 'tblejemplares.isbn', '=', 'tbllibros.isbn')
                    ->join('tblautores', 'tblautores.idautor', '=', 'tbllibros.idautor')
                    ->join('tbleditoriales', 'tbleditoriales.id', '=', 'tbllibros.ideditorial')
                    ->select(
                        'tblejemplares.codigo',
                        'tbllibros.titulo',
                        'tbllibros.year',
                        'tbllibros.imagen',
                        'tblautores.nombre AS nautor',
                        'tblautores.apellidos AS aautor',
                        'tbleditoriales.nombre AS enombre'
                    )
                    ->where('tbllibros.existe', '=', '1')
                    ->where('tblejemplares.existe', '=', '1')
                    ->where('tblejemplares.codigo', '=', $pedimento[1]);


                $finalbook = DB::table('tbllibros')
                    ->join('tblejemplares', 'tblejemplares.isbn', '=', 'tbllibros.isbn')
                    ->join('tblautores', 'tblautores.idautor', '=', 'tbllibros.idautor')
                    ->join('tbleditoriales', 'tbleditoriales.id', '=', 'tbllibros.ideditorial')
                    ->select(
                        'tblejemplares.codigo',
                        'tbllibros.titulo',
                        'tbllibros.year',
                        'tbllibros.imagen',
                        'tblautores.nombre AS nautor',
                        'tblautores.apellidos AS aautor',
                        'tbleditoriales.nombre AS enombre'
                    )
                    ->where('tbllibros.existe', '=', '1')
                    ->where('tblejemplares.existe', '=', '1')
                    ->where('tblejemplares.codigo', '=', $pedimento[2])
                    ->union($book1)
                    ->union($book2)
                    ->orderby('Codigo')
                    ->get();
            }
        }
        return $finalbook;
    }

    public function getselectedbook1()
    { }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $respuesta = "1";
        $this->validate($request, [
            'iduser' => 'required',
            'codigos' => 'required',
            'fecha_i' => 'required',
            'dias' => 'required'
        ]);
        $iduser = $request->input('iduser');
        $codigos = $request->input('codigos');
        $fecha_i = $request->input('fecha_i');
        $dias = $request->input('dias');

        //$fechaf = date('Y-m-d', strtotime($fecha_i . ' + ' . $dias . ' days'));

        $fechaf=$fecha_i;
        while($dias>0){
            if($nameOfDay = date('l', strtotime($fechaf))=='Friday'||$nameOfDay = date('l', strtotime($fechaf))=='Saturday'){
                $fechaf = date('Y-m-d', strtotime($fechaf . ' + ' . '1' . ' days'));
            }else{
                $fechaf = date('Y-m-d', strtotime($fechaf . ' + ' . '1' . ' days'));
                $dias=$dias-1;
            }
        };



        $adeudos = DB::table('tblprestamos')
                ->where('idprestatario', '=', $iduser)
                ->where('existe', '=', '1')
                ->where('fecha_final', '<', DB::raw('curdate()'))
                ->whereNull('fecha_entrega')
                ->groupBy('folio')->count();





        $prestamos = DB::table('tblprestamos')->select('Folio')
            ->where('idprestatario', '=', $iduser)
            ->where('existe', '=', '1')
            ->where('fecha_final', '>=', DB::raw('curdate()'))
            ->whereNull('fecha_entrega')
            ->get();

        $lprestados = 0;
        foreach ($prestamos as $prestamo) {
            $lprestadoos1 = DB::table('tbldetprestamos')
                ->where('folio', '=', $prestamo->Folio)
                ->groupBy('folio')->count();
            $lprestados = $lprestados + $lprestadoos1;
        }


        if($adeudos>0){
            $respuesta = "Usted No Ha Entregado Uno o Mas Libros, Vaya A Multas";
        }else{

            if ($lprestados < 3) {
                if ($lprestados + count($codigos) <= 3) {
                    $stock = 1;
                    for ($i = 0; $i < count($codigos); $i++) {
                        $isbn = DB::table('tblejemplares')
                            ->select('ISBN')
                            ->where('Codigo', '=', $codigos[$i])
                            ->where('existe', '=', '1')
                            ->get();

                        $stocklibro = DB::table('tbllibros')
                            ->select('ejemdisp')
                            ->where('ISBN', '=', $isbn[0]->ISBN)
                            ->where('existe', '=', '1')
                            ->get();
                        if ($stocklibro[0]->ejemdisp < 2) {
                            $respuesta = "El Ejemplar " . $codigos[$i] . " Es unico ejemplar, no se puede prestar";
                            $stock = 0;
                        }
                    }

                    if ($stock == 1) {
                        $id = DB::table('tblprestamos')->insertGetId([
                            'idprestatario' => $iduser,
                            'fecha_inicio' => $fecha_i,
                            'fecha_final' => $fechaf,
                            'renovaciones' => 0,
                            'existe' => 1,
                        ]);
                        for ($i = 0; $i < count($codigos); $i++) {
                            DB::table('tbldetprestamos')->insert([
                                'folio' => $id,
                                'codigo' => $codigos[$i],
                            ]);

                            $isbnstock = DB::table('tblejemplares')
                                ->select('ISBN')
                                ->where('Codigo', '=', $codigos[$i])
                                ->where('existe', '=', '1')
                                ->get();

                            DB::table('tbllibros')
                                ->where('ISBN', '=', $isbnstock[0]->ISBN)
                                ->decrement('EjemDisp', 1);

                            DB::table('tblejemplares')
                                ->where('Codigo', '=', $codigos[$i])
                                ->update(['Existe' => 0]);
                        }
                        $respuesta = "1";
                    }
                } else {
                    $respuesta = "Usted excede el limite de prestamo, quite libros";
                }
            } else {
                $respuesta = "No podemos prestarle más de 3 libros a la vez";
            }



        }






        return response()->json(['id' => $respuesta]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $id)
    {
        $search = $id->get("numcontrol");
        $prestamos = DB::table('tblprestamos')->where('IdPrestatario', '=', $search)->get()
            ->get();
        return $prestamos;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $run = "hola";

        return response()->json(['entrega' => $run]);
    }

    public function endprestamo($folio)
    {
        DB::table('tblprestamos')
            ->where('Folio', '=', $folio)
            ->update(['Fecha_entrega' => DB::raw('curdate()')]);

        $libros = DB::table('tbldetprestamos')
            ->select('Codigo')
            ->where('Folio', '=', $folio)
            ->get();

        foreach ($libros as $librito) {
            DB::table('tblejemplares')
                ->where('Codigo', '=', $librito->Codigo)
                ->update(['Existe' => 1]);

            $isbns = DB::table('tblejemplares')
                ->select('ISBN')
                ->where('Codigo', '=', $librito->Codigo)
                ->get();

            DB::table('tbllibros')
                ->where('ISBN', '=', $isbns[0]->ISBN)
                ->increment('EjemDisp', 1);

        }








        return response()->json(['entrega' => $libros]);
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
        $moredays = $request->input('days');
        $fecha_final = $request->input('fecha_final');
        $renovaciones = $request->input('renovaciones');
        $renovaciones = $renovaciones + 1;
        //$fechaff = date('Y-m-d', strtotime($fecha_final . ' + ' . $moredays . ' days'));
        $fechaff=$fecha_final;
        while($moredays>0){
            if($nameOfDay = date('l', strtotime($fechaff))=='Friday'||$nameOfDay = date('l', strtotime($fechaff))=='Saturday'){
                $fechaff = date('Y-m-d', strtotime($fechaff . ' + ' . '1' . ' days'));
            }else{
                $fechaff = date('Y-m-d', strtotime($fechaff . ' + ' . '1' . ' days'));
                $moredays=$moredays-1;
            }
        };



        $tasks = DB::table('tblprestamos')->where('Folio', '=', $id)->update(['fecha_final' => $fechaff, 'renovaciones' => $renovaciones]);
        return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tasks = DB::table('tblprestamos')->where('Folio', '=', $id)->update(['Existe' => 0]);
        return $tasks;
    }
}
