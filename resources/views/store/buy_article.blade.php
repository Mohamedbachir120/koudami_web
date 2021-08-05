<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{ asset('js/language.js')}}" defer></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Koudami  Boutique</title>

    <link rel="icon" href="{{ asset('css/logo.png') }}">
    {{-- <link rel="stylesheet" href="{{asset('css/main.css')}}"> --}}
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <meta name="author" content="koudami">
    <meta name="description" content="Besoin de  location de véhicule,achats véhicule,Ventes immobilières,Location immobilières,Meubles,Electromenager,Jardin,Téléphones mobiles,Divers,Instruments de musique,pièces auto,traiteurs de gateux,décoration,Hôtellerie,Réparation auto... koudami vous propose les plus proches de vous pour optimiser votre temps de recherche ">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">


    <!-- Fonts -->
 
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
      <nav class="navbar navbar-expand-xl navbar-light bg-white font-weight-bold shadow" id="navbar">
          
        <a class="navbar-brand"  href="/"  id="logo"> <img src="{{ asset('images/logo.png') }}" alt="Koudami" width="70px" height="70px" ></a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
       

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto row align-items-center ml-2">
              <li class="nav-item active">
                <a class="nav-link mr-1" href="/#apropos">A propos <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item mr-1">
                <a class="nav-link" href="#contact">Contact</a>
              </li>
              <li class="nav-item mr-1">
                <a class="nav-link" href="/fr/our_clients">Services</a>
              </li>
           
              <li class="nav-item mr-1">
                <a class="nav-link" rolle="button" onclick="show_categorie();">Boutique</a>
              </li>
             
          <li class="nav-item mr-1">
                <a class="nav-link" href="/fr/jobs/all_articles">Recrutement</a>
              </li>
             
        
            </ul>
                      
           
            <div class="row align-items-center justify-content-center">

           @guest
           <a href="/login" class="nav-link animated-border-button mr-2 col-xs-2"><i class="fa fa-user"></i> &nbsp;Connexion</a>
           <a href="/register/fr" class="nav-link animated-border-button col-xs-2"><i class="fa fa-user-plus"></i>  &nbsp;Inscription</a>
          @endguest
           @auth
              <a href="/home" class="btn btn-primary mx-1"><i class="fa fa-home"></i>Acceuil</a>    

           @endauth
           <a class="btn  mx-2 rounded-fr"  id="lg" >عربية</a>
          </div>
          
          </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <article class="row">
                    <aside class="col-lg-3">
                      <div class="d-none d-lg-block border rounded p-3 shadow mb-3">
                        <h3 class="text-center my-2 text-light bg-primary rounded py-2 font-weight-bold"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp; &nbsp;Boutique </h3>
                        <ul class="rounded py-2" id="boutique_links" style="max-height: 400px; overflow-y:scroll;">
                          <p class="text-left font-weight-bold"><i class="fa fa-car"></i>&nbsp; &nbsp;Véhicules</p>
                          <li><a class="btn text-left "  href="Véhicules">Véhicules</a></li>
                          <p class="text-left font-weight-bold"><i class="fa fa-building" aria-hidden="true"></i>&nbsp; &nbsp;Immobilier</p>
                          <li><a class="btn text-left " href="Ventes immobilières">Ventes immobilières</a></li>
                          <li><a class="btn text-left " href="Locations immobilières">Locations immobilières</a></li>
                          <p class="text-left font-weight-bold"><i class="fa fa-home fa-lg"></i>&nbsp;&nbsp;Maison et jardin</h4>
                          <li><a class="btn text-left " href="Meubles">Meubles</a></li>
                          <li><a class="btn text-left " href="Pour la maison">Pour la maison</a></li>
                          <li><a class="btn text-left " href="Electroménager">Electroménager</a></li>
                          <li><a class="btn text-left " href="Outils">Outils</a></li>
                          <li><a class="btn text-left " href="Jardin">Jardin</a></li>
                          <p class="text-left font-weight-bold"><i class="fa fa-mobile fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Electronique</p>
                          <li><a class="btn text-left " href="Electronique et ordinateurs">Electronique et ordinateurs</a></li>
                          <li><a class="btn text-left " href="Téléphones mobiles">Téléphones mobiles</a></li>
                          <p class="text-left font-weight-bold"><i class="fa fa-binoculars" aria-hidden="true"></i>&nbsp; &nbsp;Petites annonces</p>
                          <li><a class="btn text-left " href="Vide-grenier">Vide-grenier</a></li>
                          <li><a class="btn text-left " href="Divers">Divers</a></li>
                          <p class="text-left font-weight-bold"><i class="fa fa-futbol-o" aria-hidden="true"></i>&nbsp; &nbsp;Loisirs</p>
                          <li><a class="btn text-left " href="Sports et activités extérieurs">Sports et activités extérieurs</a></li>
                          <li><a class="btn text-left " href="Antiquités et objets de collection">Antiquités et objets de collection</a></li>
                          <li><a class="btn text-left " href="Instruments de musique">Instruments de musique</a></li>
                          <li><a class="btn text-left " href="Artisanat d'art">Artisanat d'art</a></li>
                          <li><a class="btn text-left " href="Pièces auto">Pièces auto</a></li>
                          <li><a class="btn text-left " href="Vélos">Vélos</a></li>
                            <p class="text-left font-weight-bold"><i class="fa fa-gift" aria-hidden="true"></i>&nbsp; &nbsp;Vêtements et accessoires</p>
                          <li><a class="btn text-left " href="Vêtements et chaussures pour femmes">Vêtements et chaussures pour femmes</a></li>
                          <li><a class="btn text-left " href="Vêtements et chaussures pour hommes">Vêtements et chaussures pour hommes</a></li>
                          <li><a class="btn text-left " href="Bijoux et accessoires">Bijoux et accessoires</a></li>
                          <li><a class="btn text-left " href="Sacs et bagages">Sacs et bagages</a></li>
                          <p class="text-left font-weight-bold"><i class="fa fa-heart"></i>&nbsp; &nbsp;Famille</p>
                          <li><a class="btn text-left " href="Puériculture et enfants">Puériculture et enfants</a></li>
                          <li><a class="btn text-left " href="Santé et beauté">Santé et beauté</a></li>
                          <li><a class="btn text-left " href="Jouets et jeux">Jouets et jeux</a></li>
                          <li><a class="btn text-left " href="Fournitures pour animaux">Fournitures pour animaux</a></li>
                          <p class="text-left font-weight-bold"><i class="fa fa-gamepad"></i>&nbsp; &nbsp;Divertissements</p> 
                          <li><a class="btn text-left " href="Jeux vidéo">Jeux vidéo</a></li>
                          <li><a class="btn text-left " href="Livres,films et musique">Livres,films et musique</a></li>
                        </ul>
                      </div>
                    </aside>
                    <div class="column col-lg-9">
                         
    <div id="carouselExampleControls" class="carousel slide  rounded-3 col-sm-12" data-ride="carousel">
        <div class="carousel-inner bg-light p-1 rounded">

        <div class="carousel-item active">
            <img src="{{ Storage::disk('s3')->url($article->image) }}" class="responsive rounded" loading="lazy"  alt="koudami">
    
        </div>
        <div class="carousel-item">
            <img src="{{ Storage::disk('s3')->url($article->image2) }}" class="responsive rounded"  loading="lazy" alt="koudami">
        
            </div>
        
        <div class="carousel-item">
            <img src="{{ Storage::disk('s3')->url($article->image3) }}" class="responsive rounded"  loading="lazy"   alt="koudami">
        </div> 

    
       

    </div>
      {{-- <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a> --}}
    </div> 
               <div class="col-sm-12 my-4">
                        
    <ul class="p-0">
        <h4><i class="fa fa-tags"></i> Informations sur l'article </h4>
      <li> Article: {{ $article->nom_article }} </li>                    
      <li> Catégorie : {{ $article->categorie }} </li>
    <li> Description  : {{ $article->description }}</li>
    <li> Livraison : {{ $article->livraison }}</li> 
    <li> Prix : {{ $article->prix }}</li> 
    <li>Publié le : {{ $article->created_at}}</li>

  </ul>
    <ul class="p-0">
        <h4> <i class="fa fa-user"></i> Informations sur l'annonceur </h4>
    <li> Annonceur : {{ $article->publicateur->name }}</li>
    <li> N° Tel : {{ $article->publicateur->phone_number }} </li>
    <li> Adresse : {{ $article->publicateur->wilaya }} - {{ $article->publicateur->commune }}  </li>
    
    </ul>
