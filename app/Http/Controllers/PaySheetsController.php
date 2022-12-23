<?php

namespace App\Http\Controllers;

use App\Models\PaySheets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaySheetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $employees = DB::select('CALL readTempPays(?)',array($request->valueMonth));
        foreach ($employees as $employee) {
            $data = array($employee->idEmployee, $request->valueMonth, $employee->numberDeliveries);

            // IN idEmployee smallint, IN idMonthh smallint, IN numberDeliveriess
            $result = DB::select('CALL paySheet(?,?,?)',$data);
            var_dump($result);
        }
        return redirect()->route('pays')->with('success','Calculo de nómina exitoso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaySheets  $paySheets
     * @return \Illuminate\Http\Response
     */
    public function show($idMonth)
    {
        return $paySheets = DB::select('CALL readPaySheets(?)',array($idMonth));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaySheets  $paySheets
     * @return \Illuminate\Http\Response
     */
    public function edit(PaySheets $paySheets)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaySheets  $paySheets
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaySheets $paySheets)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaySheets  $paySheets
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaySheets $paySheets)
    {
        //
    }
}
