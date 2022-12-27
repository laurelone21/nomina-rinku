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
        $procedure = "CREATE PROCEDURE readTempPays (IN idMonthh smallint)
                    BEGIN
                        SEELECT t.idTempPay, m.month, e.idEmployee, CONCAT(e.firstName,' ',e.lastName,' ',e.lastNameMother, ' - ', r.rol) employee,
                                t.numberDeliveries
                        FROM tempPays t
                        INNER JOIN employees e ON e.idEmployee=t.idEmployee
                        INNER JOIN roles r ON r.idRoles=e.idRoles
                        INNER JOIN months m ON m.idMonth=t.idMonth
                        WHERE t.idMonth=idMonthh;
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
        $procedure = "DROP PROCEDURE IF EXISTS readTempPays";
        DB::unprepared($procedure);
    }
};
