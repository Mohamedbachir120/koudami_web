<?php

namespace App\Http\Controllers;

use App\Models\Emploi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Image;
use DB;

class EmploiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lg)
    {
    
        if($lg == "fr"){
            $articles = DB::table('emplois')
            ->join('users', 'emplois.publierPar_id', '=', 'users.id')
            ->select('emplois.*','users.name as publicateurName','users.Prenom as publicateurPrenom')
           
            ->orderBy('created_at','desc')->paginate(12);      
    
         return view('jobs.all_articles',['articles'=>$articles]);      
         

        }
        else{
            $articles = DB::table('emplois')
            ->join('users', 'emplois.publierPar_id', '=', 'users.id')
            ->select('emplois.*','users.name as publicateurName','users.Prenom as publicateurPrenom')
           
            ->orderBy('created_at','desc')->paginate(12);      
    
         return view('jobs.ar_all_articles',['articles'=>$articles]);      
        }



        
    }
    public function detail_article_user(Emploi $emploi){
            (Auth::user()->lang=="fr")?$view='jobs.detail_article_user':$view='jobs.ar_detail_article_user';

            return view($view,['emploi'=>$emploi]);
        
       
       }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       (Auth::user()->lang=="fr")? $view="jobs.create_job_article":$view="jobs.ar_create_job_article";

       return view($view);

        
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


        (Auth::user()->lang=="fr")?$msg="article ajouté avec succées":$msg="تم اضافة الاعلان بنجاح";
        $emploi=new Emploi();
        $emploi->categorie_emploi=$request['categorie_emploi'];
        $emploi->emploi=$request['emploi'];
        $emploi->salaire=$request['salaire'];
        $emploi->contact=$request['contact'];
        $emploi->description=$request['description'];
        $emploi->publierPar_id=Auth::user()->id;
        $photo="";
        switch($request['categorie_emploi']){
            
            case 'Fabrication et travail en entrepôt':
                $photo="/css/jobs/Fabrication_travail.jpg";
            break;
            

            case 'Vente et commerce de détail':
                $photo="/css/jobs/commerce_detail.jpg";
            break;
            
            case 'Informatique':
                $photo="/css/jobs/informatique.jpg";
            break;
            
            case 'Installation, entretien et réparation':
                $photo="/css/jobs/installation_reaparation.jpg";
            break;
            
            case 'Transports et logistique':
                $photo="/css/jobs/transport.jpg";
            break;
            
            case 'Direction':
                $photo="/css/jobs/direction.jpg";
            break;
            
            case 'Service client':
                $photo="/css/jobs/service_client.jpg";
            break;
            
            case 'Comptabilité et finance':
                $photo="/css/jobs/finance.jpg";
            break;
            
            case 'Science et ingénierie':
                $photo="/css/jobs/science.jpg";
            break;
            
            case 'Activités commerciales':
                $photo="/css/jobs/activite_commerce.jpg";
            break;
            
            case 'Construction':
                $photo="/css/jobs/construction.jpg";
            break;
            
            case 'Ressources humaines':
                $photo="/css/jobs/directeur-ressources-humaines.jpg";
            break;
            
            case 'Médias, communication et rédaction':
                $photo="/css/jobs/media.jpg";
            break;
            
            case 'Administration et travail de bureau':
                $photo="/css/jobs/travail_bureau.jpg";
            break;
            
            case 'Publicité et marketing':
                $photo="/css/jobs/marketing.jpg";
            break;
            
            case 'Enseignement':
                $photo="/css/jobs/enseignement.jpg";
            break;
            
            case 'Agriculture et travail en plein air':
                $photo="/css/jobs/agriculture.jpg";
            break;

            case 'Services à la personne':
                $photo="/css/jobs/service_personne.jpg";
            break;
            

            case 'Santé':
                $photo="/css/jobs/sante.jpg";
            break;
           
            
            case 'Art, mode et design':
                $photo="/css/jobs/art_design.jpg";
            break;
           
            case 'Nettoyage et équipements':
                $photo="/css/jobs/nettoyage.jpg";
            break;
           
            case 'Services de protection':
                $photo="/css/jobs/protection.jpg";
            break;
           
            case 'Énergie et mines':
                $photo="/css/jobs/energie.jpg";
            break;
           
            case 'Bien-être animal':
                $photo="/css/jobs/bien_etre_animaux.jpg";
            break;
           
            case 'Divertissement et voyage':
                $photo="/css/jobs/voyage.jpg";
            break;
           
            case 'Juridique':
                $photo="/css/jobs/juridique.jpg";
            break;
           
            case 'Immobilier':
                $photo="/css/jobs/immobilier.jpg";
            break;

            case 'Services sociaux et org. à but non lucratif':
                $photo="/css/jobs/service_sociaux.jpg";
            break;

            case 'Sports, remise en forme et loisirs':
                $photo="/css/jobs/loisirs.jpg";
            break;

            case 'Restauration et hôtellerie':
                
                $photo="/css/jobs/restauration.jpg";
                
                break;
           
        }    

        $emploi->photo=$photo;

        $emploi->save();
        return redirect('/jobs/mes_articles')->with('msg',$msg);


    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Emploi  $emploi
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        (Auth::user()->lang=="fr") ? $view="jobs.my_articles" : $view="jobs.ar_my_articles";
        return view($view);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Emploi  $emploi
     * @return \Illuminate\Http\Response
     */
    public function edit(Emploi $emploi)
    {
        (Auth::user()->lang=='fr')?$view="jobs.edit_article":$view="jobs.ar_edit_article";
        return view($view,['emploi'=>$emploi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Emploi  $emploi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Emploi $emploi)
    {
        //
        (Auth::user()->lang=="fr")?$msg="article modifié avec succées":$msg="تم الحديث بنجاح";
        $emploi->categorie_emploi=$request['categorie_emploi'];
        $emploi->emploi=$request['emploi'];
        $emploi->salaire=$request['salaire'];
        $emploi->contact=$request['contact'];
        $emploi->description=$request['description'];
        $photo="";
        switch($request['categorie_emploi']){
            
            case 'Fabrication et travail en entrepôt':
                $photo="/css/jobs/Fabrication_travail.jpg";
            break;
            

            case 'Vente et commerce de détail':
                $photo="/css/jobs/commerce_detail.jpg";
            break;
            
            case 'Informatique':
                $photo="/css/jobs/informatique.jpg";
            break;
            
            case 'Installation, entretien et réparation':
                $photo="/css/jobs/installation_reaparation.jpg";
            break;
            
            case 'Transports et logistique':
                $photo="/css/jobs/transport.jpg";
            break;
            
            case 'Direction':
                $photo="/css/jobs/direction.jpg";
            break;
            
            case 'Service client':
                $photo="/css/jobs/service_client.jpg";
            break;
            
            case 'Comptabilité et finance':
                $photo="/css/jobs/finance.jpg";
            break;
            
            case 'Science et ingénierie':
                $photo="/css/jobs/science.jpg";
            break;
            
            case 'Activités commerciales':
                $photo="/css/jobs/activite_commerce.jpg";
            break;
            
            case 'Construction':
                $photo="/css/jobs/construction.jpg";
            break;
            
            case 'Ressources humaines':
                $photo="/css/jobs/directeur-ressources-humaines.jpg";
            break;
            
            case 'Médias, communication et rédaction':
                $photo="/css/jobs/media.jpg";
            break;
            
            case 'Administration et travail de bureau':
                $photo="/css/jobs/travail_bureau.jpg";
            break;
            
            case 'Publicité et marketing':
                $photo="/css/jobs/marketing.jpg";
            break;
            
            case 'Enseignement':
                $photo="/css/jobs/enseignement.jpg";
            break;
            
            case 'Agriculture et travail en plein air':
                $photo="/css/jobs/agriculture.jpg";
            break;

            case 'Services à la personne':
                $photo="/css/jobs/service_personne.jpg";
            break;
            

            case 'Santé':
                $photo="/css/jobs/sante.jpg";
            break;
           
            
            case 'Art, mode et design':
                $photo="/css/jobs/art_design.jpg";
            break;
           
            case 'Nettoyage et équipements':
                $photo="/css/jobs/nettoyage.jpg";
            break;
           
            case 'Services de protection':
                $photo="/css/jobs/protection.jpg";
            break;
           
            case 'Énergie et mines':
                $photo="/css/jobs/energie.jpg";
            break;
           
            case 'Bien-être animal':
                $photo="/css/jobs/bien_etre_animaux.jpg";
            break;
           
            case 'Divertissement et voyage':
                $photo="/css/jobs/voyage.jpg";
            break;
           
            case 'Juridique':
                $photo="/css/jobs/juridique.jpg";
            break;
           
            case 'Immobilier':
                $photo="/css/jobs/immobilier.jpg";
            break;

            case 'Services sociaux et org. à but non lucratif':
                $photo="/css/jobs/service_sociaux.jpg";
            break;

            case 'Sports, remise en forme et loisirs':
                $photo="/css/jobs/loisirs.jpg";
            break;

            case 'Restauration et hôtellerie':
                
                $photo="/css/jobs/restauration.jpg";
                
                break;
           
        }    

        $emploi->photo=$photo;

        $emploi->save();
        return redirect('/jobs/mes_articles')->with('msg',$msg);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Emploi  $emploi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Emploi $emploi)
    {
        (Auth::user()->lang=="fr")?$msg='article supprimé avec succés':$msg='تم حذف العرض بنجاح';
        $emploi->delete();

        return redirect('/jobs/mes_articles')->with('msg',$msg);
    }
    public function find_article($lg,Request $request)
     {
            $view="";
            ($lg=="fr")? $view="jobs.all_articles" : $view="jobs.ar_all_articles" ;

            if(strlen($request['wilaya'])>1){
                $articles = DB::table('emplois')
                ->join('users', 'emplois.publierPar_id', '=', 'users.id')
                ->select('emplois.*','users.name as publicateurName','users.Prenom as publicateurPrenom')
                ->where(function ($que) use ($request){
                    $que->where('emplois.categorie_emploi','like','%'.$request['keyword'].'%')
                    ->orWhere('emplois.description','like','%'.$request['keyword'].'%')
                    ->orWhere('emplois.emploi');
                })
                ->where(function ($q) use ($request){
                    $q->where('users.wilaya',$request['wilaya'])
                    ->orWhere('users.commune',$request['commune'])
                    ->orWhere('emplois.emploi');

                   
                })
                ->orderBy('created_at','desc')->paginate(12);        
    

            }else if($request['pos1']!=NULL){

                $articles = DB::table('emplois')
                ->join('users', 'emplois.publierPar_id', '=', 'users.id')
                ->select('emplois.*','users.name as publicateurName','users.Prenom as publicateurPrenom')
                ->where(function ($que) use ($request){
                    $que->where('emplois.categorie_emploi','like','%'.$request['keyword'].'%')
                    ->orWhere('emplois.description','like','%'.$request['keyword'].'%')
                    ->orWhere('emplois.emploi');

                })->orderBy(DB::raw('ABS((pos1 + pos2)  -'.($request['pos1']+$request['pos2']).')'))
                ->orderBy('created_at','desc')
                ->paginate(12);        
    

            }else{
                $articles = DB::table('emplois')
                ->join('users', 'emplois.publierPar_id', '=', 'users.id')
                ->select('emplois.*','users.name as publicateurName','users.Prenom as publicateurPrenom')
                ->where(function ($que) use ($request){
                    $que->where('emplois.categorie_emploi','like','%'.$request['keyword'].'%')
                    ->orWhere('emplois.description','like','%'.$request['keyword'].'%')
                    ->orWhere('emplois.emploi');

                })->orderBy('created_at','desc')
                ->paginate(12);        
    

            }
            return view($view,['articles'=>$articles]);

       
     }
     public function article_search($lg,Request $request){
        if($request['pos1']!=NULL){
           
            $articles = DB::table('emplois')
            ->join('users', 'emplois.publierPar_id', '=', 'users.id')
            ->select('emplois.*','users.name as publicateurName','users.Prenom as publicateurPrenom')
            ->where(function ($que) use ($request){
                $que->where('emplois.categorie_emploi','like','%'.$request['keyword'].'%');
            })->orderBy(DB::raw('ABS((pos1 + pos2)  -'.($request['pos1']+$request['pos2']).')'))
            ->orderBy('created_at','desc')
            ->paginate(12);
    

        }else{

            $articles = DB::table('emplois')
            ->join('users', 'emplois.publierPar_id', '=', 'users.id')
            ->select('emplois.*','users.name as publicateurName','users.Prenom as publicateurPrenom')
            ->where(function ($que) use ($request){
                $que->where('emplois.categorie_emploi','like','%'.$request['keyword'].'%');
            })->orderBy('created_at','desc')
            ->paginate(12);
    
        }
        ($lg=='fr')? $view="jobs.all_articles":$view="jobs.ar_all_articles";
        return view($view,['articles'=>$articles]);


    }

}
