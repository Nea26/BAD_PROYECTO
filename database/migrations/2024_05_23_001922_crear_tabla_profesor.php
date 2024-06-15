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
        Schema::create('profesor', function (Blueprint $table) {
            $table->char('CARNET_PROFESOR', 50)->primary();
        $table->unsignedBigInteger('user_id'); 
        $table->char('NOMBRE', 100);
        $table->char('APELLIDO', 100);
        $table->char('DUI', 25);
        $table->char('TELEFONO', 20);
        $table->char('CORREO', 100);

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
        Schema::dropIfExists('profesor');
    }
};
