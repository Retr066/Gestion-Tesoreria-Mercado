<?php

namespace App\Http\Controllers;

use App\Models\ListReportes;
use Illuminate\Http\Request;

class ListReportesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.reportes');
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
     * @param  \App\Models\ListReportes  $listReportes
     * @return \Illuminate\Http\Response
     */
    public function show(ListReportes $listReportes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ListReportes  $listReportes
     * @return \Illuminate\Http\Response
     */
    public function edit(ListReportes $listReportes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ListReportes  $listReportes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ListReportes $listReportes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ListReportes  $listReportes
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListReportes $listReportes)
    {
        //
    }
}
