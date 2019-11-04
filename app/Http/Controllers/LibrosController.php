<?php

namespace App\Http\Controllers;

use App\libros;
use Illuminate\Http\Request;

class LibrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('libros.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('libros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\libros  $libros
     * @return \Illuminate\Http\Response
     */
    public function show(libros $libros)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\libros  $libros
     * @return \Illuminate\Http\Response
     */
    public function edit(libros $libros)
    {
        return view('libros.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\libros  $libros
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, libros $libros)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\libros  $libros
     * @return \Illuminate\Http\Response
     */
    public function destroy(libros $libros)
    {
        //
    }
}
