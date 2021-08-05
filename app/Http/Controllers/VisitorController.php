<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Visit;
use DB;
class VisitorController extends Controller
{
    //
    
    public function service(Request $request,$service){

        if ($request['pos1']!=NULL) {
       
            $users=User::where('state','actif')
            ->where('type_compte','simple')
            ->where(function($q) use ($request,$service) {
                $q->where('categorie','like','%'.$service.'%')
                ->orWhere('categorie','like','%'.$service.'%');
               
            })
            ->orderBy(DB::raw('ABS((pos1 + pos2)  -'.($request['pos1']+$request['pos2']).')'));
    
            $users_js=$users->get();

        }else{
            $users=User::where('state','actif')
            ->where('type_compte','simple')
            ->where(function($q) use ($request,$service) {
                $q->where('categorie','like',$service.'%')
                ->orWhere('categorie','like','%'.$service);
               
            });
         
            $users_js=$users->get();



        }


        return view('our_clients',['users'=>$users->paginate(15),'users_js'=>$users_js]);
    }

    public function create_visits(){

        if(Auth::user()->type_compte=="admin"){

            for($i=0;$i<100;$i++){

                $visit=new Visit();
                $visit->save();
        
            }
    
        }
        $today=Carbon::now();
        $yesterday=Carbon::now()->subDay();

        $nbr_visite=Visit::whereBetween('created_at', [$yesterday,$today])->count(); 

     
        return response()->json(['success'=>"vos visites ont été bien crée",'new_number'=>$nbr_visite]);
       
    }

    public function ar_service(Request $request,$service){

        if ($request['pos1']!=NULL) {
       
            $users=User::where('state','actif')
            ->where('type_compte','simple')
            ->where(function($q) use ($request,$service) {
                $q->where('categorie','like',$service.'%')
                ->orWhere('categorie','like','%'.$service);
               
            })
            ->orderBy(DB::raw('ABS((pos1 + pos2)  -'.($request['pos1']+$request['pos2']).')'));
    
            $users_js=$users->get();

        }else{
            $users=User::where('state','actif')
            ->where('type_compte','simple')
            ->where(function($q) use ($request,$service) {
                $q->where('categorie','like',$service.'%')
                ->orWhere('categorie','like','%'.$service);
               
            });
         
            $users_js=$users->get();



        }


        return view('ar.ar_our_clients',['users'=>$users->paginate(15),'users_js'=>$users_js]);
    }
    public function filter_by_position(Request $request){
        $to_arabic=[];
        

        if($request['byposition']!=NULL){
         if($request['byposition']=="à proximité" && $request['pos1']!= NULL){  

        $users=User::where('type_compte','simple')
                 ->where('state','actif')
                 ->where('categorie',$request['categorie'])
                 ->orderBy(DB::raw('ABS((pos1 + pos2)  -'.($request['pos1']+$request['pos2']).')'));
                 $users_js=$users->get();

          

                $msg="résultat de ".$request['categorie']." à proximité ";
            }
        else{
            $users=User::where('type_compte','simple')
            ->where('categorie',$request['categorie'])
            ->where('state','actif');           
            $users_js=$users->get();
            $msg="résultat de " .$request['categorie']." avec n'importe quelle position  ";
           
        }  
    }
    else if($request['wilaya']!=NULL) {

             $users=User::where('type_compte','simple')
             ->where(function($q) use ($request) {
                $q->where([
                    ['categorie', '=', $request['categorie']],
                    ['wilaya', '=',$request['wilaya']],
                ])->orWhere([
                    ['categorie', '=', $request['categorie']],
                    ['wilaya', '=',$request['wilaya']],
                    ['commune', '=',$request['commune']],
                
                    ]);
             });
            
           

            $users_js=$users->get();

            $msg="résultat de \" " .$request['categorie']."\" - \"".$request['wilaya']." - ".$request['commune']."\"";
           

    }
    else {

        if($request['pos1']!=NULL){
        $users=User::where('type_compte','simple')
        ->where('state','actif')
        ->where(function($q) use ($request) {

            $q->where('categorie','like','%'.$request['keyword'].'%')
            ->orWhere('function','like','%'.$request['keyword'].'%')
            ->orWhere('wilaya','like','%'.$request['keyword'].'%')
            ->orWhere('commune','like','%'.$request['keyword'].'%');
              })
        ->orderBy(DB::raw('ABS((pos1 + pos2)  -'.($request['pos1']+$request['pos2']).')'));
                      

        $users_js=$users->get();

       
        }
        else{
            $users=User::where('type_compte','simple')
            ->where('state','actif')
            ->where(function($q) use ($request) {

                $q->where('categorie','like','%'.$request['keyword'].'%')
                ->orWhere('function','like','%'.$request['keyword'].'%')
                ->orWhere('wilaya','like','%'.$request['keyword'].'%')
                ->orWhere('commune','like','%'.$request['keyword'].'%');
                  });
                
   
            $users_js=$users->get();
           

        }
        $msg="résultat de  ".$request['keyword'];
    

    }  
    
 
       return view('our_clients',['users'=>$users->paginate(15),'users_js'=>$users_js])->with('msg',$msg);         


    }

    

