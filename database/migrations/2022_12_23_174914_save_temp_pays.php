<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        $procedure = "CREATE PROCEDURE saveTempPays (IN idMonth smallint, IN idEmployee smallint, IN numberDeliveries smallint)
                    BEGIN
                        DECLARE id int;
                        INSERT INTO tempPays(idMonth, idEmployee, numberDeliveries) VALUES (idMonth, idEmployee, numberDeliveries);
                        SET id = last_insert_id();
                        SELECT id;
                    END";
        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $procedure = "DROP PROCEDURE IF EXISTS saveTempPays";
        DB::unprepared($procedure);
    }
};
