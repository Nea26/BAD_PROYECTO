<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateVerificarPrestamosTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER verificar_prestamos
            BEFORE INSERT ON prestamo_miembros
            FOR EACH ROW
            BEGIN
                DECLARE num_prestamos INT;
                
                SELECT COUNT(*) INTO num_prestamos
                FROM prestamo_miembros
                WHERE carnet_miembro = NEW.carnet_miembro
                AND devuelto = 0;
                
                IF num_prestamos >= 5 THEN
                    SIGNAL SQLSTATE \'45000\'
                    SET MESSAGE_TEXT = \'El miembro ya tiene 5 préstamos no devueltos\';
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
        DB::unprepared('DROP TRIGGER IF EXISTS `verificar_prestamos`');
    }
}