<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\MonthsController;
use App\Http\Controllers\PaySheetsController;
use App\Http\Controllers\TempPaysController;
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
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/employees', function () {
    return view('register.index');
})->name('employees');

Route::get('/employees',  [EmployeesController::class, 'index'])->name('employees');
Route::post('/employees',  [EmployeesController::class, 'store'])->name('employees');
Route::get('/employees/{idEmployee}', [EmployeesController::class, 'show'])->name('employee-edit');
Route::patch('/employees/{idEmployee}', [EmployeesController::class, 'update'])->name('employee-update');

Route::get('/pays', function () {
    return view('pay.index');
})->name('pays');
Route::get('/pays',  [PaySheetsController::class, 'index'])->name('pays');
Route::post('/pays',  [PaySheetsController::class, 'store'])->name('pays');
Route::post('/pays/{idPay}', [PaySheetsController::class, 'show']);
Route::patch('/pays/{idPay}', [PaySheetsController::class, 'update'])->name('pay-update');

Route::get('/pays',  [MonthsController::class, 'index'])->name('months');
Route::post('/employeeMonth/{idMonth}', [EmployeeController::class, 'show']);
//Route::resource('/employeeMonth', EmployeeController::class);


Route::get('/paysheet', function () {
    return view('pay.paysheet');
})->name('paysheet');
Route::get('/otropay', function () {
    return view('pay.paysheet');
})->name('otropay');

Route::get('/paysheet',  [MonthsController::class, 'show']);
Route::post('/paysheet/{idMonth}',  [PaySheetsController::class, 'show']);

Route::post('/tempPays', [TempPaysController::class, 'store']);
Route::post('/tempPays/{idMonth}', [TempPaysController::class, 'show']);