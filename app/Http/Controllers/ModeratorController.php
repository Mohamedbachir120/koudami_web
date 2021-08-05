<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class ModeratorController extends Controller
{
    //

    public function show_moderators(){
        if(Auth::user()->type_compte=="admin")
        {
            $moderators=User::where('type_compte','moderator')->get();
            return view('show_moderators',['moderators'=>$moderators]);
        }
    }    
    public function moderator_detail($id){
        if(Auth::user()->type_compte=="admin" || Auth::user()->id==$id)
        {
            $mod=User::findOrFail($id);
            return view('detail_moderator',['mod'=>$mod]);
        }

    }

    public function create_moderator(){
        if(Auth::user()->type_compte=="admin")
        {

            return view('create_moderator');
        }
        else
        {
            return redirect('/home');
        }

    }

    public function edit_moderator($id)
    {
        if(Auth::user()->type_compte=="admin" || Auth::user()->id ==$id)
        {
            $mod=User::findOrFail($id);

            return view('update_moderator',['id'=>$id,'mod'=>$mod]);
          
        }
    }

    public function update_moderator(Request $request,$id){
        if(Auth::user()->type_compte=="admin" || Auth::user()->id == $id)
        {
      
        $user=User::findOrFail($id);
        $user->name=$request['name'];
        $user->prenom=$request['prenom'];
        $user->email=$request['email'];
        if($request['password']!=NULL)
        {
        $user->password=Hash::make($request['password']);
        }
        $user->phone_number=$request['phone_number'];
        $user->save();
        return redirect('/detail_moderator/'.$id);
    }
    else {

        return redirect('/home');
    }
    }    

    public function store_moderator (Request $request)
    {
        if(Auth::user()->type_compte=="admin")
        {

        $date = Carbon::now();   
        $user= new User();
        $user->name=$request['name'];
        $user->prenom=$request['prenom'];
        $user->email=$request['email'];
        $user->password=Hash::make($request['password']);
        $user->phone_number=$request['phone_number'];
        $user->email_verified_at=$date;
        $user->wilaya="wilaya";
        $user->state='actif';
        $user->commune="commune";
        $user->function="moderator";
        $user->type_compte="moderator";
        $user->type_inscription="moderator";
        $user->type_payement="type";
        $user->Ncompte="Ncompte";
        $user->save();
        return redirect('/show_moderators');
 
    }   
    else
     {
        return redirect('/home');  
     }
}

    public function destroy_moderator($id)
    {
        if(Auth::user()->type_compte=="admin")
        {

            $mod=User::findOrFail($id);
            $mod->delete();
            return redirect('/show_moderators');  
       
        }   
        else
         {
            return redirect('/home');  
         }

        }


 
}
