<!doctype html>
<html lang="fr-DZ">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Koudami</title>
    <meta name="author" content="koudami">
    <meta name="description" content="koudami est la première platforme numérique en Algérie qui offre à ses utilisateurs une variété de services à proximité de leur position de manière  facile et rapide grâce à la géolocalisation et ceci dans divers secteurs d'activités .Notre objectif consiste à vous aider à construire votre réseau professionel et par la suite permettre à d'autre membres en recherche de vos competences de vous contacter pour  un offre de service , un emploi,  ventes,  achats......">
    <meta name="google-site-verification" content="JNc-tYme45XaU5d1i2dl4YgbUYRc5D8ziY9S131kdV8" />
    
  
    <!-- Scripts -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ asset('js/language.js')}}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
   
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
    rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('css/logo.png') }}" alt="koudami logo">

</head>
<body>

 
    <div id="app" class="bg-white">
     

            <!-- side bar -->

           
            <div id="mySidebar" class="sidebar d-flex flex-column  text-light">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

                  <div class="col d-flex flex-column text-center my-2"> <span class="material-icons md-light">language</span><a class=" text-light   text-decoration-none" href="/service/Bureautique"> Bureautiques & Internet</a></div>
                  <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">euro_symbol</span><a class=" text-light   text-decoration-none" href="/service/Comptabilité">Comptabilité & Economie</a></div>

                  <div class="col d-flex flex-column text-center mb-2 "><span class="material-icons md-light">engineering</span><a class=" text-light   text-decoration-none" href="/service/Construction"> Construction & Travaux</a></div>
                 
                  <div class="col d-flex flex-column text-center my-2"> <a class=" text-light   text-decoration-none" href="/service/Couture"> Couture & Confection</a></div>

                  <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">inventory_2</span><a class=" text-light   text-decoration-none" href="/service/Décoration">  Décoration & Aménagement</a></div>

                  <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">construction</span><a class=" text-light   text-decoration-none" href="/service/Industrie"> Industrie & Fabrication</a></div>
                 
                  <div class="col d-flex flex-column text-center my-2"> <span class="material-icons md-light">auto_stories</span><a class=" text-light   text-decoration-none" href="/service/Ecole"> Ecole & Formations</a></div>
                  <div class="col d-flex flex-column text-center my-2"><i class="icofont-girl-alt float-end pe-3 fs-5"></i><a class=" text-light   text-decoration-none" href="/service/Esthétique"> Esthétiques & Beauté</a></div>
                  <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">people</span> <a class=" text-light   text-decoration-none" href="/service/Evènemets">  Evènements & Divertissements</a></div>
                  <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">ac_unit</span><a class=" text-light   text-decoration-none" href="/service/Froid"> Froid & Climatisation</a></div>
                  <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">hotel</span> <a class=" text-light   text-decoration-none" href="/service/Hôtellerie">Hôtellerie</a></div>
                  <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">camera</span><a class=" text-light   text-decoration-none" href="/service/Image"> Image & Son</a></div>
                  <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">local_printshop</span><a class=" text-light   text-decoration-none" href="/service/Impression"> Impression & Edition</a></div>
                  <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">sports_esports</span> <a class=" text-light   text-decoration-none" href="/service/Jeux">  Jeux</a></div>
                  <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">gavel</span><a class=" text-light   text-decoration-none" href="/service/Juridiques"> Juridiques</a></div>
                  <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">time_to_leave</span><a class=" text-light   text-decoration-none" href="/service/Location">  Location de Véhicules </a></div>
                  <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">computer</span><a class=" text-light   text-decoration-none" href="/service/Maintenance"> Maintenance Informatique</a></div>
                  <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">medication</span><a class=" text-light   text-decoration-none" href="/service/Médecine"> Médecine & Santé</a></div>
                  <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">carpenter</span> <a class=" text-light   text-decoration-none" href="/service/Menuiserie">Menuiserie & Meubles</a></div>
                  <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">park</span> <a class=" text-light   text-decoration-none" href="/service/Nettoyage"> Nettoyage & Jardinage</a></div>
                  <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">router</span> <a class=" text-light   text-decoration-none" href="/service/Paraboles"> Paraboles & Démos</a></div>
                  <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">featured_play_list</span><a class=" text-light   text-decoration-none" href="/service/Projets">  Projets & Etudes</a></div>
                  <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">comment</span><a class=" text-light   text-decoration-none" href="/service/Publicité">  Publicité & Communication</a></div>

                  <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">cake</span> <a class=" text-light   text-decoration-none" href="/service/Traiteurs">Traiteurs & Gateaux</a></div>
                 
                 
                  <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">car_repair</span><a class=" text-light   text-decoration-none" href="/service/Diagnostique">  Réparation auto & Diagnostique</a></div>
                  <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">build</span> <a class=" text-light   text-decoration-none" href="/service/électroniques">Réparation électroniques</a></div>
                  <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">kitchen</span><a class=" text-light   text-decoration-none" href="/service/Réparation">     Réparation Electromnager</a></div>

                  <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">security</span><a class=" text-light   text-decoration-none" href="/service/Sécurité"> Sécurité & Alarme</a></div>

                  <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">directions_bus</span><a class=" text-light   text-decoration-none" href="/service/Transport"> Transport & Déménagement</a></div>

                  
                  <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">flight</span><a class=" text-light   text-decoration-none" href="/service/Voyage">Voyage </a></div>               
                  <div  class="col d-flex flex-column text-center  mt-3 "><span class="material-icons md-light">watch</span> <a class=" text-light   text-decoration-none" href="/service/Accessoires">Accessoires & modes</a></div>
                  <div  class="col d-flex flex-column text-center  mt-3 "><span class="material-icons md-light">ice_skating</span> <a class=" text-light   text-decoration-none" href="/service/Vêtements">Vêtements et chaussures</a></div>
                  <div  class="col d-flex flex-column text-center  mt-3 "><span class="material-icons md-light">sports_soccer</span> <a class=" text-light   text-decoration-none" href="/service/Sports">Sports et loisirs</a></div>
                  <div  class="col d-flex flex-column text-center  mt-3 "><span class="material-icons md-light">receipt</span> <a class=" text-light   text-decoration-none" href="/service/Divers">Divers</a></div>

      
          
          </div>
          <form action="" hidden id="service_form" method="GET">
            @csrf
            <input type="text" name="pos1" value=""  style="display: none;">
            <input type="text" name="pos2" value=""  style="display: none;">
 
            <input type="submit" value="valider">
          </form>
          <form action="/fr/store/article_search" hidden id="boutique_form" method="GET">
            @csrf
            <input type="text" name="pos1" value=""  style="display: none;">
            <input type="text" name="pos2" value=""  style="display: none;">
            <input type="text" name="keyword" value="" id="keyword">
            <input type="submit" value="valider">
          </form>


           <!-- end of the sidebar --> 




