<?php

namespace App\Http\Controllers;

use App\Models\OperationAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class OperationAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->type_compte== "admin"){
            $operations=OperationAdmin::orderBy('created_at','DESC')->paginate(8);
            
            return view('show_operations',['operations'=>$operations]);
          }
        //
    }
    public function find_operation(Request $request)
    {
        $operations=DB::table('operation_admins')->
        join('users','operation_admins.admin_id','=','users.id')
        ->select('operation_admins.id',
        'operation_admins.object',
        'operation_admins.created_at',
        'users.name',
        'users.prenom')
        ->where('operation_admins.object','like','%'.$request['search'].'%')
        ->take(100)
        ->get();
        
        
        
        
        $operations = json_decode($operations, true);

        return response()->json($operations);

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
     * @param  \App\Models\OperationAdmin  $operationAdmin
     * @return \Illuminate\Http\Response
     */
    public function show(OperationAdmin $operationAdmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OperationAdmin  $operationAdmin
     * @return \Illuminate\Http\Response
     */
    public function edit(OperationAdmin $operationAdmin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OperationAdmin  $operationAdmin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OperationAdmin $operationAdmin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OperationAdmin  $operationAdmin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
            if(Auth::user()->type_compte=="admin"){

                OperationAdmin::findOrFail($id)->delete();
                return redirect('/show_operations');
             }
       
             return redirect('/home');


    }
}