</div>  

                    </div>
                </article>




            </div>
        </main>
    
    </div>
    <form action="/fr/store/article_search" hidden id="boutique_form" method="GET">
      @csrf
      <input type="text" name="pos1" value=""  style="display: none;">
      <input type="text" name="pos2" value=""  style="display: none;">
      <input type="text" name="keyword" value="" id="keyword">
      <input type="submit" value="valider">
    </form>
    <footer class="bg-dark border  text-lg-start">
        <div class="container p-4">
          <div class="row">
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
              <h5 class="text-uppercase text-light">Liens utiles</h5>
      
              <ul class="list-unstyled mb-0">
                <li>
                  <a href="/" class="text-light text-decoration-none"><i class="fa fa-home"></i> &nbsp; &nbsp; Acceuil</a>
                </li>
                <li>
                    <a href="/fr/our_clients" class="text-light text-decoration-none"><i class="fa fa-tasks" aria-hidden="true"></i>&nbsp; &nbsp; Services</a>
                  </li>
                 
                <li>
                  <a href="#apropos" class="text-light text-decoration-none"><i class="fa fa-newspaper-o"></i> &nbsp; &nbsp;A propos</a>
                </li>
                <li>
                  <a href="#contact" class="text-light text-decoration-none"><i class="fa fa-archive"></i>&nbsp; &nbsp; Contact</a>
                </li>
                <li>
                  <a href="#apropos" class="text-light text-decoration-none"><i class="fa fa-archive"></i>&nbsp; &nbsp; Conditions d'utilisation</a>
                </li>
              
              </ul>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
              <h5 class="text-uppercase mb-0 text-light" id="contact">Contact</h5>
      
              <ul class="list-unstyled">
                <li>
                    <a class="text-light text-decoration-none" href="#"><i class="fa fa-map-marker  ms-5 me-2 my-2"></i> &nbsp; &nbsp; Rue n 03 lot zemmouri chemin des crêtes Draria - Alger</a>
                </li>
                <li>
                    <a class="text-light text-decoration-none" href="#"><i class="fa fa-phone"></i>&nbsp; &nbsp; 05 61 09 04 05 / 023 35 43 43</a>
                </li>
                <li>
                    <a class="text-light text-decoration-none" href="#"><i class="fa fa-envelope"></i>&nbsp; &nbsp;contact@koudami.com</a>
                </li>
                <li>
                    <a class="text-light text-decoration-none" href="#"><i class="fa fa-internet-explorer"></i>&nbsp; &nbsp;koudami.com</a>
                </li>
              </ul>
            </div>
          
           
            </div>
            <form action="/ar/store/article_search" hidden id="boutique_form" method="GET">
              @csrf
              <input type="text" name="pos1" value=""  style="display: none;">
              <input type="text" name="pos2" value=""  style="display: none;">
              <input type="text" name="keyword" value="" id="keyword">
              <input type="submit" value="valider">
            </form>
          </div>
        <div class="text-center  text-white shadow-lg" >
          © 2020 Copyright:
          <a class="text-white" href="#">Koudami.com</a>
          <p>Tous droits résérvés</p>
        </div>
      </footer>         
