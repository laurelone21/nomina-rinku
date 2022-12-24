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
        $procedure = "
            CREATE PROCEDURE updateEmployee(IN idEmployeee smallint, IN idRoles smallint, IN idSalary smallint, IN firstName varchar(60),
                                        IN lastName varchar(60), IN lastNameMother varchar(60), IN phone varchar(10),
                                        IN email varchar(100))
            BEGIN
                UPDATE employees SET idRoles=idRoles, idSalary=idSalary, firstName=firstName, lastName=lastName, lastNameMother=lastNameMother, 
                        phone=phone, email=email where idEmployee=idEmployeee;
                SELECT idEmployeee;
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
        $procedure = "DROP PROCEDURE IF EXISTS updateEmployee";
        DB::unprepared($procedure);
    }
};
