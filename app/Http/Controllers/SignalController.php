<?php

namespace App\Http\Controllers;

use App\Models\Signal;
use Illuminate\Http\Request;
use App\Models\User;

class SignalController extends Controller
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
        //
        

        

            $user=User::findOrFail($request['id']);
            $signal=new Signal();
            $signal->envoyer_par=$request['envoyer_par'];
            $signal->rapport=$request['rapport'];
            $signal->motif=$request['motif'];
            $user->signals()->save($signal);


        
        
        return response()->json(['success'=>"votre rapport a été bien reçu un administrateur va le traiter"]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Signal  $signal
     * @return \Illuminate\Http\Response
     */
    public function show(Signal $signal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Signal  $signal
     * @return \Illuminate\Http\Response
     */
    public function edit(Signal $signal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Signal  $signal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Signal $signal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Signal  $signal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Signal $signal)
    {
        //
    }
}
