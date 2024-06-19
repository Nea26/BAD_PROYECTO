<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER bi_prestamo_miembro
        BEFORE INSERT ON prestamo_miembros
        FOR EACH ROW
        BEGIN
            DECLARE disponible INT;

            SELECT cantidad_disponible INTO disponible
            FROM libros
            WHERE id = NEW.id_ejemplar;
            
            IF (disponible > 0 and NEW.aprobado=1) THEN
                UPDATE libros
                SET cantidad_disponible = cantidad_disponible - 1
                WHERE id = NEW.id_ejemplar;
            END IF;
        END
    ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS `bi_prestamo_miembro`');
    }
};
