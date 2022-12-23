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
            CREATE PROCEDURE saveEmployee (IN idRoles smallint, IN idSalary smallint, IN firstName varchar(60),
                                        IN lastName varchar(60), IN lastNameMother varchar(60), IN phone varchar(10),
                                        IN email varchar(100))
            BEGIN
                DECLARE id int;
                INSERT INTO employees (idRoles, idSalary, firstName, lastName, lastNameMother, phone, email)
                VALUES (idRoles, idSalary, firstName, lastName, lastNameMother, phone, email);
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
        $procedure = "DROP PROCEDURE IF EXITS saveEmployee";
        DB::unprepared($procedure);
    }
};
