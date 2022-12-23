<?php

namespace App\Http\Controllers;

use App\Models\TempPays;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TempPaysController extends Controller
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
        $request -> validate([
            'payMonth' => 'required',
            'payEmployee' => 'required',
            'payDeliveries' => 'required'
        ]);
        //idTempPay, idMonth, idEmployee, numberDeliveries
        $data = array($request->payMonth, $request->payEmployee, $request->payDeliveries);

        $insert = DB::select('CALL saveTempPays(?,?,?)', $data);
        return $tempEmployees = DB::select('CALL readTempPays(?)',array($request->payMonth));

        //return redirect()->route('pays')->with('sucess','Registro exitoso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TempPays  $tempPays
     * @return \Illuminate\Http\Response
     */
    public function show($idMonth)
    {
        return $tempEmployees = DB::select('CALL readTempPays(?)',array($idMonth));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TempPays  $tempPays
     * @return \Illuminate\Http\Response
     */
    public function edit(TempPays $tempPays)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TempPays  $tempPays
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TempPays $tempPays)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TempPays  $tempPays
     * @return \Illuminate\Http\Response
     */
    public function destroy(TempPays $tempPays)
    {
        //
    }
}