    public function ar_filter_by_position(Request $request){
        $to_arabic=[];

        $to_arabic["Constructions et Travaux"]="الانشاءات والاعمال";
        $to_arabic["Industrie et fabrication"]="الصناعة والتصنيع";
        $to_arabic["Décoration et Aménagement"]="الديكور والترتيب";
        $to_arabic["Traiteurs et Gateaux"]="حلويات";
        $to_arabic["Nettoyage et jardinage"]="التنظيف والبستنة";
        $to_arabic["Location de véhicules"]="تأجير المركبات";
        $to_arabic["Securité et Alarme"]="أجهزة الامان";
        $to_arabic["Menuiserie et Meubles"]="النجارة والأثاث";
        $to_arabic["Hôtelerie"]="فندقة";
        $to_arabic["Esthétique et Beauté"]="تجميل";
        $to_arabic["Comptabilité et Economie"]="المحاسبة والاقتصاد";
        $to_arabic["Maintenance et infromatique"]="الصيانة و اعلام آلي";
        $to_arabic["Paraboles et démos"]="تثبيت أجهزة الاستقبال";
        $to_arabic["Réparation Electromenager"]="إصلاح الاجهزة المنزلية";
        $to_arabic["Juridique"]="قانون";
        $to_arabic["Ecoles et formations"]="المدارس و التكوين";
        $to_arabic["Transport et déménagement"]="نقل و المواصلات";
        $to_arabic["Publicité et communication"]="اعلان و المواصلات";
        $to_arabic["Froid et climatisation"]="التبريد والتكييف";
        $to_arabic["Médecine et santé"]="الطب والصحة";
        $to_arabic["Réparation auto et diagnostic"]="إصلاح وتشخيص السيارات";
        $to_arabic["Projet et études"]="بحوث و مشاريع";
        $to_arabic["Bureautique et internet"]="مكتبيات و انترنت";
        $to_arabic["Impression et édition"]="طباعة و نشر";
        $to_arabic["Image et son"]="سمعي بصري";
        $to_arabic["Couture et confection"]="الخياطة والتفصيل";
        $to_arabic["Evènement et Divertissement"]=" ترفيه و لقاءات";
        $to_arabic["Réparation Electronique"]="تصليح اجهزة الكترونية";
        $to_arabic["Voyage"]="سفر";
        $to_arabic["Jeux"]="الالعاب";
        $to_arabic["Accessoires et Modes"]="إكسسوارات وأزياء";
        $to_arabic["Vêtements et chaussures"]="ألبسة و أحذية";
        $to_arabic["Sports et loisris"]="رياضة";
        $to_arabic["Divers"]="متنوعات";





        if($request['byposition']!=NULL){
         if($request['byposition']=="à proximité" && $request['pos1']!= NULL){   
        $user=Auth::user();
        $users=User::where('type_compte','simple')
            ->where('state','actif')       
            ->where('categorie',$request['categorie'])
            ->orderBy(DB::raw('ABS((pos1 + pos2)  -'.($request['pos1']+$request['pos2']).')'));
               
            
            $users_js=$users->get();
        
            
         $msg=" ` نتائج البحث في ` اماكن قريبة ".$to_arabic[$request['categorie']];
        
        }
        else{
            $users=User::where('type_compte','simple')
            ->where('state','actif')
            ->where('categorie',$request['categorie']); 
               
            $users_js=$users->get();
            $msg="` نتائج البحث في اي مكان ` " .$to_arabic[$request['categorie']];
           
        }  
    }
    else if($request['wilaya']!=NULL) 
    {

             $users=User::where('type_compte','simple')
             ->where(function($q) use ($request) {
                $q->where([
                    ['categorie', '=', $request['categorie']],
                    ['wilaya', '=',$request['wilaya']],
                ])  
                ->orWhere([
                    ['categorie', '=', $request['categorie']],
                    ['wilaya', '=',$request['wilaya']],
                    ['commune', '=',$request['commune']],
                
                    ]);
            });
              
            $users_js=$users->get();
             $msg="نتائج \" " .$to_arabic[$request['categorie']]."\" - \"".$request['wilaya']." - ".$request['commune']."\"";
           

    }
    else {


        if(ctype_alnum($request['keyword'])==false && $request['keyword']!=""){        
        $key="$";
        foreach ($to_arabic as $k => $value) {

            if(strpos($value,$request["keyword"])!==false){
                $key= $k;
            break;
            }
        }   
        if($request['pos1']!=NULL){
         
            $users=User::where('type_compte','=','simple')
            ->where('state','actif')
            ->where(function($q) use ($key) {
                $q->where('categorie','like','%'.$key.'%')
                 ->orWhere('function','like','%'.$key.'%');
    
            })
            ->orderBy(DB::raw('ABS((pos1 + pos2)  -'.($request['pos1']+$request['pos2']).')'));
               
           
           

        }
        else{
           
                $users=User::where('type_compte','=','simple')
                ->where('state','actif')
                ->where(function($q) use ($key) {
                    $q->where('categorie','like','%'.$key.'%')
                     ->orWhere('function','like','%'.$key.'%');
        
                })
                ->orderBy(DB::raw('ABS((pos1 + pos2)  -'.($request['pos1']+$request['pos2']).')'));
    
    

           
        }

         $users_js=$users->get();
        $msg=" نتائج البحث ".$request['keyword'];
    }
    else{

        $users=User::where('type_compte','simple')
        ->where('state','actif')
        ->where(function($q) use ($request) {

            $q->where('categorie','like','%'.$request['keyword'].'%')
            ->orWhere('function','like','%'.$request['keyword'].'%')
            ->orWhere('wilaya','like','%'.$request['keyword'].'%')
            ->orWhere('commune','like','%'.$request['keyword'].'%');

        })     
        ->orderBy(DB::raw('ABS((pos1 + pos2)  -'.($request['pos1']+$request['pos2']).')'));


        $users_js=$users->get();
        $msg=" نتائج البحث ".$request['keyword'];



         }  

}
       return view('ar.ar_our_clients',['users'=>$users->paginate(15),'users_js'=>$users_js])->with('msg',$msg);         


    }

