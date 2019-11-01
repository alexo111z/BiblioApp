<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email', 50)->unique();
            $table->string('password');
            $table->string('payroll')->nullable();
            $table->string('career')->nullable();
            $table->string('position')->nullable();
            $table->string('control_number')->nullable();
            $table->enum('user_type', [
                'Administrador',
                'Colaborador',
                'Alumno',
                'Docente',
                'Administrativo',
            ]);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
