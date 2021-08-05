<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Ad;
use DB;
use App\Models\OperationAdmin;
use App\Models\Stat;
class CommentController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public  function find_comment(Request $request){

        $ele=$request['search'];

        $comments=DB::table('comments')
        ->leftjoin('users as owner','comments.owner_id','=','owner.id')
        ->leftjoin('users as posters','comments.poster_id','=','posters.id')
        ->select(
        'comments.id',
        'comments.contenu',
        'posters.name as poster_name',
        'owner.name as owner_name',
        'comments.created_at'
        )->where('comments.contenu','like','%'.$request['search'].'%')
        ->take(100)
        ->get();
        
        
        return response()->json($comments);
}
    public function find_user(Request $request){
        $ele=$request['search'];

        $users=User::where('name','like','%'.$ele.'%')
                    ->orWhere('prenom','like','%'.$ele.'%')
                    ->orWhere('categorie','like','%'.$ele.'%')
                    ->orWhere('email','like','%'.$ele.'%')
                    ->orWhere('function','like','%'.$ele.'%')
                    ->orWhere('commune','like','%'.$ele.'%')
                    ->orWhere('wilaya','like','%'.$ele.'%')
                    ->distinct()
                    ->get();

        return response()->json($users);


    }

    public function stats($param){
        $tab=[];
        if(Auth::user()->type_compte=="admin"){
        if($param=="global"){


                $tab=DB::table('users')
                ->where('type_compte','simple')
                ->select('categorie',DB::raw('count(*) as total'))
                ->groupBy('categorie')->get();
    

        }
        else if($param=="paye"){
            $paye=new Stat();
            $non_paye=new Stat();
            $paye->categorie="payé";
            $non_paye->categorie="non payé";
            $paye->total=User::where('type_compte','simple')->where('state','actif')->count();
            $non_paye->total=User::where('type_compte','simple')->where('state','inactif')->count();
            $tab=[];
            array_push($tab,$non_paye,$paye);

        }
        else if($param=="operateur"){
            $mobilis=new Stat();
            $mobilis->categorie="mobilis";
            $mobilis->total=DB::table('users')->where('phone_number','like','06%')->count();
            
            $ooredoo=new Stat();
            $ooredoo->categorie="ooredoo";
            $ooredoo->total=DB::table('users')->where('phone_number','like','05%')->count();
            
            $djezzy=new Stat();
            $djezzy->categorie="djezzy";
            $djezzy->total=DB::table('users')->where('phone_number','like','07%')->count();
            $tab=[];
            array_push($tab,$djezzy,$ooredoo,$mobilis);

        }
        else if($param=="localisation"){
           $tab= DB::table('users')
           ->where('type_compte','simple')
           ->select('wilaya as categorie',DB::raw('count(*) as total'))
           ->groupBy('wilaya')->get();
          
        }
        else if($param=="client_nbr_viste"){
            $tab=User::where('type_compte','simple')->orderBy('nbr_visite','desc')
            ->select('name as categorie','nbr_visite as total')
            ->take(3)
            ->get();


        }
        $val=User::where('type_compte','simple')->count();
        $val*=2000;
        $users=$val;
        $ads=Ad::all()->count();

        $ads*=2000;
        $val+=$ads;
        return view('stats',['table'=>$tab,'val'=>$val,'ads'=>$ads,'users'=>$users]);
    }
    else {
        return redirect("/home");
    }


    }


    public function index()
    {
        //
        if(Auth::user()->type_compte=="admin" || Auth::user()->type_compte=="moderator")
        {
        $comments=Comment::paginate(8);
        $comments->appends(['sort' => 'created_at']);

        return view('show_comments',['comments'=>$comments]);
        }

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
    public function store(Request $request,$owner)
    {
        //
        $bad_words=['gay','سوة','ترمة','ترمتك','نمي','حتشون','طيز','زبي','نيك','viol','violée','عطاي','no9ch','3atay','9ahba','nike','sowa','zebi','nik','baiser','cul','chatte','na3tiz','pute','putin','9a7ba','tiz','terma','tremtek','m9e7ben','مقحبن'];
            
            
        $spliter=explode(' ',$request['contenu']);

        foreach($spliter as $item1 ){

            foreach($bad_words as $item2){

                if (strcasecmp($item1, $item2) == 0){

                    return redirect('/contact_client/'.$owner)->with('msg','les commentaires contenant des mots vulgaires sont strictement interdit');
                }
            }
        }

            $comment=new Comment();
            $comment->contenu=$request['contenu'];
            $comment->poster_id=Auth::user()->id;
            $comment->owner_id=$owner;
            $comment->save();
            if(Auth::user()->lang=="fr"){
            return redirect('/fr/contact_client/'.$owner);
                }
             else {
                return redirect('/ar/contact_client/'.$owner);
            

             }             

            

    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $comment=Comment::findOrFail($id);
        if(Auth::user()->type_compte=="admin" || Auth::user()->type_compte=="moderator")
        {
            $operation=new OperationAdmin();
            $operation->admin_id=Auth::user()->id;

            $operation->object="Suppression du commentaire N°".$comment->id." contenant :".$comment->contenu."\nPublié par ".$comment->poster->name." - ".$comment->poster->prenom;  
            $operation->save();



            $comment->delete();
            return redirect('/show_comments')->with('msg','commentaire supprimé avec succés');
         }
         else if(Auth::user()->id == $comment->poster->id)
         {  
            $red=$comment->owner->id; 
            $comment->delete();
            return redirect('/contact_client/'.$red);
         }   

    }
}
