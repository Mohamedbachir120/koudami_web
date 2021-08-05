@extends('layouts.app')

@section('content')
<div class="container"  style="min-width:100%;">
    <div class="row">
        <div class="col-sm-3 flex-fill" id="side_admin">
        
            
            <div class="dropdown">
                <div class="ad_m">
                    <h4> Admin Menu </h4>
                </div>
                <button class="btn  dropdown-toggle admin_ele" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-users"></i>  Utilisateurs & Publicitée
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li>  <a href="{{ route('show_users') }}" class="dropdown-item">Afficher touts les utilisateurs  </a></li>
                    <li>  <a href="{{ route('show_moderators') }}" class="dropdown-item">Afficher touts les modérateurs  </a></li>
                    <li>  <a href="{{ route('show_ads') }}" class="dropdown-item">Afficher toutes les  publicitées </a></li>
                    <li><a href="/show_operations" class="dropdown-item"> Consulter l'activités des modérateurs</a> </li>
                    <li><a href="/all_chatts" class="dropdown-item">Consulter tous les messages</a> </li>
            
                </div>
              </div>

              <div class="dropdown">
                <button class="btn admin_ele dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-pie-chart" aria-hidden="true"></i>  Stats & Messagerie
                 </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a href="/messagerie" class="dropdown-item">Messagerie </a></li>
                    <li> <a href="/taux_visite/jours" class="dropdown-item">Consulter le taux de visite </a></li>
                    <li>  <a href="{{ route('index_quittance') }}" class="dropdown-item">consulter  les quittances reçues  </a></li>
                    <li>  <a href="{{ route('archive_quittance') }}" class="dropdown-item">consulter  l'archive des quittances  </a></li>
                    <li>  <a href="{{ route('show_comments') }}" class="dropdown-item">Consulter  les commentaires  </a></li>
                    <li><a href="/stats/global" class="dropdown-item">Consulter les statistiques</a></li>
                     </div>
              </div>

              <div class="dropdown">
                <button class="btn admin_ele dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-plus"></i>      Création
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li> <a href="{{ route('create_ads') }}" class="dropdown-item">Ajouter une publicitée </a></li>
                    <li> <a href="{{ route('create_moderator') }}" class="dropdown-item"> Créer un modérateur </a></li>
                         </div>
              </div>
              <div>
                <a href="/store/show_articles_admin" class="nav-link border-0"><strong><i class="fa fa-shopping-basket"></i> Gestion de la boutique</strong></a>
            </div>
              <div class="dropdown ">
                <button class="btn  dropdown-toggle admin_ele" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>  Informations personnels
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                   <a href="/detail_visitor/{{ Auth::user()->id}}" class="dropdown-item">Consulter mes informations</a>
                   <a href="/edit_password/{{ Auth::user()->id }}" class="dropdown-item">Modifier mot de passe </a>
                </div>
              </div>
             
       
           

        </div>
        <div class="col-sm-9">
            <div class="card">
                <div class="card-header bg-dark text-light text-center"><h4> {{ __('Dashboard') }}</h4> </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row"> 
                      <div class="mx-4">            
                        <img src="/css/avatar.png" alt="user" width="50px" height="50px">
                      </div>
                        <div>
           
                    <h4> Bonjour {{ Auth::user()->name }} -  {{ Auth::user()->prenom }}    </h3>   
                    <h5>Votre site a été visité <span id="number"> {{ $nbr_visite }} </span>   fois aujourd'hui</h4>
                    </div>
                    <div class="mx-4">                   
                    <a href="/fix_issues" class="btn btn-success sync m-2"> <i class="fa fa-refresh"></i> Synchroniser</a>
                        <a href="/delete_old_messages" class="btn btn-danger m-2"><i class="fa fa-eraser">Supprimer les anciens messages</i></a>
                        <button class="btn btn-primary m-2" onclick="generer()"> Générer des visites</button>
                    </div> 
                </div>
                        <table class="table table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th>Catégorie</th>
                                <th>Nombre de comptes</th>
                            </tr>
                            </thead>
                    <tbody>    
                    @foreach ($tab as $item=>$value)
                    <tr>
                    <td>{{ $item }} </td>  <td> {{ $value }} </td>
                </tr>
                    @endforeach
                    </tbody>
                </table>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
   
.ad_m
{
    text-align: center;
    min-width: 100%;
    color: rgb(70, 70, 70);
    border-radius:6px; 
}
.dropdown-menu{
    min-width: 90% !important;
    border: none !important;
 
}

img:hover {
    animation: shake 0.8s;
    animation-iteration-count: infinite;
  }
  
  @keyframes shake {
    0% { transform: translate(1px, 1px) rotate(0deg); }
    10% { transform: translate(-1px, -2px) rotate(-1deg); }
    20% { transform: translate(-3px, 0px) rotate(1deg); }
    30% { transform: translate(3px, 2px) rotate(0deg); }
    40% { transform: translate(1px, -1px) rotate(1deg); }
    50% { transform: translate(-1px, 2px) rotate(-1deg); }
    60% { transform: translate(-3px, 1px) rotate(0deg); }
    70% { transform: translate(3px, 1px) rotate(-1deg); }
    80% { transform: translate(-1px, -1px) rotate(1deg); }
    90% { transform: translate(1px, 2px) rotate(0deg); }
    100% { transform: translate(1px, -2px) rotate(-1deg); }
  }
</style>
<script>
 function generer(){

    $.ajax({
        url: "/generer_visites",
        type:"GET",
        data:{
         
       
        },
        success:function(response){
        //
         alert(response.success);   
         $("#number").text(response.new_number);
        },
       });
 }

var v="{{ session('msg') }}";

if(v.length >0){
    alert(v);
}

</script>
