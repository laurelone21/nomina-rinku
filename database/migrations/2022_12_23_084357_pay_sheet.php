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
        $procedure = "CREATE PROCEDURE paySheet (IN idEmployee smallint, IN idMonthh smallint, IN numberDeliveriess smallint)
        BEGIN
            INSERT INTO paysheets (idEmployee, idMonth, hoursWorked, numberDeliveries, salary, deliveries, bonus, vales, isr9, isr3, perceptions, deductions, total)

            WITH EmployeeData_Temp( idEmployee, idMonth, week, numberDeliveries, salary, deliveries, bonus, vales, isr1, isr2, perceptions, isr9, isr3 )
            AS (
                SELECT t.*, (t.perceptions*t.isr1) isr9, IF(t.perceptions>10000, (t.perceptions*t.isr2), 0 ) isr3 FROM (
                    SELECT st.*, (st.salary+st.deliveries+st.bonus) perceptions FROM (
                        SELECT e.idEmployee, idMonthh idMonth, s.week, numberDeliveriess numberDeliveries, (s.salary*s.week) salary, (r.delivery*numberDeliveriess) deliveries, (r.bonus*s.week) bonus,
                            (( (s.salary*s.week) + (r.delivery*numberDeliveriess) + (r.bonus*s.week) )*s.vale) vales, s.isr1, s.isr2
                        FROM employees e
                            INNER JOIN roles r ON r.idRoles=e.idRoles
                            INNER JOIN salaries s ON s.idSalary=e.idSalary
                        WHERE e.idEmployee=idEmployeee)
                    st)
                t
            )

            SELECT idEmployee, idMonth, week, numberDeliveries, salary, deliveries, bonus, vales, isr9, isr3, perceptions, (isr9+isr3) deductions, (perceptions-isr9-isr3) total
            FROM EmployeeData_Temp;
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
        $procedure = "DROP PROCEDURE IF EXISTS paySheet";
        DB::unprepared($procedure);
    }
};
