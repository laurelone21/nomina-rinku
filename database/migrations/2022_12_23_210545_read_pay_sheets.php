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
        $procedure = "CREATE PROCEDURE readPaySheets (IN idMonthh smallint)
                    BEGIN
                    SELECT '' idEmployee, '' employee, '' rol,
                                format(SUM(p.hoursWorked),2) hoursWorked, format(SUM(p.deliveries),2) deliveries, format(SUM(p.bonus),2) bonus,
                                format(SUM(p.deductions),2) deductions, format(SUM(p.vales),2) vales, format(SUM(p.perceptions),2) perceptions,
                                format(SUM(total),2) total
                        FROM paysheets p
                        INNER JOIN employees e ON e.idEmployee=p.idEmployee
                        INNER JOIN roles r ON r.idRoles=e.idRoles
                        WHERE p.idMonth=idMonthh
                        GROUP BY p.idMonth

                        UNION ALL

                        SELECT '' idEmployee, '' employee, '' rol, '' hoursWorked, '' deliveries, '' bonus, '' deductions, ''vales,
                                ''perceptions, ''total

                        UNION ALL

                        SELECT e.idEmployee, CONCAT(e.firstName,' ',e.lastName,' ',e.lastNameMother) employee, r.rol,
                                format(p.hoursWorked,2) hoursWorked, format(p.deliveries,2) deliveries, format(p.bonus,2) bonus,
                                format(p.deductions,2) deductions, format(p.vales,2) vales, format(p.perceptions,2) perceptions,
                                format(p.total,2) total
                        FROM paysheets p
                        INNER JOIN employees e ON e.idEmployee=p.idEmployee
                        INNER JOIN roles r ON r.idRoles=e.idRoles
                        WHERE p.idMonth=idMonthh;
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
        $procedure = "DROP PROCEDURE IF EXISTS readPaySheets";
        DB::unprepared($procedure);
    }
};