<!-- nav bar -->


        <nav class="navbar navbar-expand-xl navbar-light bg-white font-weight-bold shadow" id="navbar">
          
          <a class="navbar-brand"  href="/fr/our_clients"  id="logo"> <img src="{{ asset('images/logo.png') }}" alt="Koudami logo" width="70px" height="70px" ></a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
         

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto row align-items-center ml-2">
                <li class="nav-item active">
                  <a class="nav-link mr-1" href="#apropos">A propos <span class="sr-only">(current)</span></a>

                </li>
                <li class="nav-item mr-1">
                  <a class="nav-link" href="#contact">Contact</a>
                </li>
                <li class="nav-item mr-1">
                  <a class="nav-link" role="button" onclick="openNav();">Services</a>
                </li>
             
                <li class="nav-item mr-1">
                  <a class="nav-link" href="/fr/store/show_articles">Boutique</a>
                </li>
                <li class="nav-item mr-1">
                  <a class="nav-link" href="/fr/jobs/all_articles">Recrutement</a>
                </li>
                <li class="ml-2">
                  <form class="form-inline my-2 my-lg-0"  action="/filter_by_position" method="get">
                    @csrf
                    <input type="text" name="pos1" value=""  style="display: none;">
                    <input type="text" name="pos2" value=""  style="display: none;">    
                    
                    <div class="recherche input-group mb-3 rounded mt-2">
                      <div class="input-group-append">
                        <button class="input-group-text rounded-left" id="basic-addon2"><i class="fa fa-search"></i></button>
                      </div>
                      <input type="text" class="form-control" name="keyword" placeholder="Recherche ..."  aria-describedby="basic-addon2">

                    </div>
                    <style>
                      
                    </style>
              
                   
                  </form>
                         
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

