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
        CREATE TRIGGER check_fecha_nacimiento_before_insert
        BEFORE INSERT ON miembro
        FOR EACH ROW
        BEGIN
            IF TIMESTAMPDIFF(YEAR, NEW.fecha_nacimiento, CURDATE()) < 12 THEN
                SIGNAL SQLSTATE \'45000\' SET MESSAGE_TEXT = \'La fecha de nacimiento no puede indicar una edad menor a 12 años.\';
            END IF;
        END;
    ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS `check_fecha_nacimiento_before_insert`');
    }
};
