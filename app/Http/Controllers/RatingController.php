<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
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
    public function set_rate($id,Request $request){
        $user2=User::findOrFail($id);
        if($user2->is_rated_by(Auth::user()->id)){

            Rating::where('rater_id',Auth::user()->id)
            ->where('rated_id',$user2->id)
            ->update(['value'=>intval($request['value'])]);
 
            $avg= Rating::where('rated_id',$user2->id)->avg('value');
        }

         else{
            

        $rating=new Rating();
        $rating->rater_id=intval(Auth::user()->id);
        $rating->rated_id=$user2->id;
        $rating->value=intval($request['value']);
        $rating->save();

        $avg= Rating::where('rated_id',$user2->id)->avg('value');


         }
        return response()->json(['mark'=>$request['value'],'avg'=>$avg]);

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
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function show(Rating $rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function edit(Rating $rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rating $rating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rating $rating)
    {
        //
    }
}
