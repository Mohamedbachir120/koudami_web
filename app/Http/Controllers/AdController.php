<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use DB;
class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete_selected(Request $request)
    {

        if(Auth::user()->type_compte=="admin"){
            $ids=$request->ids;

            Ad::whereIn('id',$ids)->delete(); 
    
            return  response()->json(['success'=>"Elements Deleted successfully."]);
      
        }
     else{
            return redirect('/');
        }
    }


    public function index()
    {

        if(Auth::user()->type_compte=="admin")
        {

            $ads=Ad::paginate(10);
            $ads->append(['sort' => 'created_at','desc']);

            return view('show_ads',['ads'=>$ads]);

        }
        else
        {
            return redirect('/home');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if(Auth::user()->type_compte=="admin")
        {
        return view('new_ads');
        }
        else
        {
        return redirect('/home');
         }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->type_compte=="admin")
        {
      
        $ele=new Ad();
       
        $file =$request->file('contenu');
        $fileName = $file->getClientOriginalName(). '-' . date('Y-m-d-H:i:s') . '.'.$file->getClientOriginalExtension() ;

        Storage::disk('s3')->put('/ads/'.$fileName, fopen($request->file('contenu'), 'r+'), 'public');

        $ele->contenu = 'ads/'.$fileName;

        if($request['link']!=NULL)
        {
        $ele->link=$request['link'] ;

       }
        $ele->mode=$request['mode'];
        $ele->debut=$request['debut'];
        $ele->fin=$request['fin'];
        $ele->type=$request['type'];
        $ele->propr=$request['propr'];
        $ele->height=$request['height'];
        $ele->width=$request['width'];
    
        $ele->save();

        return redirect('/show_ads')->with('msg','ajouté avec succée');

        }
        else  
        {
           return  redirect('/show_ads');
        }


}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function show(Ad $ad)
    {
        //
    }
    public function masquer($id)
    {
        if(Auth::user()->type_compte=="admin"){
        $ad=Ad::findOrFail($id);
        $ad->state="invisible";
        $ad->save();
        return redirect('/show_ads');
        }
        else {
            return redirect('/home');
        }
    }
    public function demasquer($id)
    {
        if(Auth::user()->type_compte=="admin"){
            $ad=Ad::findOrFail($id);
            $ad->state="visible";
            $ad->save();
            return redirect('/show_ads');
            }
            else {
                return redirect('/home');
            }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if(Auth::user()->type_compte=="admin"){
            $ele=Ad::findOrFail($id);
            return view('update_ads',['id'=>$id,'ele'=>$ele]);

        }
        else
        {
            return redirect('/home');
        }
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if(Auth::user()->type_compte=="admin")
        {
        
        $ele=Ad::findOrFail($id);
        $ele->propr=$request['propr'];
        $ele->height=$request['height'];
        $ele->width=$request['width'];
        $ele->mode=$request['mode'];
        $ele->debut=$request['debut'];
        $ele->fin=$request['fin'];
  

        if($request['contenu']!=NULL) {
            if (Storage::disk('s3')->exists($ele->contenu)) {
             
                Storage::disk('s3')->delete($ele->contenu);

                // ...
            }
            $file =$request->file('contenu');
            $fileName = $file->getClientOriginalName(). '-' . date('Y-m-d-H:i:s') . '.'.$file->getClientOriginalExtension() ;

            Storage::disk('s3')->put('/ads/'.$fileName, fopen($request->file('contenu'), 'r+'), 'public');

            $ele->contenu='ads/'.$fileName;

        }
        if($request['link']!=NULL) {
            $ele->link=$request['link'];
        }

        $ele->type=$request['type'];
        $ele->save();

        return redirect('/show_ads');
     }
     else
     {
         return redirect('/home');
     }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if(Auth::user()->type_compte=="admin")
        {
      
        $ad=Ad::findOrFail($id);

        if (Storage::disk('s3')->exists($ad->contenu))
         {
             
            Storage::disk('s3')->delete($ad->contenu);

            // ...
            }


           $ad->delete();
        return redirect('/show_ads');


    }

    else{
    return redirect('/home');   
        }

}



}
