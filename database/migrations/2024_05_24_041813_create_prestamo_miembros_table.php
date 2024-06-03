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
            $table->integer('id_ejemplar')->unsigned();
            $table->integer('id_multa')->unsigned()->nullable();
            $table->integer('id_bibliotecario')->unsigned()->nullable();
            $table->string('carnet_miembro');
            $table->date('fecha_prestamo');
            $table->date('fecha_devolucion');
            $table->boolean('devuelto')->default(false);
            $table->string('usuario_autorizo')->nullable();
            $table->date('fecha_devuelto')->nullable();

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