</body>
</html>
<script type="text/javascript">

$(document).ready(function(){

  $('a').click(function(){

if($(this).parent().parent().attr('id')=="mySidebar"){
  event.preventDefault(); 
  $('#service_form').attr('action',$(this).attr('href'));
  $('#service_form').submit();



}else if($(this).parent().parent().attr('id')=="boutique_links"){

  event.preventDefault();
  $('#keyword').val($(this).attr('href'));
  $('#boutique_form').submit();
  

}


});

    $("select#wilaya").change(function(){
        var selectedCountry = $(this).children("option:selected").val();
        $("select#commune").empty();
        var tab=myMap.get(selectedCountry);
        var i=0;
        for(i=0;i<tab.length;i++){
         $("select#commune").append('<option value="'+tab[i]+'">'+tab[i]+'</option>');
        }

    });


});

function show_categorie(){

  $("#boutique_links").parent().toggleClass('d-none d-lg-block') ;
}

if(navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } 

function showPosition(position) {
  pos1=position.coords.latitude;
  pos2=position.coords.longitude;
  $('input[name="pos1"]').val(pos1);
  $('input[name="pos2"]').val(pos2);
  

}
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

$('#lg').click(function(){

event.preventDefault();
var obj={
  language:'ar'
};
localStorage.setItem('myJavaScriptObject', JSON.stringify(obj));
var auth="{{  Auth::user() }}";

if(auth!=""){

    $.ajax({
        url: "/language",
        type:"GET",
        data:{
          language:'ar',
            
       
        },
        success:function(response){
        
        },
       });

}

location.replace('/ar/store/buy_article/{{ $article->id }}');

});

