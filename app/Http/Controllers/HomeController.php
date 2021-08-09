<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\OperationAdmin;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Visit;
use App\Models\Ad;
use Illuminate\Support\Facades\Storage;
use Image;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    

     public function mettre_ajour_statut(Request $request){
        $user=Auth::user();

        $user->statut =="disponible" ? $user->statut="non disponible"  : $user->statut="disponible";
        
        $user->save();
        
        return response()->json(['statut'=>$user->statut]);
     
    }
     public function add_profil_pic(){
        
        if(Auth::user()->lang=="fr" && Auth::user()->state=="actif" && Auth::user()->type_compte=="simple")
        {
            return view('add_profil_pic');
   
        }
        else if(Auth::user()->state=="actif" &&  Auth::user()->type_compte=="simple") {
            return view('ar.ar_add_profil_pic');
        } 
        else if(Auth::user()->type_compte=="visitor" && Auth::user()->lang=="fr"){

            return view('add_profil_pic_visitor');
        }
        else if(Auth::user()->type_compte=="visitor" && Auth::user()->lang=="ar"){

            return view('ar.ar_add_profil_pic_visitor');
        }
        else{
            return redirect('/');
        }

     }
    //  public function save_pic(Request $request){
    //     $user=Auth::user();
    //     if($user->photo != null){
    //      //   unlink(public_path().'/storage/'.$user->photo);
    //        }
    //     $user->photo=request()->photo->store('uploads','public');        
    //     $user->save();
    //     if($user->lang=="fr"){
    //         return redirect('/home')->with('msg','Photo de profile changée avec succée');
    //     }

    //     else {
                
    //         return redirect('/home')->with('msg','تم تغيير صورة البروفايل بنجاح');
    //         }        
    //  }


    // getting the image checking the extension
     public function save_pic(Request $request){
         if(Auth::user()->state=="actif"){
            $this->validate($request, [
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
              ]);
        
              $this->storeImage($request);
    
              if(Auth::user()->lang=="fr"){
                return redirect('/home/show_users/detail_user/'.Auth::user()->id)->with('msg','votre photo de profil est modifié avec succés');
         
              }else{

                return redirect('/home/show_users/detail_user/'.Auth::user()->id)->with('msg','لقد تم تغيير صورة البروفايل بنجاح');
            
              }
              

         } 
         else{
            return redirect('/');
        }
        
    }
    public function storeImage($request) {
        // Get file from request
        $file = $request->file('image');
  
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
        $save = $this->resizeImage($file, $fileNameToStore);
  
        return true;
      }

      public function resizeImage($file, $fileNameToStore) {
        // Resize image
        $user=Auth::user();
        $resize = Image::make($file)->resize(600, null, function ($constraint) {
          $constraint->aspectRatio();
        })->encode('jpg');
  
        // Create hash value
        $hash = md5($resize->__toString());
  
        // Prepare qualified image name
        $image = $hash."jpg";
  
        // Put image to storage
        $save = Storage::disk('s3')->put('/profile_pics/'.$fileNameToStore, $resize->__toString(),'public');
        if($save){
        if($user->photo != null){
            
            Storage::disk('s3')->delete($user->photo);
        }
       
        $user->photo='profile_pics/'.$fileNameToStore;
        $user->save();    
 
    }
     
          
       }


    public function languge(Request $request){
        $user=Auth::user();
        $user->lang=$request["language"];  
        $user->save();  

        return response()->json(['success'=>'Ajax request submitted successfully']);


    }
    public function getmail(Request $request){

        $user = User::where('email',$request['email'])->get();
        return response()->json(['user'=>$user]);

    }
    public function ar_login(){

        return view('auth.ar_login');
    }
    public function taux_visites($param){
        
        if(Auth::user()->type_compte=="admin")
        {
            if($param=="jours"){

            $today=Carbon::now();
            $yesterday=Carbon::now()->subDay();
            $nb= Visit::whereBetween('created_at', [$yesterday,$today])->count(); 
             $phr="Le nombre de vistes pendant ce jour est estimé à ".$nb;   
        }
        else if($param=="semaine"){
            $today=Carbon::now();
            $yesterday=Carbon::now()->subWeek();
            $nb= Visit::whereBetween('created_at', [$yesterday,$today])->count(); 
            $phr="Le nombre de vistes pendant cette semaine est estimé à ".$nb;
        }
        else if($param=="mois"){
            $today=Carbon::now();
            $yesterday=Carbon::now()->subMonth();
            $nb= Visit::whereBetween('created_at', [$yesterday,$today])->count(); 
            $phr="Le nombre de vistes pendant ce mois est estimé à ".$nb;

        }
        return view('taux_visite',['nb'=>$nb,'phr'=>$phr]);
        }
        else{
            return redirect('/');
        }
    }
    
    public function get_visites_between(Request $request){
        if(Auth::user()->type_compte=="admin"){

            $nb= Visit::whereBetween('created_at', [$request['debut'],$request['fin']])->count(); 
        
            $phr = "le nombre de visite entre ".$request['debut']." et ".$request['fin'].' : '.$nb;
    
            return view('taux_visite',['nb'=>$nb,'phr'=>$phr]);
    
        }
        else {
            return redirect('/');
        }    
     
    }


    public function index()
    {

        $today=Carbon::now();
        $yesterday=Carbon::now()->subDay();

        $user=Auth::user();
        if($user->type_compte=="simple")
        {  
            // $cookie= $_SERVER['HTTP_REFERER'];

            // $tab=explode("/",$cookie);
            // if($tab[count($tab)-2]=="ar"){
            //     Auth::user()->lang="ar";
            //     Auth::user()->save();
            // }
            $nbjr=$today->diffInDays($user->date_valid);
            $ad=Ad::all()->first();
            $users=User::where('type_compte','simple')->withCount('liked_by')
            ->orderBy('liked_by_count','desc')->get();
            $index = $users->search(function($e) {
                return $e->id === Auth::user()->id;
            });
         

            $view="";
            ($user->lang=="ar") ? $view="ar.ar_home":$view="home" ;
                 
             return view($view,['user'=>$user,'nbjr'=>$nbjr,'ad'=>$ad,'index'=>$index+1]);
            


            }
         else if($user->type_compte=="admin")
         {

            $nbr_visite=Visit::whereBetween('created_at', [$yesterday,$today])->count(); 
          
             $tab['client']=User::where('type_compte','simple')->count();
             $tab['visiteur']=User::where('type_compte','visitor')->count();
             $tab['modérateur']=User::where('type_compte','moderator')->count();
             $tab['admin']=User::where('type_compte','admin')->count();
          

            return view('admin',['user'=>$user,'nbr_visite'=>$nbr_visite,'tab'=>$tab]);

         }
         else if($user->type_compte=="moderator")
         {
            $operations=$user->operations()->orderBy('created_at','desc')->paginate(8); 
            return view('moderator',['user'=>$user,'operations'=>$operations]);

         }
        
         
    }
    public function check_issues(){
  
        if(Auth::user()->type_compte=="admin" || Auth::user()->type_compte=="moderator")
       { 
        User::where('type_compte','simple')
            ->where('email_verified_at',NULL)
            ->where('created_at','<', Carbon::yesterday()->toDateTimeString())
            ->delete();
      
        return redirect('/home')->with('msg','données synchronisées avec succès');
        }
        else {
            return redirect('/');
        }
    }

    public function show_users(){

        if(Auth::user()->type_compte=="admin" || Auth::user()->type_compte=="moderator" ){
        $users=User::where('type_compte','simple')->orderBy('created_at','desc')->paginate(8);

        return view('users',['users'=>$users]);
        }else{
            return redirect('/home');
        }



    }
    public function detail_user($id){
        if(Auth::user()->type_compte=="admin" || Auth::user()->id==$id || Auth::user()->type_compte=="moderator"){
      
        $user=User::findOrFail($id);

        if(Auth::user()->lang == "fr" && Auth::user()->type_compte=="simple"){
        return view('detail_user_client',['user'=>$user]);
        }
        else if(Auth::user()->lang =="ar" &&  Auth::user()->type_compte=="simple") {
            return view('ar.ar_detail_user',['user'=>$user]);
            
        }
        else{
            return view('detail_user',['user'=>$user]);
            
        }
    }
        else
        {
        return redirect('/home');
         }



    }
    public function set_language_cookie($lg){

        setcookie(
            "koudami_language",
            $lg,
            time() + (10 * 365 * 24 * 60 * 60)
          );
        
        return response()->json(['success'=>$_COOKIE['koudami_language']]);

    }

    public function modify_user_info($id){
    
    if(Auth::user()->type_compte=="admin" || Auth::user()->id==$id || Auth::user()->type_compte=="moderator") 
    {
        $user=User::findOrFail($id);
        if(Auth::user()->lang=="fr"){
            return view('modify_user_info',['id'=>$id,'user'=>$user]);

        }   
        else{

            return view('ar.ar_modify_user_info',['id'=>$id,'user'=>$user]);
       
        }
       
    }
    else
    {
        return redirect('/home');

    }
 
}

