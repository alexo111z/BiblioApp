<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportesController extends Controller
{
    function show(){
        return view('reportes.reportes');
    }
}