<!--  end of the navbar -->

        <main class="column">
          


         
          <div class="d-flex flex-row flex-wrap mt-5">

            <div class="col-md-3 border rounded p-3 shadow">
              <h3 class="text-center my-2 text-light bg-primary rounded py-2 font-weight-bold"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp; &nbsp;Boutique </h3>
              <ul class="rounded py-2"style="max-height: 400px; overflow-y:scroll;" id="boutique_links">
                <p class="text-left font-weight-bold"><i class="fa fa-car"></i>&nbsp; &nbsp;Véhicules</p>
                <li><a class="btn text-left nav-link "  href="Véhicules">Véhicules</a></li>
                <p class="text-left font-weight-bold"><i class="fa fa-building" aria-hidden="true"></i>&nbsp; &nbsp;Immobilier</p>
                <li><a class="btn text-left nav-link " href="Ventes immobilières">Ventes immobilières</a></li>
                <li><a class="btn text-left nav-link " href="Locations immobilières">Locations immobilières</a></li>
                <p class="text-left font-weight-bold"><i class="fa fa-home fa-lg"></i>&nbsp;&nbsp;Maison et jardin</h4>
                <li><a class="btn text-left nav-link " href="Meubles">Meubles</a></li>
                <li><a class="btn text-left nav-link " href="Pour la maison">Pour la maison</a></li>
                <li><a class="btn text-left nav-link " href="Electroménager">Electroménager</a></li>
                <li><a class="btn text-left nav-link " href="Outils">Outils</a></li>
                <li><a class="btn text-left nav-link " href="Jardin">Jardin</a></li>
                <p class="text-left font-weight-bold"><i class="fa fa-mobile fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Electronique</p>
                <li><a class="btn text-left nav-link " href="Electronique et ordinateurs">Electronique et ordinateurs</a></li>
                <li><a class="btn text-left nav-link " href="Téléphones mobiles">Téléphones mobiles</a></li>
                <p class="text-left font-weight-bold"><i class="fa fa-binoculars" aria-hidden="true"></i>&nbsp; &nbsp;Petites annonces</p>
                <li><a class="btn text-left nav-link " href="Vide-grenier">Vide-grenier</a></li>
                <li><a class="btn text-left nav-link " href="Divers">Divers</a></li>
                <p class="text-left font-weight-bold"><i class="fa fa-futbol-o" aria-hidden="true"></i>&nbsp; &nbsp;Loisirs</p>
                <li><a class="btn text-left nav-link " href="Sports et activités extérieurs">Sports et activités extérieurs</a></li>
                <li><a class="btn text-left nav-link " href="Antiquités et objets de collection">Antiquités et objets de collection</a></li>
                <li><a class="btn text-left nav-link " href="Instruments de musique">Instruments de musique</a></li>
                <li><a class="btn text-left nav-link " href="Artisanat d'art">Artisanat d'art</a></li>
                <li><a class="btn text-left nav-link " href="Pièces auto">Pièces auto</a></li>
                <li><a class="btn text-left nav-link " href="Vélos">Vélos</a></li>
                  <p class="text-left font-weight-bold"><i class="fa fa-gift" aria-hidden="true"></i>&nbsp; &nbsp;Vêtements et accessoires</p>
                <li><a class="btn text-left nav-link " href="Vêtements et chaussures pour femmes">Vêtements et chaussures pour femmes</a></li>
                <li><a class="btn text-left nav-link " href="Vêtements et chaussures pour hommes">Vêtements et chaussures pour hommes</a></li>
                <li><a class="btn text-left nav-link " href="Bijoux et accessoires">Bijoux et accessoires</a></li>
                <li><a class="btn text-left nav-link " href="Sacs et bagages">Sacs et bagages</a></li>
                <p class="text-left font-weight-bold"><i class="fa fa-heart"></i>&nbsp; &nbsp;Famille</p>
                <li><a class="btn text-left nav-link " href="Puériculture et enfants">Puériculture et enfants</a></li>
                <li><a class="btn text-left nav-link " href="Santé et beauté">Santé et beauté</a></li>
                <li><a class="btn text-left nav-link " href="Jouets et jeux">Jouets et jeux</a></li>
                <li><a class="btn text-left nav-link " href="Fournitures pour animaux">Fournitures pour animaux</a></li>
                <p class="text-left font-weight-bold"><i class="fa fa-gamepad"></i>&nbsp; &nbsp;Divertissements</p> 
                <li><a class="btn text-left nav-link " href="Jeux vidéo">Jeux vidéo</a></li>
                <li><a class="btn text-left nav-link " href="Livres,films et musique">Livres,films et musique</a></li>
              </ul>
         
            </div>
            <div class="column col-sm-12 col-md-7">
              

              <div id="carouselExampleControls" class="carousel slide  rounded-3" data-ride="carousel">
                <div class="carousel-inner bg-light p-1 rounded">

                  @foreach ($ads as $item)
                @if ($loop->first)
                <div class="carousel-item active">
                  <a href="{{ $item->link }}"  target="_blank">
                    <img src="{{ Storage::disk('s3')->url( $item->contenu) }}" width="600" height="300" class="responsive border   rounded" loading="lazy" data-bs-interval="2000" alt="koudami ads">   
                    </a>
                  </div>
               
                @endif
                @break
               @endforeach
                
              
                @foreach ($ads as $item)
                @if ($item != $loop->first)
                <div class="carousel-item">
                  <a href="{{ $item->link }}"  target="_blank">
                    <img src="{{ Storage::disk('s3')->url( $item->contenu ) }}" width="600" height="300" class="responsive border   rounded" loading="lazy" data-bs-interval="2000" alt="koudami ads">   
                    </a>
                  </div>
                 @endif
                
                

                @endforeach
              
                
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon   p-3 rounded-circle" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon  p-3 rounded-circle" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div> 
                <div class="flex-fill d-flex flex-row justify-content-center px-4">
                
                  

              
                
                
                 </div>
                 <div class="landing-part row align-items-center justify-content-center" >
                  <div class="landing-text col-xs-12 col-md-6 row align-items-center justify-content-center ">
                    <div class="slogan  text-justify">
                    <h1 class="text-center mb-3">KOUDAMI</h1>
                    <h3 class="text-center"> <strong> #Koulech Kodamek ! </strong></h3>              
                    <div class="text-center"><a href="/fr/store/show_articles" class="btn btn-danger"> <i class="fa fa-shopping-cart mr-2"></i> GO shopping</a></div> 
                  </div>
                  </div>
                  
        
                </div>

                 

            </div>          
            


            <div class="d-none d-md-block  column  col-md-2">

              
               
              @foreach ($ads as $item)
              <a href="{{ $item->link }}" target="_blank">

              <img src="{{ Storage::disk('s3')->url( $item->contenu ) }}" width="600" height="400" loading="lazy"  class="rounded border responsive my-1" alt="koudami ads">
              </a>                  
              @endforeach
              </div>  
            
            

        </div>
      
        <div class="mt-2 bg-white flex-fill  text-center rounded shadow" id="apropos">
          <div class="col-sm-12  p-5 row flex-wrap">

       
         <div class="col-sm-12 col-lg-3 d-flex flex-row align-items-center justify-content-center" id="apropos_titre">
           <h2 class="text-dark text-center" >A PROPOS</h2>
         
         </div>
         <br>
        <p style="line-height: 200%;" class="col-sm-12 col-lg-9 text-dark text-justify p-3 font-weight-bold">
           &nbsp; &nbsp; C'est la première plateforme numérique en Algérie qui offre à ses utilisateurs une variété de services à proximité de leur position de manière  facile et rapide grâce à la géolocalisation et ceci dans divers secteurs d'activités .
           <br>
           &nbsp; &nbsp; Notre objectif consiste à vous aider à construire votre réseau professionnel et par la suite permettre à d'autre membres en recherche de vos competences de vous contacter pour  une offre de service , un emploi,  ventes,  achats......

         </p>
       </div>
         
   </div>
      <div>
        <h3 class="mt-5 text-center">NOS&nbsp;&nbsp;CLIENTS</h3>

        </div> 
        <div class="d-flex flex-row justify-content-around flex-wrap container-nos-clients  mt-4">
          @foreach ($users as $item)

          <div class="hexagon" >
            <div class="shape">
              @if($item->photo == NULL)
              <a href="/fr/contact_client/{{ $item->id }}" target="_blank" >  <img class="" src="{{ asset('css/avatar.png')}}" width="80px" id="user_img" height="80px"  alt="{{ $item->categorie }}"></a>
               @else
               <a href="/fr/contact_client/{{ $item->id }}" target="_blank" >  <img class="" src="{{ Storage::disk('s3')->url($item->photo) }}" width="80px" id="user_img" height="80px"  alt="{{ $item->categorie }}"></a>
               
               @endif               
                <div class="content">
                    <div>
                      <li> {{ $item->name }} {{ $item->prenom }} </li> 
                      <li> {{ $item->email }}  </li> 
                      <li> {{ $item->categorie }} </li> 
                      <li> {{ $item->phone_number}} </li>      
                     </div>
                </div>
            </div>
        </div>

      
          @endforeach
         
        
        </div>

