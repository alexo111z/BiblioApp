<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Reportes;
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
}
