<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('libros', function (Blueprint $table) {
            $table->unsignedBigInteger('id_autor');
            $table->unsignedBigInteger('id_categoria');
            $table->unsignedBigInteger('id_idioma');

            $table->foreign('id_autor')->references('id')->on('autor');
            $table->foreign('id_categoria')->references('id')->on('categoria');
            $table->foreign('id_idioma')->references('id')->on('idiomas');
        });
    }

    public function down()
    {
        Schema::table('libros', function (Blueprint $table) {
            $table->dropForeign(['id_autor']);
            $table->dropForeign(['id_categoria']);
            $table->dropForeign(['id_idioma']);

            $table->dropColumn(['id_autor', 'id_categoria', 'id_idioma']);
        });
    }
};