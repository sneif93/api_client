<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;
use \DB;
use \Validator;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = DB::table('cities')->select('id','id_department','name')->get();
        return response()->json(['success'=>true, 'data'=>$cities->all()],200);
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
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function showByDepartment(Request $request)
    {
        $validator = Validator::make($request->all(), ['id_department'=>'required']);
        if($validator->fails()){
            return response()->json(['success'=>false, 'message'=>$validator->errors() ,'data'=>null],200);
        }else{
            $cities = DB::table('cities')->select('id','id_department','name')->where(['id_department'=>$request->id_department])->get();
            return response()->json(['success'=>true, 'data'=>$cities->all()],200);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        //
    }
}