public function update_user(Request $request,$id){

    if(Auth::user()->type_compte=="admin" || Auth::user()->type_compte=="moderator" || Auth::user()->id==$id)
   
{
    $ele =User::findOrFail($id);
    $ele->name=request('name');
    $ele->email=request('email');
    $ele->categorie=request('categorie');
    $ele->function=request('function');
    $ele->phone_number=request('phone_number');
    $ele->type_payement=request('type_payement');
    $ele->Ncompte=request('Ncompte');
    $ele->wilaya=request('wilaya');
    $ele->commune=request('commune');

    if($request['date_valid']!=NULL){
    $ele->date_valid=request('date_valid');
}
    if($request['state']!=NULL){
        $ele->state=request('state');

    }

    if(Auth::user()->type_compte=="moderator" || Auth::user()->type_compte=="admin"){
        $op=new OperationAdmin();
        $op->admin_id=Auth::user()->id;
        $op->object="mise à jours des informations de l'utilisateur ".$ele->name." ".$ele->prenom;
        $op->save();
    }
 
    $ele->save();
    $redirection='/home/show_users/detail_user/'.$id;

    return redirect( $redirection)->with("msg","element updated successfully");
}
    else{

        return redirect('/home');
    }
}
public function destroy_user($id){

    $user=Auth::user();
   
    if($user->type_compte=="admin"){
    $ele=User::findOrFail($id);
    $ele->messages()->delete();
    $ele-> posts()->delete();
    $ele->comments()->delete();
    $ele->liked()->delete();
    $ele->liked_by()->delete();
    $ele->sended()->delete();
    $ele->received()->delete();
    $ele->delete();

    return redirect('/home/show_users')->with("msg","element deleted successfully");
}
return redirect('/home');
}

