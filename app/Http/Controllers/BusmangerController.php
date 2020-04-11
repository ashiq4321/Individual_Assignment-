<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\busmanger;
use App\User;
use Illuminate\Http\Request;

class BusmangerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('busmanager.index');
    }
    public function busCounterlist()
    {
          $user = DB::table('buscounters')->get();
        return view('busmanager.viewBusCounter', ['users'=>$user]);
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
     * @param  \App\busmanger  $busmanger
     * @return \Illuminate\Http\Response
     */
    public function show(busmanger $busmanger)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\busmanger  $busmanger
     * @return \Illuminate\Http\Response
     */
    public function edit(busmanger $busmanger)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\busmanger  $busmanger
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, busmanger $busmanger)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\busmanger  $busmanger
     * @return \Illuminate\Http\Response
     */
    public function destroy(busmanger $busmanger)
    {
        //
    }
}
