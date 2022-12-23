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
        $procedure = "CREATE PROCEDURE readEmployeePays(IN idMonthh smallint)
                    BEGIN
                    SELECT e.idEmployee, CONCAT(e.idEmployee,' - ', e.firstName,' ',e.lastName,' ',e.lastNameMother, ' - ',r.rol) employee
                    FROM employees e
                        INNER JOIN roles r ON r.idRoles=e.idRoles
                    WHERE e.idEmployee<>ALL(SELECT idEmployee FROM tempPays WHERE idMonth=idMonthh);
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
        $procedure = "DROP PROCEDURE IF EXISTS readEmployeePays";
        DB::unprepared($procedure);
    }
};
