<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="koudami">
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

      <form id="logout-form" class="pt-2" action="{{ route('logout') }}" method="POST">
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
                            <div class="card-header bg-dark p-3 text-light text-center">
                                <h4>Nouveau article</h4>
                            </div>
                            <div class="card-body p-3 row justify-content-center">

                          
                        <form action="/store/add_new_article" enctype="multipart/form-data" method="post" class="col-lg-8 d-flex flex-column flex-wrap p-4 shadow rounded">
                            @csrf
                        <div class="form-group row">
                        <label for="nom_article">Que publier vous ? &nbsp;</label>
                        <input type="text" name="nom_article" id="nom_article" required>
                        </div>
                        <div class="form-group row">
                            <label for="categorie">Catégorie : &nbsp;</label>
                            <select name="categorie" class="selectpicker" data-live-search="true" id="categorie">
                                <option value="Véhicules">Véhicules</option>
                                <option value="Ventes immobilières">Ventes immobilières</option>
                                <option value="Locations immobilières">Locations immobilières</option>
                                <option value="Meubles">Meubles</option>
                                <option value="Pour la maison">Pour la maison</option>
                                <option value="Electroménager">Electroménager</option>
                                <option value="Outils">Outils</option>
                                <option value="Jardin">Jardin</option>
                                <option value="Electronique et ordinateurs">Electronique et ordinateurs</option>
                                <option value="Téléphones mobiles">Téléphones mobiles</option>
                                <option value="Vide-grenier">Vide-grenier</option>
                                <option value="Divers">Divers</option>
                                <option value="Sports et activités extérieurs">Sports et activités extérieurs</option>
                                <option value="Antiquités et objets de collection">Antiquités et objets de collection</option>
                                <option value="Instruments de musique">Instruments de musique</option>
                                <option value="Artisanat d'art">Artisanat d'art</option>
                                <option value="Pièces auto">Pièces auto</option>
                                <option value="Vélos">Vélos</option>
                                <option value="Vêtements et chaussures pour femmes">Vêtements et chaussures pour femmes</option>
                                <option value="Vêtements et chaussures pour hommes">Vêtements et chaussures pour hommes</option>
                                <option value="Bijoux et accessoires">Bijoux et accessoires</option>
                                <option value="Sacs et bagages">Sacs et bagages</option>
                                <option value="Puériculture et enfants">Puériculture et enfants</option>
                                <option value="Santé et beauté">Santé et beauté</option>
                                <option value="Jouets et jeux">Jouets et jeux</option>
                                <option value="Fournitures pour animaux">Fournitures pour animaux</option>
                                <option value="Jeux vidéo">Jeux vidéo</option>
                                <option value="Livres,films et musique">Livres, films et musique</option>
                            </select>


                        </div>
                    
                        <div class="form-group row">
                            <label for="prix">Prix :&nbsp;</label>
                            <input type="number"  min="0" step="50" name="prix" id="prix" required>
                        </div>
                        <div class="form-group row">
                            <label for="description">Description d'article :&nbsp;</label>
                            <textarea name="description" id="description" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group row">
                            <label for="livraison">Livraison : &nbsp;</label>
                        <select name="livraison" id="livraison" class="selectpicker">
                            <option value="disponible">disponible</option>
                            <option value="non disponible">non disponible</option>
                        </select> 

                        </div>
                    
                    <div class="form-group row">

                    <label for="photo">L'image &nbsp;</label>
                    <input type="file" name="image" id="photo"  accept="image/*" required>
                     
                    </div>

                    <div class="form-group row">

                        <label for="photo2">L'image 2&nbsp;</label>
                        <input type="file" name="image2" id="photo2"  accept="image/*" required>
                         
                    </div>
                    <div class="form-group row">
    
                        <label for="photo3">L'image 3&nbsp;</label>
                        <input type="file" name="image3" id="photo3"  accept="image/*" required>
                         
                    </div>
                
                     <div class="d-flex flex-row justify-content-end">
                        <input type="submit" class="btn btn-success"  value="Confirmer">

                     </div>
                    
                </form>
            </div>
            </div>
                       
</main>        



   
    </div>
</div>

</body>
</html>
<script type="text/javascript">
function change_lang()
{
    var obj={
            "language":"ar",
            }
        localStorage.setItem('myJavaScriptObject', JSON.stringify(obj));
  
          $.ajax({
        url: "/language",
        type:"GET",
        data:{
          language:'ar',
            
       
        },
        success:function(response){
           if(response){
            location.reload();

           }
        
        },
       });
}

$("textarea").change(function(){
var url = $("textarea").val();
url=" "+url;
var b = url.search(/\b(?:https?:\/\/)?[^\/:]+\/.*?/);
if(b >0 ) {
alert("votre description ne doit pas contenir une URL");
$("[type=submit]").prop('disabled',true);
}
else{
    
$("[type=submit]").prop('disabled',false);


} 


});


</script>
<style>
    .container{
   min-width: 100%;
 }
 img{
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

</style>