<footer class="bg-dark  text-lg-start">
    <div class="container p-4">
      <div class="row">
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase text-light">Liens utiles</h5>
  
          <ul class="list-unstyled mb-0">
            <li>
              <a href="/" class="text-light text-decoration-none"><i class="fa fa-home"></i>&nbsp; &nbsp;   Acceuil</a>
            </li>
            <li>
                <a href="/fr/our_clients" class="text-light text-decoration-none"><i class="fa fa-tasks" aria-hidden="true"></i>&nbsp; &nbsp;   Services</a>
              </li>
             
            <li>
              <a href="#apropos" class="text-light text-decoration-none"><i class="fa fa-newspaper-o"></i>&nbsp; &nbsp;  A propos</a>
            </li>
            <li>
              <a href="#contact" class="text-light text-decoration-none"><i class="fa fa-archive"></i>&nbsp; &nbsp; Contact</a>
            </li>
            <li>
              <a href="/fr/conditions_utilisation" class="text-light text-decoration-none"><i class="fa fa-archive"></i>&nbsp; &nbsp; Conditions d'utilisation</a>
            </li>
          
          </ul>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase mb-2 text-light" id="contact">Contact</h5>
  
          <ul class="list-unstyled">
            <li class="d-flex flex-row">
               <span class="text-light mr-3"><i class="fa fa-map-marker  ms-5 me-2 mb-2"></i></span><span class="text-light" style="font-size:0.9rem !important;">Rue n 03 lot zemmouri chemin  des crêtes Draria - Alger</span>
            </li>
            <li>
                <a class="text-light text-decoration-none" href="#"><i class="fa fa-phone"></i>&nbsp; &nbsp; 05 61 09 04 05 / 023 35 43 43 </a>
            </li>
            <li >
                <a class="text-light text-decoration-none" href="#"><i class="fa fa-envelope"></i>&nbsp; &nbsp;contact@koudami.com</a>
            </li>
            <li>
                <a class="text-light text-decoration-none" href="/"><i class="fa fa-internet-explorer"></i>&nbsp; &nbsp;koudami.com</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
          <h5 class="text-uppercase text-light">Notre siége</h5>

          <iframe class="responsive rounded" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12794.787399563726!2d2.9881538!3d36.705822!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x466c815d673fe26b!2z2YLYp9i52Kkg2KfZhNit2YHZhNin2Kog2KfZhNmC2YXZhSBTYWxsZSBkZXMgZsOqdGVzIExlcyBDcsOqdGVz!5e0!3m2!1sfr!2sdz!4v1608743579926!5m2!1sfr!2sdz" width="500" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" loading="lazy" tabindex="0"></iframe>
        </div>
       
       
        </div>
      </div>
    <div class="text-center p-1 text-light" style="background-color: rgba(0, 0, 0, 0.2)">
      © 2020 Copyright:
      <a class="text-light" href="#">Koudami.com</a>
      <p>Tous droits résérvés</p>
    </div>
  </footer>
                









        </main>
    </div>
