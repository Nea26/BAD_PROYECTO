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
        Schema::create('bibliotecario', function (Blueprint $table) {
            $table->id('ID_BIBLIOTECARIO');
            $table->unsignedBigInteger('user_id'); 
            $table->integer('ID_MULTA')->nullable();
            $table->char('NOMBRE', 100);
            $table->char('APELLIDO', 100);
            $table->char('USER_NAME', 50);
            $table->char('PASSWORD', 100);
    
            
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
        Schema::dropIfExists('bibliotecario');
    }
};
