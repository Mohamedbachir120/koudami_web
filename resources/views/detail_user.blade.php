@extends('layouts.moderator_admin')

@section('content')
<div class="card">
                <div class="card-header">{{ $user->name }} </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                   
                    @endif
                 
                     
                    <ul>
                        <li>Identifiant: &nbsp; {{ $user->name }}</li>
                        <li>Email:&nbsp;{{ $user->email }} </li>
                        <li>Etat:&nbsp;{{$user->state}}</li>
                        <li>Numéro de téléphone: &nbsp;{{ $user->phone_number }}</li>
                        <li>Date du prochain payement:&nbsp;{{ $user->date_valid }}</li>
                        <li>Derniére localisation:&nbsp;{{ $user->wilaya }} - {{ $user->wilaya }}</li>
                        <li>Type de payement: &nbsp;{{ $user->type_payement }}</li>
                        <li>Catégorie : &nbsp; {{ $user->categorie  }}</li>
                        <li>Fonction: &nbsp;  {{ $user->function }} </li>
                        <li>A rejoint la plateforme le:&nbsp;   {{ $user->created_at }} </li>
                        <li>N°compte: {{ $user->Ncompte }} </li>
                        <li>Type d'Abonnement :
                        @php
                            try {
                                echo($user->profile->type."</li><li> Date fin d'abonnement :".$user->profile->fin."</li>");
                            } catch (\Throwable $th) {
                                //throw $th;
                                echo("l'utilisateur ne posséde aucun abonnement");
                                
                            }
                        @endphp
                        </li>
                       
                    </ul>

                        <div class="row justify-content-center">
                            <div class="mx-1">
                                <button class="btn btn-warning" onclick="show_abonnement()"><i class="fa fa-edit"></i> Abonnement</button>
                           
                                <form class="profile p-4" action="{{ route('create_profile',$user) }}" method="POST" hidden>
                                    @csrf
                                    <div class="form-group row">
                                    <label for="type">Type Abonnement: &nbsp; </label>
                                    <select name="type" id="type" class="form-control">
                                        <option value="gold">Gold</option>
                                        <option value="silver">Silver</option>
                                        <option value="bronze">Bronze</option>
                                    </select>
                                        
                                    </div>
                                    <div class="form-group row">
                                        <label for="fin">Date fin:&nbsp;</label>
                                        <input type="date" name="fin" id="fin">
                                    </div>
                                    <div class="form-group">
                                        <input class="btn btn-primary" type="submit" value="Confirmer" >

                                    </div>

                                </form>
                            </div>
                         <div>  <a href="/modify_user_info/{{ $user->id }}" class="btn btn-success"><i class="fa fa-edit"></i> Modifier</a> &nbsp;
                         </div> 
                         @if(Auth::user()->type_compte=="admin")
                         <div>
                         <form action="{{ route('user.destroy',$user->id) }}" method="POST">
                                @csrf 
                                @method('delete')
                                <button class="btn btn-danger" onclick="return confirm('voulez vous vraiment supprimer cet utilisateur')"><i class="fa fa-eraser"></i> Supprimer </button>
                          
                              </form>
                            </div>
                           <div>
                           <a class="btn btn-dark mx-1" href="/room/{{ $user->id }}"><i class="fa fa-weixin"></i> discussion</a>       
                        </div> 
                        @elseif(Auth::user()->type_compte=="moderator")
                        <a class="btn btn-dark mx-1" href="/room/{{ $user->id }}"><i class="fa fa-weixin"></i> discussion</a>       
                        
                        @endif    
                        </div>
                      
                        </div>
                </div>
</div>
 @endsection
<style> 
li{
    list-style: none;
    letter-spacing: 1px;
    font-weight:  bold;
    color: rgb(50,50,50);
}
</style>
<script>
   function show_abonnement(){
      
    if($('.profile').attr('hidden')=="hidden") 
    $('.profile').attr('hidden',false);
    else
    $('.profile').attr('hidden',true);

   }
</script>