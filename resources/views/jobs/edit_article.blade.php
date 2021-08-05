<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title> {{ Auth::user()->name }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="icon" href="{{ asset('css/logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" integrity="sha256-Uv9BNBucvCPipKQ2NS9wYpJmi8DTOEfTA/nH2aoJALw=" crossorigin="anonymous"></script>




  </head>
  <body>
    <nav class="navbar navbar-dark sticky-top bg-primary flex-lg-nowrap p-0 shadow">
  <a class="navbar-brand  col-lg-2 mr-0 px-3" href="/">koudami</a>
  <button class="navbar-toggler position-absolute d-lg-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control  w-100 rounded" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">

      <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn text-light mt-2"><i class="fa fa-sign-out fa-lg"></i> </button>
        
    </form>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-lg-2 d-lg-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <h5 class="p-3">              <span data-feather="user"></span>          Mon Profile</h5>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="/home">
              <i class="fa fa-home"></i>
              Acceuil <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" target="_blank" href="/fr/our_clients">
              <i class="fa fa-server"></i>
              Services
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" target="_blank" href="/fr/store/show_articles">
              <i class="fa fa-shopping-cart"></i>
              Boutique
            </a>
          </li>
          <li class="nav-item">
            <button class="btn nav-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-users"></i>
              Recrutements <span class="font-weight-bold text-danger">New </span>
              </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="/fr/jobs/all_articles">Tous les offres</a>
              <a class="dropdown-item" href="/jobs/mes_articles">Mes offres</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/messagerie">
              <i class="fa fa-comment"></i>
              Messagerie
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/home/show_users/detail_user/{{ Auth::user()->id }}">
              <i class="fa fa-file"></i>
              Informations personnels
            </a>
          </li>
        </ul>

    
      
      </div>
    </nav>

    <main role="main" class="col-md-12 ml-sm-auto col-lg-10  mt-3 px-lg-5 mb-5">
<div class="card">
                <div class="card-header text-center bg-dark text-light">  
                  
                    <h4> Modifier  un offre d'emploi</h4>

                </div>
                <div class="card-body d-flex flex-column align-items-left">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('update_job',$emploi)}}" enctype="multipart/form-data" method="post" class="col-lg-8 d-flex flex-column flex-wrap p-4 shadow rounded">
                        @csrf
                       
                        <div class="form-group row align-items-center">
                            <label for="categorie_emploi">Catégorie :&nbsp;</label>
                            <div>

                            <select name="categorie_emploi" id="categorie_emploi" class="form-control">
                                <option value="{{ $emploi->categorie_emploi }}" selected>{{ $emploi->categorie_emploi }}</option>
                                <option value="Fabrication et travail en entrepôt">Fabrication et travail en entrepôt</option>
                                <option value="Vente et commerce de détail">Vente et commerce de détail</option>
                                <option value="Informatique">Informatique</option>
                                <option value="Installation, entretien et réparation ">Installation, entretien et réparation </option>
                                <option value="Transports et logistique">Transports et logistique</option>
                                <option value="Direction">Direction</option>
                                <option value="Service client">Service client</option>
                                <option value="Comptabilité et finance">Comptabilité et finance</option>
                                <option value="Science et ingénierie">Science et ingénierie</option>
                                <option value="Activités commerciales">Activités commerciales</option>
                                <option value="Construction">Construction</option>
                                <option value="Ressources humaines">Ressources humaines</option>
                                <option value="Restauration et hôtellerie">Restauration et hôtellerie</option>
                                <option value="Médias, communication et rédaction">Médias, communication et rédaction</option>
                                <option value="Administration et travail de bureau">Administration et travail de bureau</option>
                                <option value="Publicité et marketing">Publicité et marketing</option>
                                <option value="Enseignement">Enseignement</option>
                                <option value="Agriculture et travail en plein air">Agriculture et travail en plein air</option>
                                <option value="Services à la personne">Services à la personne</option>
                                <option value="Santé">Santé</option>
                                <option value="Art, mode et design">Art, mode et design</option>
                                <option value="Nettoyage et équipements">Nettoyage et équipements</option>
                                <option value="Services de protection">Services de protection</option>
                                <option value="Énergie et mines">Énergie et mines</option>
                                <option value="Bien-être animal">Bien-être animal</option>
                                <option value="Divertissement et voyage">Divertissement et voyage</option>
                                <option value="Juridique">Juridique</option>
                                <option value="Immobilier">Immobilier</option>
                                <option value="Services sociaux et org. à but non lucratif">Services sociaux et org. à but non lucratif</option>
                                <option value="Sports, remise en forme et loisirs">Sports, remise en forme et loisirs</option>
                                
                            </select>
                        </div>
                           
                        </div>
                        <div class="form-group row">
                            <label for="emploi">Emploi :&nbsp; &nbsp; &nbsp; </label>
                            <div>
                                <input type="text" name="emploi" class="form-control" value="{{ $emploi->emploi }}" id="emploi">
                    
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="salaire">Salaire :&nbsp; &nbsp; &nbsp; </label>
                            <div>
                                <input type="number" name="salaire" class="form-control" id="salaire" min="0" value="{{ $emploi->salaire }}">
                      
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="contact">contact :&nbsp;</label>
                          <div>
                          <textarea name="contact" class="form-control" id="contact" cols="30" rows="10">{{ $emploi->contact }}</textarea>  
                        
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description :&nbsp;</label>
                            <div>
                                <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{ $emploi->description }}</textarea>    
                     
                            </div>
                        </div>

                        
                        <div class="form-group d-flex flex-row justify-content-end">
                            <input type="submit" value="Confirmer" class="btn btn-success">

                        </div>
                    </form>
                      
                     

                    
                        
                </div>
            </div>
          <span  id="msg" hidden></span>
    </main>
  </div>
