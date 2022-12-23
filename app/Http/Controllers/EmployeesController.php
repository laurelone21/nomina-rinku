<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Termwind\Components\Dd;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = DB::select('CALL readAllEmployee');
        return view('register.index', ['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'employeeFirstName' => 'required|min:3',
            'employeeLastName' => 'required|min:3',
            'employeeLastNameMother' => 'required|min:3',
            'employeePhone' => 'required|min:10',
            'employeeEmail' => 'required|min:15',
            'employeeRol' => 'required'
        ]);

        $data = array($request->employeeRol, 1, $request->employeeFirstName, $request->employeeLastName, $request->employeeLastNameMother,
                        $request->employeePhone, $request->employeeEmail);

        $insert = DB::select('CALL saveEmployee(?,?,?,?,?,?,?)', $data);
        return redirect()->route('employees')->with('success','Registro exitoso del empleado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function show($idEmployee)
    {
        //Dd($idEmployee);
        $data = array($idEmployee);
        $employee = DB::select('CALL readEmployee(?)', $data );

        return view('register.edit', ['employees' => $employee]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function edit(Employees $employees)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idEmployee)
    {
        $request->validate([
            'employeeFirstName' => 'required|min:3',
            'employeeLastName' => 'required|min:3',
            'employeeLastNameMother' => 'required|min:3',
            'employeePhone' => 'required|min:10',
            'employeeEmail' => 'required|min:15',
            'employeeRol' => 'required'
        ]);

        $data = array($idEmployee, $request->employeeRol, 1, $request->employeeFirstName, $request->employeeLastName, $request->employeeLastNameMother,
                        $request->employeePhone, $request->employeeEmail);

        $update = DB::select('CALL updateEmployee(?,?,?,?,?,?,?,?)', $data);
        return redirect()->route('employees')->with('success','Actualización exitosa del empleado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employees $employees)
    {
        //
    }
}