    public function stats_client(){
        if(Auth::user()->state=="actif"){

        $tab=[];
        $user=Auth::user();
        if($user->lang=="fr"){
        $tab['N°visites']=$user->nbr_visite;
        $tab['N°Likes']=$user->liked_by()->count();
        $tab['N°commentaires']=$user->comments()->count();
        $tab['N°Messages envoyés']=$user->sended()->count();
        $tab['N°Messages reçus']=$user->sended()->count();

        return view('stats_client',['tab'=>$tab]);
        }
        else{
            $tab['عدد الزيارات']=$user->nbr_visite;
            $tab['عدد الاعجابات']=$user->liked_by()->count();
            $tab['عدد التعليقات']=$user->comments()->count();
            $tab['عدد الرسائل']=$user->sended()->count()+$user->received()->count();
         
            return view('ar.ar_stats_client',['tab'=>$tab]);
         

        }
    }else{
        return redirect('/');

    }
        
    }

    public function likes($id){
        $user=Auth::user();
        $user2=User::findOrFail($id);
        if($user2->is_liked($user->id)==false){
            $user->liked()->attach($user2);
        }
        else{
            $user->liked()->detach($user2);
        }
        if($user->lang=="fr")
        {return redirect('/fr/contact_client/'.$id);}
        else{
            return redirect('/ar/contact_client/'.$id);
        }

    }

