<?php

use App\Http\Controllers\EmployeesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**CREATE PROCEDURE `saveEmployee` (IN idRoles smallint, IN idSalary smallint, IN firstName varchar(60), 
								IN lastName varchar(60), IN lastNameMother varchar(60), IN phone int unsigned, 
                                IN email varchar(100))
BEGIN
	DECLARE id int;
    
	INSERT INTO employees (idRoles, idSalary, firstName, lastName, lastNameMother, phone, email) 
    VALUES (idRoles, idSalary, firstName, lastName, lastNameMother, phone, email);
    SET id = last_insert_id();
    
    SELECT id;
END */

Route::get('/employees', function () {
    return view('register.index');
})->name('employees');

Route::post('/employees',  [EmployeesController::class, 'save'])->name('employees');
