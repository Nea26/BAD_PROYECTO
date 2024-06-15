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
        Schema::create('miembro', function (Blueprint $table) {
        $table->char('CARNET_MIEMBRO', 50)->primary();
        $table->unsignedBigInteger('user_id'); 
        $table->char('NOMBRE', 100);
        $table->char('APELLIDO', 100);
        $table->date('FECHA_NACIMIENTO');
        $table->char('DOC_IDENTIFICACION', 50);
        $table->char('NUM_DOC_IDENTIFICACION', 100);
        $table->char('TELEFONO', 20);
        $table->char('CORREO', 100);
        $table->date('FECHA_MEMBRESIA');
        $table->date('VIGENCIA');
        $table->integer('COSTO_CARNET');
        $table->boolean('PENALIZADO');

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('miembro');
    }
};
