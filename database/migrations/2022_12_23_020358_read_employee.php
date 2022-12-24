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
        $procedure = "CREATE PROCEDURE readEmployee(IN idEmployeee smallint)
                    BEGIN
                        SELECT idEmployee, idRoles, idSalary, firstName, lastName, lastNameMother, phone, email
                        FROM employees
                        WHERE idEmployee=idEmployeee;
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
        $procedure = "DROP PROCEDURE IF EXISTS readEmployee";
        DB::unprepared($procedure);
    }
};
