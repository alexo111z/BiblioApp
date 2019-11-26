<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reportes;
use App\Carrera;

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
        return [
            'pcarrera' => 1,
            'pclasificacion' =>20,
            'ptotales' => 100,
            'plista' =>[]
        ];
    }
}