public function location(Request $request){

    $user=Auth::user();
    $user->pos1=strval($request['att']);
    $user->pos2=strval($request['long']);
    $user->save();

    return response()->json(['success'=>'Ajax request submitted successfully']);


}



public function our_clients(){

    $users=User::where('type_compte','simple')->where('state','actif')
    ->withCount('liked_by')->orderBy('liked_by_count', 'desc');
    
    $users_js=$users->take(15)->get();
    

     return view('our_clients',['users'=>$users->paginate(15),'users_js'=>$users_js]);

}
public function ar_our_clients(){

    $users=User::where('type_compte','simple')->where('state','actif')->withCount('liked_by')
    ->orderBy('liked_by_count', 'desc');

    $users_js=$users->take(15)->get();


     return view('ar.ar_our_clients',['users'=>$users->paginate(15),'users_js'=>$users_js]);

}

public function position($id){

    $user=User::findOrFail($id);
    return   view('position',['user'=>$user]);

}
public function confirm_email(Request $request){

    $user=User::findOrFail($request['id']);
    $user->email_verified_at=Carbon::now();
    $user->save();
    return response()->json(['success'=>'Ajax request submitted successfully']);

}

public function get_users_vuejs(Request $request){

    $users =DB::table('users')
    ->where('type_compte','simple')
    ->select('name', 'id','function','photo')
    ->skip($request->bornInf)->take($request->bornMax)->get();
    return  json_encode($users);

}

}