</div>
  </body>

          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>

function alertSpecial(msg) {
  $('#msg').html(msg);
  alert($('#msg').text());
  }



  


$(document).ready(function(){

var tab=$('body').children();

  
var v= "{{ session('msg') }}";

if(v.length > 1 ){

alertSpecial(v);
}


});

function myfunction(){
$(".ads").remove();
$('.row').show();
$('#header').show();

}


</script>
<style>
  img {
    border-radius: 50%;
  }
  img {
    border-radius: 50%;
  }
  thead,.card-header{
    text-align: center;
    background: linear-gradient(130deg,dodgerblue,blueviolet);
    color: white;
} 


          @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
     
      }
      body {
  font-size: .875rem;
}

.feather {
  width: 16px;
  height: 16px;
  vertical-align: text-bottom;
}

/*
 * Sidebar
 */
 .container{
   min-width: 100%;
 }


.sidebar {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  z-index: 100; /* Behind the navbar */
  padding: 48px 0 0; /* Height of navbar */
  box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
}

@media (max-width: 767.98px) {
  .sidebar {
    top: 5rem;
  }
  .first{
      object-fit: cover;
      width: 100%;
      height:33vh;
      border-radius: 15px;

      }
      thead{
        background: dodgerblue;
      }
}

.sidebar-sticky {
  position: relative;
  top: 0;
  height: calc(100vh - 48px);
  padding-top: .5rem;
  overflow-x: hidden;
  overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
}

@supports ((position: -webkit-sticky) or (position: sticky)) {
  .sidebar-sticky {
    position: -webkit-sticky;
    position: sticky;
  }
}

.sidebar .nav-link {
  font-weight: 500;
  color: #333;
}

.sidebar .nav-link .feather {
  margin-right: 4px;
  color: #999;
}

.sidebar .nav-link.active {
  color: #007bff;
}

.sidebar .nav-link:hover .feather,
.sidebar .nav-link.active .feather {
  color: inherit;
}

.sidebar-heading {
  font-size: .75rem;
  text-transform: uppercase;
}

/*
 * Navbar
 */

.navbar-brand {
  padding-top: .75rem;
  padding-bottom: .75rem;
  font-size: 1rem;
  box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
}

.navbar .navbar-toggler {
  top: .25rem;
  right: 1rem;
}

.navbar .form-control {
  padding: .75rem 1rem;
  border-width: 0;
  border-radius: 0;
}

.form-control-dark {
  color: #fff;
  background-color: rgba(255, 255, 255, .1);
  border-color: rgba(255, 255, 255, .1);
}

.form-control-dark:focus {
  border-color: transparent;
  box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
}
.toggledText span.trimmed{
  display:none;
}
.read-more .more:before{
  content:'Voir plus';
}
.showAll .toggledText span.morePoints{
  display:none;
}
.showAll .toggledText span.trimmed{
  display:inline;
}
.showAll .read-more .more:before{
  content:'Voir moin';
}
::-webkit-scrollbar {
    width: 12px;
}
 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
    border-radius: 5px;

}
 
::-webkit-scrollbar-thumb {
    border-radius: 5px;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
    background: dodgerblue;

}
     li{
        list-style: none;
    }
    .elem{
        padding: 5px;
        background: rgb(243, 243, 243);
        border-radius: 10px;
        margin: 5px;
     
    }

  #side_admin{
      border-radius:6px;
      padding: 0px;
      box-shadow:inset 0px 0px 2px 2px rgb(172, 225, 255) ;
  }
  @media screen and (max-width: 650px) {
  }


</style>
</html>