var charLimit = 39;
		
		var numberOfToggled = document.getElementsByClassName('toggledText');
		for(i=0; i<numberOfToggled.length; i++){
			
			var el = numberOfToggled[i];
			var elText = el.innerHTML.trim();
			
			if(elText.length > charLimit){
				var showStr = elText.slice(0,charLimit);
				var hideStr = elText.slice(charLimit);
				el.innerHTML = showStr + '<span class="morePoints">...</span> <span class="trimmed">' + hideStr + '</span>';
				el.parentElement.innerHTML = el.parentElement.innerHTML + "<div class='read-more'><a href='#' class='more'></a>";
			}
			
		}
		
		window.onclick = function(event) {
			if (event.target.className == 'more') {
				event.preventDefault();
				event.target.parentElement.parentElement.classList.toggle('showAll');
			
			}
		}


</script>
<style>
    
  
  .box {
        box-shadow: 0 0 3px rgba(0, 0, 0, .3);
        position: relative;
        border-radius: 15px;
        margin-bottom: 25px;

    }
    .box:hover{
        box-shadow: 0px 0px 10px 0px lightblue;
        transform: translateY(-10px);
        transition: all .5s ease 0s


    }
    .box img {
        width: 100%;
        height: auto;
        border-radius: 15px;

    }
   
    .box .box-content {
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, .6);
        opacity: 0;
        position: absolute;
        top: 0;
        left: 0;
        transform: perspective(400px) rotateX(-90deg);
        transform-origin: center top 0;
        transition: all .5s ease 0s;
        border-radius: 15px;

    }
    
    
    .box:hover .box-content {
        opacity: 1;
        transform: perspective(400px) rotateX(0);
    }
    .box .box-content button {
        margin-top: 30%;
    margin-left: 35%;
    color: dodgerblue;
    background: white;

    }
    .box .box-content button:hover {
        box-shadow: 0px 0px 10px 2px;
    transform: translateY(-5px);
    transition: all .5s ease 0s;


    }
 
.box .price {
    border-radius: 0 15px;
    bottom: -30px;
    left: 0px;
    background: dodgerblue;
    transition: all .9s ease 0s;
    position: absolute;
    }
    
    
    
   
    @media only screen and (max-width:990px) {
        .box:hover price{
            bottom: -70px;
        }
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

  @media only screen and (max-width:800px){
    #boutique_links{
      max-height: 400px;
     overflow-y:scroll;
  
    }
   }
    .container{
   min-width: 100%;
 }
 ::-webkit-scrollbar {
  width: 5px;
  height: 5px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: rgb(2, 123, 153)  ;
}

li{
    list-style: none;
    overflow: hidden;
}
.responsive{
max-width: 100%;
max-height: 400px;
width:auto;
height:auto;

        

    }
    .nav-item:hover{
  border-bottom: 2px solid #0e71b7;
  box-shadow: 0 0.5em 0.5em -0.4em skyblue ;
  transform: translateY(-0.25em) ;
  transition: 0.25s ;

}
.nav-item:hover .nav-link{
  color:  #0e71b7 !important;

}
.animated-border-button {
  border: none;
  color: #272727;
  outline: none;
  position: relative;
}
 
.animated-border-button:after {
  border: 0 solid transparent;
  transition: all 0.3s;
  content: '';
  height: 0;
  position: absolute;
  width: 24px;
  border-bottom: 2px solid #141414;
  bottom: -4px;
  left: 0;
}

.animated-border-button:hover:after {
  width: 130px;
  color: #0e71b7;
  border-color: #0e71b7;  
}
#lang:hover{
  box-shadow: 0 0 1em 0 lightgrey;
}                     
a{
    text-decoration: none;
}

.content {
  height: 100%;
  padding: 20px 20px 10px;
}

</style>