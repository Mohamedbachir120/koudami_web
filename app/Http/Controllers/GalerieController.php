<?php

namespace App\Http\Controllers;

use App\Models\Galerie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class GalerieController extends Controller
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
        if(Auth::user()->lang=="fr" && Auth::user()->type_compte=="simple" && Auth::user()->state=="actif"){
            
            return view('create_galerie');
        }
        else if( Auth::user()->type_compte=="simple" && Auth::user()->state=="actif" && Auth::user()->lang=="ar")
        {
            return view('ar.ar_create_galerie');
        }
        else{
            return ('/');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        if($request['pic1']!=NULL){

            $this->validate($request, [
                'pic1' => 'image|mimes:jpeg,png,jpg,gif,svg',
              ]);
        
        }
        else if($request['pic2']!=NULL){

            $this->validate($request, [
                'pic2' => 'image|mimes:jpeg,png,jpg,gif,svg',
              ]);
        
        }
        else if($request['pic3']!=NULL){

            $this->validate($request, [
                'pic3' => 'image|mimes:jpeg,png,jpg,gif,svg',
              ]);
        
        }
       
          $this->storeImage($request);
          
          if(Auth::user()->lang=="fr"){
            return redirect('/home')->with('msg','photos ajoutées aux galerie avec succée');
 
        }
        else{
            return redirect('/home')->with('msg','تم اضافة الصور بنجاح');
 

        }
     
    }
    public function storeImage($request) {
        // Get file from request
        if($request['pic1']!=NULL){

            $file = $request->file('pic1');

        }
        else if($request['pic2']!=NULL){

            $file = $request->file('pic2');
        
        }
        else if($request['pic3']!=NULL){

            $file = $request->file('pic3');
        }
  
        // Get filename with extension
        $filenameWithExt = $file->getClientOriginalName();
  
        // Get file path
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
  
        // Remove unwanted characters
        $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
        $filename = preg_replace("/\s+/", '-', $filename);
  
        // Get the original image extension
        $extension = $file->getClientOriginalExtension();
  
        // Create unique file name
        $fileNameToStore = $filename.Auth::user()->id.'_'.time().'.'.$extension;
  
        // Refer image to method resizeImage
        $save = $this->resizeImage($request,$file, $fileNameToStore);
  
        return true;
      }

      public function resizeImage($request,$file, $fileNameToStore) {
        // Resize image
        $logo=Image::make(public_path('css/logo_opac.png'))->resize(150,150);
       
        $resize = Image::make($file)->resize(600, 300)->insert($logo,'center')->encode('jpg');
        
        // Create hash value
        $hash = md5($resize->__toString());
  
        // Prepare qualified image name
        $image = $hash."jpg";
  
        // Put image to storage
       
       // $save = Storage::put("public/galeries/{$fileNameToStore}", $resize->__toString());

        $save=Storage::disk('s3')->put('/galeries/'.$fileNameToStore, $resize->__toString(), 'public');

        $galerie=Auth::user()->galerie ?: new Galerie();

        if($request['pic1']!=NULL)
        {


            if($save){
            if($galerie->pic1 != null){

                Storage::disk('s3')->delete($galerie->pic1);
            }
    
            
           
            $galerie->pic1='galeries/'.$fileNameToStore;
            $galerie->user()->associate(Auth::user())->save();
                
            
     
            }



        }
        else if($request['pic2']!=NULL){
            if($save){
                if($galerie->pic2 != null){
                    Storage::disk('s3')->delete($galerie->pic2);
                }
        
                
               
                $galerie->pic2='galeries/'.$fileNameToStore;
                $galerie->user()->associate(Auth::user())->save();
  
                }
        
        }

        else if($request['pic3']!=NULL){
           
            if($save){
                if($galerie->pic3 != null){
                    Storage::disk('s3')->delete($galerie->pic3);
                }
        
                
               
                $galerie->pic3='galeries/'.$fileNameToStore;
                $galerie->user()->associate(Auth::user())->save();
      
            }   
             }
  


     
            if(Auth::user()->lang=="fr"){
                return redirect('/home')->with('msg','photos ajoutées aux galerie avec succée');
     
            }
            else{
                return redirect('/home')->with('msg','تم اضافة الصور بنجاح');
     

            }
       }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Galerie  $galerie
     * @return \Illuminate\Http\Response
     */
    public function delete_pic(Request $request,$pic){

        if($pic=='pic1'){

            $galerie=Auth::user()->galerie;
            Storage::disk('s3')->delete($galerie->pic1);
            $galerie->pic1=NULL;
            $galerie->save();
            

        }else if($pic == 'pic2'){

            $galerie=Auth::user()->galerie;
            Storage::disk('s3')->delete($galerie->pic2);
            $galerie->pic2=NULL;
            $galerie->save();
        }
        else if($pic == 'pic3'){
            $galerie=Auth::user()->galerie;
            Storage::disk('s3')->delete($galerie->pic3);
            $galerie->pic3=NULL;
            $galerie->save();
       

        }
        if(Auth::user()->lang=='fr'){
            return redirect('/home')->with('msg','image supprimée avec succés');
        }
        else{
            return redirect('/home')->with('msg','تم حذف الصورة بنجاح');
            
        }

    }
    public function show(Galerie $galerie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Galerie  $galerie
     * @return \Illuminate\Http\Response
     */
    public function edit(Galerie $galerie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Galerie  $galerie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Galerie $galerie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Galerie  $galerie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Galerie $galerie)
    {
        //
    }
}
