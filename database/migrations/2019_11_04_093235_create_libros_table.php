<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('ISBN');
            $table->string('Titulo', 100);
            $table->bigInteger('IdAutor');
            $table->bigInteger('IdEditorial');
            $table->bigInteger('IdCarrera');
            $table->tinyInteger('deway');
            $table->tinyInteger('Edicion');
            $table->year('Year');
            $table->tinyInteger('Volumen');
            $table->tinyInteger('Ejemplares');
            $table->tinyInteger('EjemDisp');
            $table->string('Imagen');
            $table->date('FechaRegistro');
            $table->boolean('Existe');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('libros');
    }
}
