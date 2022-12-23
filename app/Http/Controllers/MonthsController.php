<?php

namespace App\Http\Controllers;

use App\Models\Months;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MonthsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $months = DB::select('CALL selectMonth');
        /*$employees = DB::select('CALL readEmployeePays');
        return view('pay.index', ['months' => $months, 'employees' => $employees]);*/
        return view('pay.index', ['months' => $months]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Months  $months
     * @return \Illuminate\Http\Response
     */
    public function show(Months $months)
    {
        $months = DB::select('CALL selectMonth');
        return view('pay.paysheet', ['months' => $months]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Months  $months
     * @return \Illuminate\Http\Response
     */
    public function edit(Months $months)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Months  $months
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Months $months)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Months  $months
     * @return \Illuminate\Http\Response
     */
    public function destroy(Months $months)
    {
        //
    }
}
