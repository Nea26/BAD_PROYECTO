<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamo_miembros', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_ejemplar')->unsigned();
            $table->integer('id_multa')->unsigned()->nullable();
            $table->integer('monto_multa')->unsigned()->nullable();
            $table->integer('id_bibliotecario')->unsigned()->nullable();
            $table->bigInteger('id_user')->unsigned();
            $table->string('carnet_miembro');
            $table->date('fecha_prestamo')->nullable();
            $table->date('fecha_devolucion')->nullable();
            $table->boolean('devuelto')->default(false);
            $table->boolean('aprobado')->default(false);
            $table->string('usuario_autorizo')->nullable();
            $table->date('fecha_devuelto')->nullable();

            $table->foreign('id_ejemplar')->references('id')->on('libros');
            $table->foreign('id_user')->references('id')->on('users');
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
        Schema::dropIfExists('prestamo_miembros');
    }
};
