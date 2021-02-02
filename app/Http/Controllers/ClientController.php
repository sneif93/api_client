<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use \DB;
use \Validator;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = DB::table('clients')
            ->select('clients.*', 'clients.e-mail as email','id_types.name as name_id_types','cities.name as name_city','departments.name as name_department')
            ->join('id_types', 'clients.id_type', '=', 'id_types.id' )
            ->join('cities', 'clients.id_city','=','cities.id')
            ->join('departments', 'cities.id_department','=','departments.id')
            ->get();
        return response()->json(['success'=>true, 'data'=>$clients->all()],200);
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
        $validator = Validator::make($request->all(), ['first_name'=>'required','first_surname'=>'required','last_surname'=>'required','id_type'=>'required','document'=>'required','address'=>'required','phone'=>'required','email'=>'required|email','employment'=>'required','id_city'=>'required']);
        if($validator->fails()){
            return response()->json(['success'=>false, 'message'=>$validator->errors() ],200);
        }else{
            $now = date('Y-m-d H:i:s');
            $client = DB::table('clients')
                ->insert([
                    'first_name'=>$request->first_name,
                    'last_name'=>isset($request->last_name) == true ? $request->last_name : "",
                    'first_surname'=>$request->first_surname,
                    'last_surname'=>$request->last_surname,
                    'id_type'=>$request->id_type,
                    'document'=>$request->document,
                    'address'=>$request->address,
                    'phone'=>$request->phone,
                    'e-mail'=>$request->email,
                    'employment'=>$request->employment,
                    'id_city'=>$request->id_city,
                    'created_at'=>$now
                    ]);
            if($client){
                return response()->json(['success'=>true, 'message'=>'client stored successfully'],200);
            }else{
                return response()->json(['success'=>false,'message'=>'your request could not be processed'],200);
            }
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    public function showById(Request $request)
    {
        $validator = Validator::make($request->all(), ['id'=>'required']);
        if($validator->fails()){
            return response()->json(['success'=>false, 'message'=>$validator->errors() ],200);
        }else{
            $client = DB::table('clients')
            ->select('clients.*','clients.e-mail as email', 'id_types.name as name_id_types','cities.name as name_city', 'departments.id as id_department','departments.name as name_department')
            ->join('id_types', 'clients.id_type', '=', 'id_types.id' )
            ->join('cities', 'clients.id_city','=','cities.id')
            ->join('departments', 'cities.id_department','=','departments.id')
            ->where(['clients.id'=>$request->id])
            ->get();
            if(count($client)>0){
                $client = $client->all();
                return response()->json(['success'=>true, 'data'=>$client[0]],200);
            }else{
                return response()->json(['success'=>false,'message'=>'Not found'],200);
            }
            
        }
        
    }

    public function deleteById(Request $request)
    {
        $validator = Validator::make($request->all(), ['id'=>'required']);
        if($validator->fails()){
            return response()->json(['success'=>false, 'message'=>$validator->errors() ],200);
        }else{
            $client = DB::table('clients')
            ->where(['clients.id'=>$request->id])
            ->delete();
            if($client){
                return response()->json(['success'=>true, 'message'=>'client successfully removed'],200);
            }else{
                return response()->json(['success'=>false,'message'=>'Not found'],200);
            }
            
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), ['id'=>'required','first_name'=>'required','first_surname'=>'required','last_surname'=>'required','id_type'=>'required','document'=>'required','address'=>'required','phone'=>'required','email'=>'required|email','employment'=>'required','id_city'=>'required']);
        if($validator->fails()){
            return response()->json(['success'=>false, 'message'=>$validator->errors() ],200);
        }else{
            $now = date('Y-m-d H:i:s');
            $client = DB::table('clients')
                ->where('id',$request->id)
                ->update([
                    'first_name'=>$request->first_name,
                    'last_name'=>isset($request->last_name) == true ? $request->last_name : "",
                    'first_surname'=>$request->first_surname,
                    'last_surname'=>$request->last_surname,
                    'id_type'=>$request->id_type,
                    'document'=>$request->document,
                    'address'=>$request->address,
                    'phone'=>$request->phone,
                    'e-mail'=>$request->email,
                    'employment'=>$request->employment,
                    'id_city'=>$request->id_city,
                    'updated_at'=>$now
                    ]);
                
            if($client){
                return response()->json(['success'=>true, 'message'=>'client updated successfully'],200);
            }else{
                return response()->json(['success'=>false,'message'=>'your request could not be processed'],200);
            }
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
