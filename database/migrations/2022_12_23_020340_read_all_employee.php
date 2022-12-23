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
        $procedure = "CREATE PROCEDURE readAllEmployee ()
                    BEGIN
                        SELECT e.idEmployee, r.rol, e.idSalary, e.firstName, e.lastName, e.lastNameMother, e.phone, e.email
                        FROM employees e
                        INNER JOIN roles r ON r.idRoles=e.idRoles;
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
        $procedure = "DROP PROCEDURE IF EXISTS readAllEmployee";
        DB::unprepared($procedure);
    }
};
