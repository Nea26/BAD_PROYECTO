<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddRegresarAReservaTriggerToPrestamoMiembrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER regresar_a_reserva
            BEFORE UPDATE ON prestamo_miembros
            FOR EACH ROW
            BEGIN
                DECLARE disponible INT;

                -- Obtener la cantidad disponible del libro
                SELECT cantidad_disponible INTO disponible
                FROM libros
                WHERE id = NEW.id_ejemplar;
                
                -- 
                IF (NEW.aprobado=0 AND OLD.aprobado=1) THEN
                    -- Actualizar la cantidad disponible
                    UPDATE libros
                    SET cantidad_disponible = cantidad_disponible + 1
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
        DB::unprepared('DROP TRIGGER IF EXISTS `regresar_a_reserva`');
    }
}