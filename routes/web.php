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

Route::get('/employees', function () {
    return view('register.index');
})->name('employees');

Route::get('/employees',  [EmployeesController::class, 'index'])->name('employees');
Route::post('/employees',  [EmployeesController::class, 'store'])->name('employees');
Route::get('/employees/{idEmployee}', [EmployeesController::class, 'show'])->name('employee-edit');
Route::patch('/employees/{idEmployee}', [EmployeesController::class, 'update'])->name('employee-update');