<?php

namespace App\Http\Controllers;

use App\IDType;
use Illuminate\Http\Request;
use \DB;

class IDTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idTypes = DB::table('id_types')->select('id','name')->get();
        return response()->json(['success'=>true, 'data'=>$idTypes->all()],200);
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
     * @param  \App\IDType  $iDType
     * @return \Illuminate\Http\Response
     */
    public function show(IDType $iDType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IDType  $iDType
     * @return \Illuminate\Http\Response
     */
    public function edit(IDType $iDType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IDType  $iDType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IDType $iDType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IDType  $iDType
     * @return \Illuminate\Http\Response
     */
    public function destroy(IDType $iDType)
    {
        //
    }
}
