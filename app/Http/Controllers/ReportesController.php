<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Carrera;
use Barryvdh\DomPDF\Facade as PDF;

class ReportesController extends Controller
{

    public function getCarreras()
    {
        $carreras = Carrera::orderBy('Clave')->where('Existe', 1)->get();
        return $carreras;
    }

    public function getReportes(Request $request)
    {
        $carrera = $request -> post('carrera');
        $clasificacion = $request -> post('clasificacion');
        $inicio = $request -> post('inicio');
        $fin = $request -> post("fin");

        $lprestamos = DB::select("SELECT COUNT(NoControl) AS Prestamos, NoControl, Nombre, Apellidos, Carrera FROM `prestamosporcarrera` WHERE IDCarrera = {$carrera} AND Inicio>='{$inicio}' AND Inicio<='{$fin}' GROUP By NoControl LIMIT 5");
        $totales = DB::table('tblprestamos')->select(DB::raw("COUNT(tblprestamos.Folio) as Prestamos"))->get();
        $totalesCarrera = DB::select("SELECT COUNT(NoControl) AS Prestamos FROM `prestamosporcarrera` WHERE IDCarrera = {$carrera} AND Inicio>='{$inicio}' AND Inicio<='{$fin}'");
        $totalesclasificacion = DB::select("SELECT COUNT(tbldetprestamos.Codigo) AS Prestamos FROM tbldetprestamos, tblejemplares, tbllibros WHERE tbldetprestamos.Codigo = tblejemplares.Codigo AND tblejemplares.ISBN = tbllibros.ISBN AND tbllibros.dewey = {$clasificacion}");
        return [
            'pcarrera' => $totalesCarrera,
            'pclasificacion' =>$totalesclasificacion,
            'ptotales' => $totales,
            'plista' =>$lprestamos
        ];
    }
    public function imprimirReporte(Request $request)
    {
        $carrera = $request->get('carrera');
        $inicio = $request->get('inicio');
        $fin = $request->get("fin");
        $lprestamos = DB::select("SELECT COUNT(NoControl) AS Prestamos, NoControl, Nombre, Apellidos, Carrera FROM `prestamosporcarrera` WHERE IDCarrera = {$carrera} AND Inicio>='{$inicio}' AND Inicio<='{$fin}' GROUP By NoControl");
        $lista = $lprestamos;
        return view('pdf.reporteprestamos',compact('lista'));
    }

    public function getRegistros(Request $request)
    {
        $carrera = $request -> post('carrera');
        $inicio = $request -> post('inicio');
        $fin = $request -> post("fin");

        $titulos = DB::select("SELECT COUNT(tbllibros.ISBN) AS titulos FROM tbllibros WHERE FechaRegistro >='{$inicio}' AND FechaRegistro <= '{$fin}' AND IdCarrera = {$carrera}");
        $ejemplares = DB::select("SELECT SUM(tbllibros.Ejemplares) AS ejemplares FROM tbllibros WHERE FechaRegistro >='{$inicio}' AND FechaRegistro <= '{$fin}' AND IdCarrera = {$carrera}");
        $libros = DB::select("SELECT tbllibros.Titulo, tblautores.Nombre AS Autor, tbleditoriales.Nombre AS Editorial, tbldewey.Nombre AS Dewey, tbllibros.Edicion, tbllibros.Ejemplares, tbllibros.FechaRegistro AS Registro FROM tbllibros, tblautores, tbleditoriales, tbldewey WHERE tbllibros.IdAutor = tblautores.IdAutor AND tbllibros.IdEditorial = tbleditoriales.Id AND tbllibros.dewey = tbldewey.Id AND IdCarrera = {$carrera} AND FechaRegistro >='{$inicio}' AND FechaRegistro <= '{$fin}' ORDER BY tbllibros.dewey");

        return [
            'ttitulos'=>$titulos,
            'tejemplares'=>$ejemplares,
            'plista'=>$libros
        ];
    }
    public function imprimirReporteRegistros(Request $request)
    {
        $carrera = $request -> get('carrerat');
        $inicio = $request -> get('iniciot');
        $fin = $request -> get("fint");

        $libros = DB::select("SELECT tbllibros.Titulo, tblautores.Nombre AS Autor, tbleditoriales.Nombre AS Editorial, tbldewey.Nombre AS Dewey, tbllibros.Edicion, tbllibros.Ejemplares, tbllibros.FechaRegistro AS Registro FROM tbllibros, tblautores, tbleditoriales, tbldewey WHERE tbllibros.IdAutor = tblautores.IdAutor AND tbllibros.IdEditorial = tbleditoriales.Id AND tbllibros.dewey = tbldewey.Id AND IdCarrera = {$carrera} AND FechaRegistro >='{$inicio}' AND FechaRegistro <= '{$fin}' ORDER BY tbllibros.dewey");
        $lista = $libros;
        return view('pdf.reporteregistros',compact('lista'));
    }
    public function getCatalogo(Request $request)
    {
        $libros = DB::select("SELECT tbllibros.Titulo, tblautores.Nombre AS Autor, tbleditoriales.Nombre AS Editorial, tblcarreras.Nombre AS Carrera, tbldewey.Nombre AS Dewey, tbllibros.Edicion, tbllibros.Ejemplares, tbllibros.FechaRegistro AS Registro FROM tbllibros, tblautores, tbleditoriales, tbldewey, tblcarreras WHERE tbllibros.IdAutor = tblautores.IdAutor AND tbllibros.IdEditorial = tbleditoriales.Id AND tbllibros.dewey = tbldewey.Id AND tbllibros.IdCarrera = tblcarreras.Clave");
        return $libros;
    }
    public function imprimirCatalogo(Request $request)
    {
        $libros = DB::select("SELECT tbllibros.Titulo, tblautores.Nombre AS Autor, tbleditoriales.Nombre AS Editorial, tblcarreras.Nombre AS Carrera, tbldewey.Nombre AS Dewey, tbllibros.Edicion, tbllibros.Ejemplares, tbllibros.FechaRegistro AS Registro FROM tbllibros, tblautores, tbleditoriales, tbldewey, tblcarreras WHERE tbllibros.IdAutor = tblautores.IdAutor AND tbllibros.IdEditorial = tbleditoriales.Id AND tbllibros.dewey = tbldewey.Id AND tbllibros.IdCarrera = tblcarreras.Clave");
        $lista = $libros;
        return view('pdf.reportecatalogo',compact('lista'));
    }

}