    public function detail_user($id){
        $user=User::findOrFail($id);

        if(Auth::user()->type_compte=="admin" || Auth::user()->id == $id)
        {
            
            if(Auth::user()->lang=="fr"){
                $user=User::findOrFail($id);
                return view('detail_visitor',['user'=>$user]);
    
               }
               else if(Auth::user()->lang=="ar"){
                return view('ar.ar_detail_visitor',['user'=>$user]);
    

               }
     
        }       
        
        else
        {
        return redirect('/home');
         }



    }

    
    public function edit_visitor($id)
    {
        if(Auth::user()->type_compte=="admin" || Auth::user()->id == $id)
        {
            $user=User::findOrFail($id);

            if(Auth::user()->lang=="fr"){
                return view('update_visitor',['id'=>$id,'user'=>$user]);
          
            }
            else{
        
                return view('ar.ar_update_visitor',['id'=>$id,'user'=>$user]);
        

            }
            
        }
    }


    public function update_visitor(Request $request,$id)
    {
        if(Auth::user()->type_compte=="admin" || Auth::user()->id == $id)
        {
      
        $user=User::findOrFail($id);
        $user->name=$request['name'];
        $user->email=$request['email'];
        $user->phone_number=$request['phone_number'];
        $user->save();
        return redirect('/detail_visitor/'.$id);
        
         }
    else {

        return redirect('/home');
    }
    }   

     public function edit_password($id)
     {
         if(Auth::user()->id == $id)
         {
        if(Auth::user()->lang=="fr" && Auth::user()->type_compte=="simple" ){
            return view('password_change_client');
        }else if(Auth::user()->lang=="ar" && Auth::user()->type_compte=="simple" ){

            return view('ar.ar_password_change');
            
        }
        else if(Auth::user()->type_compte=="visitor" && Auth::user()->lang=="fr"){

            return view('password_change_visitor');
            
        } 
        else if(Auth::user()->type_compte=="visitor" && Auth::user()->lang=="ar"){

            return view('ar.ar_password_change_visitor');
       
        }
        else{
            return view('password_change');
  

        }
        }
        
     }
     public function update_password(Request $request,$id)
     {

        $user=User::findOrFail($id);
        if(Auth::user()->id == $id && Auth::user()->state=="actif"){
          if(Auth::user()->lang=="fr"){


            if(Hash::check($request['password'], $user->password)){

                $user->password=Hash::make($request['confirmpassword']);
                $user->save();
                return redirect('/home')->with('msg','mot de passe changé avec succé');
            }
            else {
                return redirect('/home')->with('msg','ancien mot de passe incorrect');
            }


             }   
          else
          {


            if(Hash::check($request['password'], $user->password)){

                $user->password=Hash::make($request['confirmpassword']);
                $user->save();
                return redirect('/home')->with('msg','تم تغيير كلمة السر بنجاح');
            }
            else {
                return redirect('/home')->with('msg','كلمة السر القديمة خاطئة');
            }


            } 
    
    } 
        
    else{
            return redirect('/home');
        }
            
     }
     
    
}