</body>
</html>
<script>
  
  $('#lg').click(function(){

event.preventDefault();
var obj={
  language:'ar'
};
localStorage.setItem('myJavaScriptObject', JSON.stringify(obj));
var auth="{{ Auth::user() }}"
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
location.replace('/ar');

});
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

if(navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } 

function showPosition(position) {
  pos1=position.coords.latitude;
  pos2=position.coords.longitude;
  $('input[name="pos1"]').val(pos1);
  $('input[name="pos2"]').val(pos2);
  

}

 

$("#open_side").click(function(){

  openNav();
});

var myIndex = 0;




</script>

<style>
  #boutique_links li{
    transition: all 1s;
  }
  #boutique_links li:hover{
    margin: 5px;
    padding: 7px;
    border-radius: 13px;
    background:#1E90FF;

  }
  #boutique_links li:hover a{
    color: white;
    font-weight: bold;
  }

  body{
 font-family: 'Montserrat', sans-serif !important;

  }

 p{
  font-size: 16px !important;
  letter-spacing: 1px;
}

.landing-part{
              width: 100%;
              height: 40vh;
             
            }
            .landing-text{
              width: 50%;
            }
  

 


.container-nos-clients{
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
    }
 footer{
   background: #141414 !important;
 }  
.hexagon{
        position: relative;
        width: 250px;
        height: 250px;
        margin: 50px 20px 70px !important;
    }
     .hexagon::before{
       content: '';
       position: absolute;
       bottom: 0;
       width: 100%;
       height: 100%;
       background:none;
       border-radius: 50%;
       transition: 0.5s;
    }
    
     .hexagon:hover::before{
      opacity: 0.8;
      transform: scale(1);
    }
    
     .hexagon .shape{
        position: absolute;
        top: 0;
        left: 0%;
        width:100%;
        height: 100%;
        background: none;
        clip-path: circle(50% at 50% 50%);
        transition: 0.5s;
    }
     .hexagon:hover .shape{
     transform: translateY(-30px);
    }
     .hexagon .shape img{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    }
     .hexagon .shape .content {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
        text-align: center;
        background:linear-gradient(45deg , #03a9f4,rgba(3,169,244,0.5)) ;
        color: #fff;
        opacity: 0;
        transition: 0.5s;
    }
     .hexagon .shape .content h2{
        margin-bottom: 25px;
    }
     .hexagon:hover .shape .content{
        opacity: 1;
    }

 .closebtn {
  position: absolute;
  top: 0px;
  right: 0px;
  font-size: 60px;
}

@media screen and (max-height: 450px) {
  
 .closebtn {
  font-size: 40px;
  top: 15px;
  right: 35px;
  }
  #open_menu{
    font-size: 20px;
  }
}



  @media only screen and (min-width: 800px) {

    #apropos  p{

      border-left:3px solid #1271b7 !important;
    }
    


  }
   
  *{
    scroll-behavior: smooth;

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

.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}


.sidebar {
  height: 100%; /* 100% Full-height */
  width: 0; /* 0 width - change this with JavaScript */
  position: fixed; /* Stay in place */
  z-index: 10; /* Stay on top */
  top: 0;
  left: 0;
  background-color: rgb(36, 36, 36); /* Black*/
  overflow-x: hidden; /* Disable horizontal scroll */
  padding-top: 60px; /* Place content 60px from the top */
  transition: 0.5s; /* 0.5 second transition effect to slide in the sidebar */
}
.sidebar i{
  font-size: 30px !important;
  
}

#main {
  transition: margin-left .5s; /* If you want a transition effect */
  padding: 20px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}


.responsive{
    width: 100%;
    max-height: 400px;
    height: auto;    
    }

 


.ads{
   
    display: flex;
    flex-direction: row;    
    justify-content: center;
}

li{
  list-style: none;
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

#basic-addon2{
  background: dodgerblue;
  color: white;
  outline: none ;
}
   .recherche{
      outline: none ;

                      }
                      .recherche input{
                        box-shadow: none !important; 
                      }
                      .recherche:hover{
                        box-shadow: 0 0 6px 3px  skyblue ;
                        transition: 0.25s ;
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

</style>
