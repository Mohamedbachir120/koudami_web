<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Image;
use DB;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function article_search($lg,Request $request){
        if($request['pos1']!=NULL){
           
            $articles = DB::table('articles')
            ->join('users', 'articles.publierPar_id', '=', 'users.id')
            ->select('articles.*','users.phone_number as phone_number','users.wilaya as wilaya','users.commune as commune')
            ->where(function ($que) use ($request){
                $que->where('articles.categorie','like','%'.$request['keyword'].'%');
            })->orderBy(DB::raw('ABS((pos1 + pos2)  -'.($request['pos1']+$request['pos2']).')'))
            ->orderBy('updated_at','desc')
            ->paginate(12);
    

        }else{

            $articles = DB::table('articles')
            ->join('users', 'articles.publierPar_id', '=', 'users.id')
            ->select('articles.*','users.phone_number as phone_number','users.wilaya as wilaya','users.commune as commune')
            ->where(function ($que) use ($request){
                $que->where('articles.categorie','like','%'.$request['keyword'].'%');
            })->orderBy('updated_at','desc')
            ->paginate(12);
    
        }
        ($lg=='fr')? $view="store.show_articles":$view="store.ar_show_articles";

        return view($view,['articles'=>$articles,'articles2'=>json_encode($request['keyword'])]);


    }

    public function index($lg)
    {
        //

        if($lg == "fr"){
            $articles = DB::table('articles')
            ->join('users', 'articles.publierPar_id', '=', 'users.id')
            ->select('articles.*','users.phone_number as phone_number','users.wilaya as wilaya','users.commune as commune')
           
            ->orderBy('updated_at','desc')->paginate(12);      
    
         return view('store.show_articles',['articles'=>$articles,'articles2'=>json_encode(" ")]);      
         

        }
        else{
            $articles = DB::table('articles')
            ->join('users', 'articles.publierPar_id', '=', 'users.id')
            ->select('articles.*','users.phone_number as phone_number','users.wilaya as wilaya','users.commune as commune')
           
            ->orderBy('updated_at','desc')->paginate(12);      
    
         return view('store.ar_show_articles',['articles'=>$articles,'articles2'=>json_encode(" ")]);      
            
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function find_article($lg,Request $request)
     {
         # code...

        //   $articles =Article::where(function($q) use ($request) {
 
        //      $q->where('articles.categorie','like','%'.$request['keyword'].'%')
        //      ->orWhere('articles.description','like','%'.$request['keyword'].'%')
        //      ->join('users',function($join){ $join->on('articles.publierPar_id','=','users.id'); })
        //      ->select('articles.*');
        //     //  ->orWhere('wilaya','like','%'.$request['wilaya'].'%')
        //     //  ->orWhere('commune','like','%'.$request['commune'].'%');

        //        })
        //  ->orderBy('created_at','desc')->paginate(12);

            
        // $articles=Article::where('categorie',$request['keyword'])->get();
            $view="";
            ($lg=="fr")? $view="store.show_articles" : $view="store.ar_show_articles" ;

            if(strlen($request['wilaya'])>1){
                $articles = DB::table('articles')
                ->join('users', 'articles.publierPar_id', '=', 'users.id')
                ->select('articles.*','users.phone_number as phone_number','users.wilaya as wilaya','users.commune as commune')
                ->where(function ($que) use ($request){
                    $que->where('articles.categorie','like','%'.$request['keyword'].'%')
                    ->orWhere('articles.description','like','%'.$request['keyword'].'%');
                })
                ->where(function ($q) use ($request){
                    $q->where('users.wilaya',$request['wilaya'])
                    ->orWhere('users.commune',$request['commune']);
                   
                })
                ->orderBy('updated_at','desc')->paginate(12);        
    

            }else if($request['pos1']!=NULL){

                $articles = DB::table('articles')
                ->join('users', 'articles.publierPar_id', '=', 'users.id')
                ->select('articles.*','users.phone_number as phone_number','users.wilaya as wilaya','users.commune as commune')
                ->where(function ($que) use ($request){
                    $que->where('articles.categorie','like','%'.$request['keyword'].'%')
                    ->orWhere('articles.description','like','%'.$request['keyword'].'%');
                })->orderBy(DB::raw('ABS((pos1 + pos2)  -'.($request['pos1']+$request['pos2']).')'))
                ->orderBy('updated_at','desc')
                ->paginate(12);        
    

            }else{
                $articles = DB::table('articles')
                ->join('users', 'articles.publierPar_id', '=', 'users.id')
                ->select('articles.*','users.phone_number as phone_number','users.wilaya as wilaya','users.commune as commune')
                ->where(function ($que) use ($request){
                    $que->where('articles.categorie','like','%'.$request['keyword'].'%')
                    ->orWhere('articles.description','like','%'.$request['keyword'].'%');
                })->orderBy('updated_at','desc')
                ->paginate(12);        
    

            }
            return view($view,['articles'=>$articles,'articles2'=>json_encode($request['keyword'])]);

       
     }

    public function create()
    {
        //
      
        if(Auth::user()->articles->count()<=100 || Auth::user()->profile != NULL ){
            $view="";
            (Auth::user()->lang=="fr")? $view='store.create_article': $view='store.ar_create_article' ;
            return view($view);
        }else{
            return redirect('/home')->with('msg',"vous avez atteint le nombre maximum d'articles");
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
        //

        
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
          ]);

        $this->storeImage($request);
        if(Auth::user()->lang=="fr"){
            return redirect('/home')->with('msg','article ajouté avec succée');
 
        }
        else{
            return redirect('/home')->with('msg','تم اضافة المنتج بنجاح');
 

        }
       
   

    }

    public function storeImage($request) {
        // Get file from request
        $file = $request->file('image');
        $file2 = $request->file('image2');
        $file3 = $request->file('image3');


        // Get filename with extension
        $filenameWithExt = $file->getClientOriginalName();
        $filenameWithExt2 = $file2->getClientOriginalName();
        $filenameWithExt3 = $file3->getClientOriginalName();
  
        // Get file path
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $filename2 = pathinfo($filenameWithExt2, PATHINFO_FILENAME);
        $filename3 = pathinfo($filenameWithExt3, PATHINFO_FILENAME);

        // Remove unwanted characters
        $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
        $filename = preg_replace("/\s+/", '-', $filename);
  
        $filename2 = preg_replace("/[^A-Za-z0-9 ]/", '', $filename2);
        $filename2 = preg_replace("/\s+/", '-', $filename2);
  
        $filename3 = preg_replace("/[^A-Za-z0-9 ]/", '', $filename3);
        $filename3 = preg_replace("/\s+/", '-', $filename3);
  
        // Get the original image extension
        $extension = $file->getClientOriginalExtension();
  
        // Create unique file name
        $fileNameToStore = $filename.Auth::user()->id.'_'.time().'.'.$extension;
  
        $extension2 = $file2->getClientOriginalExtension();
  
        // Create unique file name
        $fileNameToStore2 = $filename2.Auth::user()->id.'_'.time().'.'.$extension;
       
        $extension3 = $file3->getClientOriginalExtension();
  
        // Create unique file name
        $fileNameToStore3 = $filename3.Auth::user()->id.'_'.time().'.'.$extension;
  


        // Refer image to method resizeImage
        $save = $this->resizeImage($request,$file, $fileNameToStore,$file2, $fileNameToStore2,$file3, $fileNameToStore3);
      
        

        return true;
      }

      public function resizeImage($request,$file, $fileNameToStore,$file2, $fileNameToStore2,$file3, $fileNameToStore3) 
      {
        // Resize image 1
        $resize = Image::make($file)->resize(600, null, function ($constraint) {
          $constraint->aspectRatio();
        })->encode('jpg');
  
        // Create hash value
        $hash = md5($resize->__toString());
  
        // Prepare qualified image name
        $image = $hash."jpg";
  
        // Put image to storage
        $save=Storage::disk('s3')->put('/boutique/'.$fileNameToStore, $resize->__toString(), 'public');

        // resize 2 



        $resize2 = Image::make($file2)->resize(600, null, function ($constraint) {
            $constraint->aspectRatio();
          })->encode('jpg');
    
          // Create hash value
          $hash = md5($resize2->__toString());
    
          // Prepare qualified image name
          $image = $hash."jpg";
    
          // Put image to storage
          $save=Storage::disk('s3')->put('/boutique/'.$fileNameToStore2, $resize2->__toString(), 'public');
  

          // resize 3 

          $resize3 = Image::make($file3)->resize(600, null, function ($constraint) {
            $constraint->aspectRatio();
          })->encode('jpg');
    
          // Create hash value
          $hash = md5($resize3->__toString());
    
          // Prepare qualified image name
          $image = $hash."jpg";
    
          // Put image to storage
          $save=Storage::disk('s3')->put('/boutique/'.$fileNameToStore3, $resize3->__toString(), 'public');
  





        if($save){
        
            $article=new Article();
            $article->categorie=$request['categorie'];
            $article->nom_article=$request['nom_article'];
            $article->prix=$request['prix'];
            $article->description=$request['description'];
            $article->livraison=$request['livraison'];
            $article->publierPar_id=Auth::user()->id;
         


        $article->image='boutique/'.$fileNameToStore;     
        $article->image2='boutique/'.$fileNameToStore2;
        $article->image3='boutique/'.$fileNameToStore3;

        $article->save();    
 
        }
     
          
       }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $view="";
        (Auth::user()->lang =="fr") ? $view="store.consulter_mes_articles" : $view="store.ar_consulter_mes_articles";
        return view ($view);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $article=Article::findOrFail($id);

        if(Auth::user()->id==$article->publierPar_id){
            Auth::user()->lang=="fr" ? $view= "store.edit_article" :$view="store.ar_edit_article" ;

            return view($view,['article'=>$article]);
       
        }else if( Auth::user()->type_compte=="admin" || Auth::user()->type_compte=="moderator"){
            $view="store.adminEdit_article";
            return view($view,['article'=>$article]);

        }
        return redirect('/');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
       $article['nom_article']=$request['nom_article'];
       $article['categorie']=$request['categorie'];
       $article['prix']=$request['prix']; 
       $article['description']=$request['description'];
       $article['livraison']=$request['livraison'];
       $article->save();
       (Auth::user()->lang =="fr") ? $msg="votre article a été mis à jours avec succées" : $msg="لقد  تم تحديث المبيع بنجاح";
        if(Auth::user()->type_compte=="simple"){
            return redirect('/home')->with('msg',$msg);
  
        }else{
            $msg="article modifié avec succées";
            return redirect('/home')->with('msg',$msg);
      
        }
    }

    public function edit_image(Request $request,Article $article){
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
       
          $this->storeImage_article($request,$article);
          


          if(Auth::user()->lang=="fr"){
            return redirect('/home')->with('msg','photos ajoutées aux galerie avec succée');
 
        }
        else{
            return redirect('/home')->with('msg','تم اضافة الصور بنجاح');
 

        }
     
    }
    public function storeImage_article($request,$article) {
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
        $save = $this->resizeImage_article($request,$file, $fileNameToStore,$article);
  
        return true;
      }

      public function resizeImage_article($request,$file, $fileNameToStore,$article) {
        // Resize image
       

        $resize = Image::make($file)->resize(null, 300, function ($constraint) {
            $constraint->aspectRatio();
          })->encode('jpg');  

        // Create hash value
        $hash = md5($resize->__toString());
  
        // Prepare qualified image name
        $image = $hash."jpg";
  
        // Put image to storage
       
       // $save = Storage::put("public/galeries/{$fileNameToStore}", $resize->__toString());

        $save=Storage::disk('s3')->put('/boutique/'.$fileNameToStore, $resize->__toString(), 'public');


        if($request['pic1']!=NULL)
        {


            if($save){
            
                if (Storage::disk('s3')->exists($article->image)) {

            Storage::disk('s3')->delete($article->image);
    
                }
           
            $article->image='boutique/'.$fileNameToStore;
            $article->save();
                
            
     
            }



        }
        else if($request['pic2']!=NULL){
            if($save){
            
                if (Storage::disk('s3')->exists($article->image2)) {

            Storage::disk('s3')->delete($article->image2);

                }
            
           
            $article->image2='boutique/'.$fileNameToStore;
            $article->save();
                
  
                }
        
        }

        else if($request['pic3']!=NULL){
           
            if($save){
            
                if (Storage::disk('s3')->exists($article->image3)) {

            Storage::disk('s3')->delete($article->image3);
    
                }
           
            $article->image3='boutique/'.$fileNameToStore;
            $article->save();
                
      
            }   
             }
  


     
          
       }
  



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $article=Article::findOrFail($id);

        if(Auth::user()->type_compte=="admin" || Auth::user()->type_compte=="moderator" || $article->publicateur->id==Auth::user()->id)
        {
      

            if (Storage::disk('s3')->exists($article->image)) {
                Storage::disk('s3')->delete($article->image);
            }
            if (Storage::disk('s3')->exists($article->image2)) {

                Storage::disk('s3')->delete($article->image2);
                }
            if (Storage::disk('s3')->exists($article->image3)) {

                    Storage::disk('s3')->delete($article->image3);
                    }
           $article->delete();
           if(Auth::user()->lang=="fr")
        {
            return redirect('/home')->with('msg','article supprimé avec succée');
        
        }
        else{
            return redirect('/home')->with('msg','تم حذف الاعلان بنجاح');
        }


    }

    else{
    return redirect('/home');   
        }

        }

    public function show_articles_admin(){

        if(Auth::user()->type_compte=="admin"){

            $articles=Article::orderBy('created_at','desc')->paginate(8);      
          

            return view('store.show_articles_admin',['articles'=>$articles]);
  
        }
     

    }
    public function find_article_admin(Request $request){


        $ele=$request['search'];

        $articles=DB::table('articles')
        ->leftjoin('users','articles.publierPar_id','=','users.id')
        ->select(
        'articles.id',
        'articles.nom_article',
        'users.name  as owner_name',
        'articles.created_at',
        'articles.categorie'
        )->where(function ($que) use ($request){
            $que->where('articles.description','like','%'.$request['search'].'%')
                ->orWhere('articles.nom_article','like','%'.$request['search'].'%')
                ->orWhere('articles.categorie','like','%'.$request['search'].'%');
                    
        
            })
        ->distinct()    
        ->take(100)
        ->get();
        
        
        return response()->json($articles);
    }    
    public function article_detail($id){

        $article=Article::findOrFail($id);

        if(Auth::user()->type_compte=="admin" || Auth::user()->type_compte=="moderator"){

            return view('store.article_detail',['article'=>$article]);
    

        }
         else{

            return redirect('/');
         }   
    }
    public function buy_article($lg,$id){

        $view="";

        $article=Article::findOrFail($id);

        ($lg=="fr")?$view="store.buy_article":$view="store.ar_buy_article";
        

        



        return view($view,['article'=>$article]);

    }


}
