<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;
use App\Models\User;
use App\Models\Chatt;
use App\Events\NewMessage;
use App\Models\OperationAdmin;
class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function delete_old_messages(){
        if(Auth::user()->type_compte=="admin" ||  Auth::user()->type_compte=="moderator"){

            DB::table('chatts')
            ->where('created_at','<=',Carbon::now()->subDays(30)->toDateTimeString())
            ->delete();
            return redirect('/home')->with('msg','anciens messages supprimés avec succées');

        }

    }

    public function messagerie(){
        $user=Auth::user();
        if($user->type_compte=="simple"){

            $users=User::where('type_compte','admin')->orWhere('type_compte','moderator')->get();
            $rooms=[];
            $names=[];
            foreach ($users as $key) {
            $code=$key->id;
            
            $message=DB::table('chatts')->where([
                    ['sender_id', '=', $key->id],
                    ['receiver_id', '=', $user->id],
                ])->orWhere(
                    [
                        ['sender_id', '=', $user->id],
                        ['receiver_id', '=', $key->id],
                    ]   
                )->orderBy('id','desc')->first();
            
                $rooms[$code]=$message;  
                $names[$code]=$key->name.' '.$key->prenom;          
            }
         if($user->lang=="fr")
        {
        return view('messagerie_client',['names'=>$names,'rooms'=>$rooms]);
        }else {

            return view('ar.ar_messagerie',['names'=>$names,'rooms'=>$rooms]);
            
        }


        }

        else if($user->type_compte=="admin" || $user->type_compte=="moderator"){
           
            // $users=User::whereHas('received',function($query){ $query->where('sender_id',Auth::user()->id);})
            // ->orWhereHas('sended',function($query){ $query->where('receiver_id',Auth::user()->id);})->get();

            $users=Chatt::where('sender_id',$user->id)
            ->orWhere('receiver_id',$user->id)
            ->orderBy('created_at','desc')
            ->join('users',function($join){ $join->on('chatts.receiver_id','=','users.id')->orOn('chatts.sender_id','=','users.id'); })
            ->select('users.*')
            ->groupBy('users.id')
            ->get();



            $rooms=[];
            $names=[];
            foreach ($users as $key) {
                if($key->id != $user->id){

                    $code=$key->id;
            
                    $message=DB::table('chatts')->where([
                            ['sender_id', '=', $code],
                            ['receiver_id', '=', $user->id],
                        ])->orWhere(
                            [
                                ['sender_id', '=', $user->id],
                                ['receiver_id', '=', $code],
                            ]   
                        )->orderBy('id','desc')->first();
                    
                        $rooms[$code]=$message;  
                        $names[$code]=$key->name." ".$key->prenom; 
              
                }
                     
            }

            return view('messagerie',['names'=>$names,'rooms'=>$rooms]) ;   
        }

        
    }

    public function chatts($id){
        $sid=Auth::user()->id;
      
        $messages = DB::table('chatts')->where([
            ['sender_id', '=', $sid],
            ['receiver_id', '=', $id],
        ])->orWhere(
            [
                ['sender_id', '=', $id],
                ['receiver_id', '=', $sid],
            ]   
        )->get();

        return response()->json($messages);
    } 

    public function room($id){
        $sid=Auth::user()->id;
        $user=User::findOrFail($id);
        $messages=Chatt::where(
            ['sender_id','=',$id],
             ['receiver_id','=',$sid]
            
        );
        return view('chatt',['id'=>$id,'user'=>$user,'messages'=>$messages]);

    }

    public function send(Request $request,$id){
        $receiver=User::findOrFail($id);

        if(($receiver->type_compte!="visitor" && Auth::user()->type_compte!="visitor")){
            $sid=Auth::user()->id;
            $chatt=new Chatt();
            $chatt->body=$request['body'];
            $chatt->sender_id=$sid;
            $chatt->receiver_id=$id;
            $chatt->save();
            return $chatt->toJson();
      

        }
    

    }

    public function contact_client($lg,$id)
    {
        
        $user=User::findOrFail($id);
        if($user->state=="actif" && $user->type_compte=="simple"){
            $user->nbr_visite+=1;
            $user->save();
             if(Auth::user()){
                if(Auth::user()->lang=="fr"){

                    return view('contact_client',['user'=>$user]);

                }else{
                    return view('ar.ar_contact_client',['user'=>$user]);

                }

             }
          
                if($lg=="fr"){
                    return view('contact_client',['user'=>$user]);
                    }
                     else{
            
                     return view('ar.ar_contact_client',['user'=>$user]);
                  
                        }
                        
           
           
    
        }
        return redirect('/');
    }


    public function index()
    {
        
    /*$messages = Message::join('users','users.id','=','messages.user_id')->
    where('users.state','=','inactif')
    ->get();*/

        if(Auth::user()->type_compte=="admin" || Auth::user()->type_compte=="moderator")
        {
        $messages=Message::where('traiterPar','non traitée')->orderBy('created_at','desc')->paginate(8); 
         return view('show_messages',['messages'=>$messages]);
        }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if(Auth::user()->lang=="fr"){

            return view('create_message');
        
         } 
         else{

            return view('ar.ar_create_message');
         }
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function get_file($id)
    {   
        $file=Message::findOrFail($id);

        return Storage::url($file->contenu);

    }

    public function store(Request $request)
    {
        $ele=new Message();
     
        $ele->contenu=request()->contenu->store('uploads','public');        
        $ele->user_id=Auth::user()->id;
        $ele->save();
        
        if(Auth::user()->lang=="fr"){
        return redirect('/home')->with('msg','votre quittance a été bien reçue veuillez attendre la fin de cette procédure ,\nça peut peut prendre quelque minutes');
            }
            else {
                return redirect('/home')->with('msg',' لقد تم استقبال القسيمة بنجاح \n ستتم معالجتها من طرف الادارة الرجاء الانتظار');
      

            }
    }


    public function activer($iduser,$idarticle){

        if(Auth::user()->type_compte=="admin" || Auth::user()->type_compte=="moderator"){


        
        $user=User::findOrFail($iduser);
       
        $message=Message::where('id',$idarticle)->first();
        $message->traiterPar=Auth::user()->name.' '.Auth::user()->prenom;
        $message->save();
        
        if(Auth::user()->type_compte=="moderator")
        {
            $operation=new OperationAdmin();
            $operation->admin_id=Auth::user()->id;
            $operation->object="Activation du compte de ".$user->name." ".$user->prenom." N° quittance ".$idarticle;
            $operation->save();
        }
        
        
        $user->state="actif";
        $date=Carbon::now();
        $date->addYear();
        $user->date_valid=$date;
        $user->save();        

        return redirect('/toutes_les_quittances')->with('msg','le compte a été activé');

    }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function archive()
    {
        //
        if(Auth::user()->type_compte=="admin"){
       $messages=Message::paginate(8);
       $messages->appends(['sort' => 'created_at']);
        return view('archive_messages',['messages'=>$messages]);
        }
        else if(Auth::user()->type_compte=="simple")
        {
            $id=Auth::user()->id;
            $messages=Message::where('user_id',$id)->orderBy('created_at','desc')->paginate(8);
            if(Auth::user()->lang=="fr"){
            return view('archive_message_client',['messages'=>$messages]);
            }
            else{
                return view('ar.ar_archive_messages',['messages'=>$messages]);
                
            }
        }

        else{
            return redirect("/home");
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        
        $message=Message::findOrFail($id);
        if(Auth::user()->id == $message->user_id && $message->traiterPar=="non traitée"){
           
            return view('edit_message',['message'=>$message]);
        
        }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {   
        $message=Message::findOrFail($id);
        if(Auth::user()->id ==$message->user_id )
        {

            unlink(public_path().'/storage/'.$message->contenu);
            $file =$request->file('contenu');
            $sampleName = Auth::user()->name;
            $fileName = $sampleName . '-' . date('Y-m-d-H:i:s') . '.'.$file->getClientOriginalExtension() ;
            $message->contenu=request()->contenu->store('uploads','public');        
            $message->save();
           
            return redirect("/archive_des_quittances");
        }
        else
        {
            return redirect('/home');
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user=Auth::user();
        $message=Message::findOrFail($id);
        if(($user->id == $message->user_id && $message->traiterPar=="non traitée") || $user->type_compte=="admin")
        {
            try {
                unlink(public_path().'/storage/'.$message->contenu);
            } catch (\Throwable $th) {
                //throw $th;
            }
               
           
            $message->delete();
            return redirect('/archive_des_quittances');
        }
        else
        {
            return redirect('/home');
        }
    }
    public function all_chatts(){
        if(Auth::user()->type_compte == "admin"){
            
            $chatts=Chatt::orderBy('created_at','desc')->paginate('10');
            return view('all_chatts',['chatts'=>$chatts]);
            
        }
        else {

            return redirect('/home');
        }
    }
    public function delete_chatt($id){

        if(Auth::user()->type_compte == "admin"){
            Chatt::findOrFail($id)->delete();
            return redirect('/all_chatts')->with("msg",'message supprimé avec succés');
      
        }else{
            return redirect('/home');
        }
       
    }

    public function delete_selected(Request $request)
    {

        if(Auth::user()->type_compte=="admin"){

            $ids=$request->ids;

            Chatt::whereIn('id',$ids)->delete(); 
    
            return  response()->json(['success'=>"Elements Deleted successfully."]);
    
        }
        else{
            return redirect("/home");
        }
    }

    public  function find_message(Request $request){

        if(Auth::user()->type_compte=="admin"){
            $ele=$request['search'];

            $comments=DB::table('chatts')
            ->leftjoin('users as senders','chatts.sender_id','=','senders.id')
            ->leftjoin('users as receivers','chatts.receiver_id','=','receivers.id')
            ->select(
            'chatts.id',
            'chatts.body',
            'senders.name as sender_name',
            'receivers.name as receiver_name',
            'senders.prenom as sender_prenom',
            'receivers.prenom as receiver_prenom',
            'chatts.created_at'
            )->where('chatts.body','like','%'.$request['search'].'%')
            ->take(100)
            ->get();
            
            
            return response()->json($comments);

        }
        else{
            return redirect("/home");
        }
     
    }

}
