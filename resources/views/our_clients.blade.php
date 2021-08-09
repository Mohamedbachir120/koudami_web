<!DOCTYPE html>
<html lang="fr">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Koudami Services</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="icon" href="{{ asset('css/logo.png') }}" alt="koudami">
  <link href="{{ asset('icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
  rel="stylesheet">

  <meta name="author" content="koudami">
  <meta name="description" content="Besoin d'un service ,boutique,artisan,service,constructeurs,médecin,avocat,location de véhicule,traiteurs de gateux,décoration,peintre,Imagerie ,bureautique ,Froid et climatisation,Hôtellerie,Réparation auto,réparation de télèphones,Maintenance informatique,réparateur électroménager,agence de voyage ... koudami vous propose les plus proches de vous pour optimiser votre temps de recherche ">


  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
  <link rel="stylesheet" href="{{ asset('css/our.css') }}">
  <script src="{{ asset('js/language.js') }}" defer></script>
  <script src="{{ asset('js/app.js') }}" defer></script>

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

  <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

</head>

<body id="app">
 
  <nav class="navbar navbar-expand-xl navbar-light bg-white font-weight-bold shadow" id="navbar">
          
    <a class="navbar-brand"  href="/"  id="logo"> <img src="{{ asset('images/logo.png') }}" alt="Koudami" width="70px" height="70px" ></a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
   

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto row d-flex flex-row align-items-center justify-content-center ml-2">
          <li class="nav-item active">
            <a class="nav-link mr-1" href="#apropos">A propos <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item mr-1">
            <a class="nav-link" href="#contact">Contact</a>
          </li>
          <li class="nav-item mr-1">
            <a class="nav-link" href="/fr/our_clients">Services</a>
          </li>
       
          <li class="nav-item mr-1">
            <a class="nav-link" href="/fr/store/show_articles">Boutique</a>
          </li>
          <li class="nav-item mr-1">
            <a class="nav-link" href="/fr/jobs/all_articles">Recrutement</a>
          </li>
    
    
        </ul>
                  
       
        <div class="row d-flex flex-row align-items-center justify-content-center justify-content-center">

       @guest
       <a href="/login" class="nav-link animated-border-button mr-2 col-xs-2 text-dark"><i class="fa fa-user"></i> &nbsp;Connexion</a>
       <a href="/register/fr" class="nav-link animated-border-button col-xs-2 text-dark"><i class="fa fa-user-plus"></i>  &nbsp;Inscription</a>
      @endguest
       @auth
          <a href="/home" class="btn btn-primary mx-1"><i class="fa fa-home"></i>Acceuil</a>    

       @endauth
       <a class="btn  mx-2 rounded-fr"  id="lg" >عربية</a>
      </div>
      
      </div>
    </nav>
    <div id="cat" class="col-sm-12 bg-light row p-0 w-100" style="margin:0 !important;">
      <div class="col-sm-12 bg-primary">
        <button class="btn text-light" onclick="show_cat_child()"><span> Catégories </span>&nbsp; &nbsp;<i class="fa fa-list fa-xs"></i></button>   
      
      </div>
      <div id="cat_child" class="col-sm-12"  style="max-height: 400px;overflow:scroll;">

        

        <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"> <span class="material-icons md-light">language</span><a class="text-dark text-decoration-none" href="/service/Bureautique"> Bureautiques & Internet</a></div>
        <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">euro_symbol</span><a class="text-dark text-decoration-none" href="/service/Comptabilité">Comptabilité & Economie</a></div>

        <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center "><span class="material-icons md-light">engineering</span><a class="text-dark text-decoration-none" href="/service/Construction"> Construction & Travaux</a></div>
       
        <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"> <a class="text-dark text-decoration-none" href="/service/Couture"> Couture & Confection</a></div>

        <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">inventory_2</span><a class="text-dark text-decoration-none" href="/service/Décoration">  Décoration & Aménagement</a></div>

        <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">construction</span><a class="text-dark text-decoration-none" href="/service/Industrie"> Industrie & Fabrication</a></div>
       
        <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"> <span class="material-icons md-light">auto_stories</span><a class="text-dark text-decoration-none" href="/service/Ecole"> Ecole & Formations</a></div>
        <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><i class="icofont-girl-alt float-end pe-3 fs-5"></i><a class="text-dark text-decoration-none" href="/service/Esthétique"> Esthétique et Beauté</a></div>
        <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">people</span> <a class="text-dark text-decoration-none" href="/service/Evènemets">  Evènements & Divertissements</a></div>
        <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">ac_unit</span><a class="text-dark text-decoration-none" href="/service/Froid"> Froid & Climatisation</a></div>
        <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">hotel</span> <a class="text-dark text-decoration-none" href="/service/Hôtellerie">Hôtellerie</a></div>
        <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">camera</span><a class="text-dark text-decoration-none" href="/service/Image"> Image & Son</a></div>
        <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">local_printshop</span><a class="text-dark text-decoration-none" href="/service/Impression"> Impression & Edition</a></div>
        <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">sports_esports</span> <a class="text-dark text-decoration-none" href="/service/Jeux">  Jeux</a></div>
        <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">gavel</span><a class="text-dark text-decoration-none" href="/service/Juridiques"> Juridiques</a></div>
        <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">time_to_leave</span><a class="text-dark text-decoration-none" href="/service/Location">  Location de Véhicules </a></div>
        <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">computer</span><a class="text-dark text-decoration-none" href="/service/Maintenance"> Maintenance Informatique</a></div>
        <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">medication</span><a class="text-dark text-decoration-none" href="/service/Médecine"> Médecine & Santé</a></div>
        <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">carpenter</span> <a class="text-dark text-decoration-none" href="/service/Menuiserie">Menuiserie & Meubles</a></div>
        <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">park</span> <a class="text-dark text-decoration-none" href="/service/Nettoyage"> Nettoyage & Jardinage</a></div>
        <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">router</span> <a class="text-dark text-decoration-none" href="/service/Paraboles"> Paraboles & Démos</a></div>
        <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">featured_play_list</span><a class="text-dark text-decoration-none" href="/service/Projets">  Projets & Etudes</a></div>
        <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">comment</span><a class="text-dark text-decoration-none" href="/service/Publicité">  Publicité & Communication</a></div>

        <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">cake</span> <a class="text-dark text-decoration-none" href="/service/Traiteurs">Traiteurs & Gateaux</a></div>
       
       
        <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">car_repair</span><a class="text-dark text-decoration-none" href="/service/Diagnostique">  Réparation auto & Diagnostique</a></div>
        <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">build</span> <a class="text-dark text-decoration-none" href="/service/électroniques">Réparation électroniques</a></div>
        <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">kitchen</span><a class="text-dark text-decoration-none" href="/service/Réparation">     Réparation Electromnager</a></div>

        <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">security</span><a class="text-dark text-decoration-none" href="/service/Sécurité"> Sécurité & Alarme</a></div>

        <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">directions_bus</span><a class="text-dark text-decoration-none" href="/service/Transport"> Transport & Déménagement</a></div>

        
        <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">flight</span><a class="text-dark text-decoration-none" href="/service/Voyage">Voyage </a></div>               
        <div  class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">watch</span> <a class="text-dark text-decoration-none" href="/service/Accessoires">Accessoires & modes</a></div>
        <div  class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center "><span class="material-icons md-light">ice_skating</span> <a class="text-dark text-decoration-none" href="/service/Vêtements">Vêtements et chaussures</a></div>
        <div  class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">sports_soccer</span> <a class="text-dark text-decoration-none" href="/service/Sports">Sports et loisirs</a></div>
        <div  class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">receipt</span> <a class="text-dark text-decoration-none" href="/service/Divers">Divers</a></div>


    
    </div>
     
    </div>

<div class="d-flex flex-row">
  <div class="col-md-3 my-5 shadow d-none d-lg-block d-md-block border rounded p-3 shadow mb-3">
      
    <h3 class="text-center my-2 text-light bg-primary rounded py-2 font-weight-bold"><i class="fa fa-list" aria-hidden="true"></i>&nbsp; &nbsp;Services</h3>

  
    <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"> <span class="material-icons md-light">language</span><a class="text-dark text-decoration-none" href="/service/Bureautique"> Bureautiques & Internet</a></div>
    <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">euro_symbol</span><a class="text-dark text-decoration-none" href="/service/Comptabilité">Comptabilité & Economie</a></div>

    <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center "><span class="material-icons md-light">engineering</span><a class="text-dark text-decoration-none" href="/service/Construction"> Construction & Travaux</a></div>
   
    <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"> <a class="text-dark text-decoration-none" href="/service/Couture"> Couture & Confection</a></div>

    <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">inventory_2</span><a class="text-dark text-decoration-none" href="/service/Décoration">  Décoration & Aménagement</a></div>

    <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">construction</span><a class="text-dark text-decoration-none" href="/service/Industrie"> Industrie & Fabrication</a></div>
   
    <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"> <span class="material-icons md-light">auto_stories</span><a class="text-dark text-decoration-none" href="/service/Ecole"> Ecole & Formations</a></div>
    <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><i class="icofont-girl-alt float-end pe-3 fs-5"></i><a class="text-dark text-decoration-none" href="/service/Esthétique"> Esthétique et Beauté </a></div>
    <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">people</span> <a class="text-dark text-decoration-none" href="/service/Evènemets">  Evènements & Divertissements</a></div>
    <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">ac_unit</span><a class="text-dark text-decoration-none" href="/service/Froid"> Froid & Climatisation</a></div>
    <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">hotel</span> <a class="text-dark text-decoration-none" href="/service/Hôtellerie">Hôtellerie</a></div>
    <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">camera</span><a class="text-dark text-decoration-none" href="/service/Image"> Image & Son</a></div>
    <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">local_printshop</span><a class="text-dark text-decoration-none" href="/service/Impression"> Impression & Edition</a></div>
    <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">sports_esports</span> <a class="text-dark text-decoration-none" href="/service/Jeux">  Jeux</a></div>
    <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">gavel</span><a class="text-dark text-decoration-none" href="/service/Juridiques"> Juridiques</a></div>
    <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">time_to_leave</span><a class="text-dark text-decoration-none" href="/service/Location">  Location de Véhicules </a></div>
    <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">computer</span><a class="text-dark text-decoration-none" href="/service/Maintenance"> Maintenance Informatique</a></div>
    <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">medication</span><a class="text-dark text-decoration-none" href="/service/Médecine"> Médecine & Santé</a></div>
    <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">carpenter</span> <a class="text-dark text-decoration-none" href="/service/Menuiserie">Menuiserie & Meubles</a></div>
    <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">park</span> <a class="text-dark text-decoration-none" href="/service/Nettoyage"> Nettoyage & Jardinage</a></div>
    <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">router</span> <a class="text-dark text-decoration-none" href="/service/Paraboles"> Paraboles & Démos</a></div>
    <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">featured_play_list</span><a class="text-dark text-decoration-none" href="/service/Projets">  Projets & Etudes</a></div>
    <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">comment</span><a class="text-dark text-decoration-none" href="/service/Publicité">  Publicité & Communication</a></div>

    <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">cake</span> <a class="text-dark text-decoration-none" href="/service/Traiteurs">Traiteurs & Gateaux</a></div>
   
   
    <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">car_repair</span><a class="text-dark text-decoration-none" href="/service/Diagnostique">  Réparation auto & Diagnostique</a></div>
    <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">build</span> <a class="text-dark text-decoration-none" href="/service/électroniques">Réparation électroniques</a></div>
    <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">kitchen</span><a class="text-dark text-decoration-none" href="/service/Réparation">     Réparation Electromnager</a></div>

    <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">security</span><a class="text-dark text-decoration-none" href="/service/Sécurité"> Sécurité & Alarme</a></div>

    <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">directions_bus</span><a class="text-dark text-decoration-none" href="/service/Transport"> Transport & Déménagement</a></div>

    
    <div class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">flight</span><a class="text-dark text-decoration-none" href="/service/Voyage">Voyage </a></div>               
    <div  class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">watch</span> <a class="text-dark text-decoration-none" href="/service/Accessoires">Accessoires & modes</a></div>
    <div  class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center "><span class="material-icons md-light">ice_skating</span> <a class="text-dark text-decoration-none" href="/service/Vêtements">Vêtements et chaussures</a></div>
    <div  class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">sports_soccer</span> <a class="text-dark text-decoration-none" href="/service/Sports">Sports et loisirs</a></div>
    <div  class="text-center p-2 font-weight-bold mt-3 d-flex flex-row align-items-center justify-content-center"><span class="material-icons md-light">receipt</span> <a class="text-dark text-decoration-none" href="/service/Divers">Divers</a></div>



  </div>
  <div class="filter_result col-md-9 p-5">

  <div class="sub">
  <div class="mx-2">
    <div class="dropdown">
      <button class="filter dropbtn btn btn-primary" onclick="drop()"><i class="fa fa-filter"></i> Filtrer</button>
      <div id="myDropdown" class="dropdown-content">
        <a onclick="change_param_ar('gps')"><i class="fa fa-map-marker"></i> à proximité</a>
        <a onclick="change_param_ar('perso')"><i class="fa fa-hand-paper-o"></i> Recherche personalisée</a>
        <a onclick="change_param_ar('key')"><i class="fa fa-font"></i>  à l'aide des mots clés</a>
      </div>
    </div> 
   </div>
  

  <div class="param1" style="display: none;">
      <form action="/filter_by_position"> 
      @csrf   
    <div  class="row">     
      
   
      <div class="sub_sub row">
        <div>

       <select class="form-control" name="categorie" id="categorie">
          <option value="Constructions et Travaux">Constructions et Travaux</option>
          <option value="Industrie et fabrication">Industrie et fabrication</option>
          <option value="Décoration et Aménagement">Décoration et Aménagement</option>
          <option value="Traiteurs et Gateaux">Traiteurs et Gateaux</option>
          <option value="Nettoyage et jardinage">Nettoyage et jardinage</option>
          <option value="Location de véhicules">Location de véhicules</option>
          <option value="Securité et Alarme">Securité et Alarme</option>
          <option value="Menuiserie et Meubles">Menuiserie et Meubles</option>
          <option value="Hôtellerie">Hôtellerie</option>
          <option value="Esthétique et Beauté">Esthétique et Beauté</option>
          <option value="Comptabilité et Economie">Comptabilité et Economie</option>
          <option value="Maintenance et infromatique">Maintenance et infromatique</option>
          <option value="Paraboles et démos">Paraboles et démos</option>
          <option value="Réparation Electromenager">Réparation Electromenager</option>
          <option value="Juridique">Juridique</option>
          <option value="Ecoles et formations">Ecoles et formations</option>
          <option value="Transport et déménagement">Transport et déménagement</option>
          <option value="Publicité et communication">Publicité et communication</option>
          <option value="Froid et climatisation">Froid et climatisation</option>
          <option value="Médecine et santé">Médecine et santé</option>
          <option value="Réparation auto et diagnostic">Réparation auto et diagnostic</option>
          <option value="Projet et études">Projet et études</option>
          <option value="Bureautique et internet">Bureautique et internet</option>
          <option value="Impression et édition">Impression et édition</option>
          <option value="Image et son">Image et son</option>
          <option value="Couture et confection">Couture et confection</option>
          <option value="Evènement et Divertissement">Evènement et Divertissement</option>
          <option value="Réparation Electronique">Réparation Electronique</option>
          <option value="Voyage">Voyage</option>
          <option value="Jeux">Jeux</option>
          <option value="Accessoires et Modes">Accessoires et Modes</option>
          <option value="Vêtements et Chaussures">Vêtements et Chaussures </option>
          <option value="Sports et loisirs">Sports et loisirs</option>
          <option value="Divers">Divers</option>

  
      </select>
    </div>
      
      <input type="text" name="pos1" value=""  style="display: none;">
      <input type="text" name="pos2" value=""  style="display: none;">
    <div class="mx-2">

      <select class="form-control" name="byposition" id="byposition" required>
    
      <option value="à proximité"><i class="fa fa-map-marker"></i> à proximité</option>
      <option value="n'importe">n'importe quelle position</option>
     </select>
    </div>
    
     <div>
     <button  class="btn btn-primary">  <i class="fa fa-search"></i></button>
     <a href="/fr/our_clients" class="btn btn-primary"><i class="fa fa-refresh"></i></a>
    </div>
  </div>  
  
    </div>
  </form>
  
  
  </div>

  <div class="param2" style="display: none;">
    <form action="/filter_by_position"> 
    @csrf   
  <div  class="row">     
    
 
    <div class="sub_sub form-group row">
      <div>

    <select class="form-control" name="categorie" id="categorie">
        <option value="Constructions et Travaux">Constructions et Travaux</option>
        <option value="Industrie et fabrication">Industrie et fabrication</option>
        <option value="Décoration et Aménagement">Décoration et Aménagement</option>
        <option value="Traiteurs et Gateaux">Traiteurs et Gateaux</option>
        <option value="Nettoyage et jardinage">Nettoyage et jardinage</option>
        <option value="Location de véhicules">Location de véhicules</option>
        <option value="Securité et Alarme">Securité et Alarme</option>
        <option value="Menuiserie et Meubles">Menuiserie et Meubles</option>
        <option value="Hôtellerie">Hôtellerie</option>
        <option value="Esthétique et Beauté">Esthétique et Beauté</option>
        <option value="Comptabilité et Economie">Comptabilité et Economie</option>
        <option value="Maintenance et infromatique">Maintenance et infromatique</option>
        <option value="Paraboles et démos">Paraboles et démos</option>
        <option value="Réparation Electromenager">Réparation Electromenager</option>
        <option value="Juridique">Juridique</option>
        <option value="Ecoles et formations">Ecoles et formations</option>
        <option value="Transport et déménagement">Transport et déménagement</option>
        <option value="Publicité et communication">Publicité et communication</option>
        <option value="Froid et climatisation">Froid et climatisation</option>
        <option value="Médecine et santé">Médecine et santé</option>
        <option value="Réparation auto et diagnostic">Réparation auto et diagnostic</option>
        <option value="Projet et études">Projet et études</option>
        <option value="Bureautique et internet">Bureautique et internet</option>
        <option value="Impression et édition">Impression et édition</option>
        <option value="Image et son">Image et son</option>
        <option value="Couture et confection">Couture et confection</option>
        <option value="Evènement et Divertissement">Evènement et Divertissement</option>
        <option value="Réparation Electronique">Réparation Electronique</option>
        <option value="Voyage">Voyage</option>
        <option value="Jeux">Jeux</option>
        <option value="Accessoires et Modes">Accessoires et Modes</option>
        <option value="Vêtements et Chaussures">Vêtements et Chaussures </option>
        <option value="Sports et loisirs">Sports et loisirs</option>
        <option value="Divers">Divers</option>


    </select>
  </div>
<div class="mx-2">

    <select name="wilaya"  class="form-control" id="wilaya" required>
      <option value="Adrar">01  Adrar  </option> 
      <option value="Chlef">02  Chlef  </option> 
      <option value="Laghouat">03  Laghouat  </option> 
      <option value="Oum el Bouaghi">04  Oum-El- Bouaghi </option> 
      <option value="Batna">05  Batna  </option> 
      <option value="Béjaïa">06  Béjaïa  </option> 
      <option value="Biskra">07  Biskra  </option> 
      <option value="Béchar">08  Béchar  </option> 
      <option value="Blida">09  Blida  </option> 
      <option value="Bouira">10  Bouira  </option> 
      <option value="Tamanrasset">11  Tamanrasset  </option> 
      <option value="Tébessa">12  Tébessa  </option> 
      <option value="Tlemcen">13  Tlemcen  </option> 
      <option value="Tiaret">14  Tiaret  </option> 
      <option value="Tizi Ouzou">15  Tizi-Ouzou  </option> 
      <option value="Alger">16  Alger  </option> 
      <option value="Djelfa">17  Djelfa  </option> 
      <option value="Jijel">18  Jijel  </option> 
      <option value="Sétif">19  Sétif  </option> 
      <option value="Saida">20  Saida  </option> 
      <option value="Skikda">21  Skikda  </option> 
      <option value="Sidi-Bel- Abbès">22  Sidi-Bel- Abbès </option> 
      <option value="Annaba">23  Annaba  </option> 
      <option value="Guelma">24  Guelma  </option> 
      <option value="Constantine">25  Constantine  </option> 
      <option value="Médéa">26  Médéa  </option> 
      <option value="Mostaganem">27  Mostaganem  </option> 
      <option value="M'Sila">28  M'Sila  </option> 
      <option value="Mascara">29  Mascara  </option> 
      <option value="Ouargla">30  Ouargla  </option> 
      <option value="Oran">31  Oran  </option> 
      <option value="illizi">33  illizi  </option> 
      <option value="Bordj Bou Arreridj">34  Bordj-Bou- Arreridj </option> 
      <option value="Boumerdès">35  Boumerdès  </option> 
      <option value="El Tarf">36  El-Taref  </option> 
      <option value="Tindouf">37  Tindouf  </option> 
      <option value="Tissemsilt">38  Tissemsilt  </option> 
      <option value="El Oued">39  El-Oued  </option> 
      <option value="Khenchela">40  Khenchela  </option> 
      <option value="Souk Ahras">41  Souk-Ahras  </option> 
      <option value="Tipaza">42  Tipaza  </option> 
      <option value="Mila">43  Mila  </option> 
      <option value="Aïn Defla">44  Aïn-Defla  </option> 
      <option value="Naâma">45  Naâma  </option> 
      <option value="Aïn Témouchent">46  Aïn- Témouchent </option> 
      <option value="Ghardaia">47  Ghardaia  </option> 
      <option value="Relizane">48  Relizane  </option> 
      <option value="Timimoun">49 Timimoun</option>
      <option value="Bordj Badji Mokhtar">50 Bordj Badji Mokhtar</option>
      <option value="Ouled Djellal">51 Ouled Djellal</option>
      <option value="Béni Abbès">52 Béni Abbès</option>
      <option value="In Salah">53 In Salah</option>
      <option value="In Guezzam">54 In Guezzam</option>
      <option value="Touggourt">55 Touggourt</option>
      <option value="Djanet">56 Djanet</option>
      <option value="El M'Gahir">57 El M'Gahir</option>
      <option value="El Meniaa">58 El Meniaa</option>

  </select>


</div>
<div>

  <select name="commune"  class="form-control"   id="commune" required>

  </select>

</div>

  <div class="mx-2">
   <button  class="btn btn-primary" >  <i class="fa fa-search"></i></button>
   <a href="/fr/our_clients" class="btn btn-primary"><i class="fa fa-refresh"></i></a>
  </div>
  </div>  

  </div>
</form>


</div>

<form action="" hidden id="service_form" method="GET">
  @csrf
  <input type="text" name="pos1" value=""  style="display: none;">
  <input type="text" name="pos2" value=""  style="display: none;">

  <input type="submit" value="valider">
</form>

<div class="param3">
  <form action="/filter_by_position"> 
    @csrf 
    <div class="sub_sub form-group row">
      <div>
        <input type="text" class="keyword form-control" name="keyword" placeholder="mot clé">
        <input type="text" name="pos1" value=""  style="display: none;">
        <input type="text" name="pos2" value=""  style="display: none;">
         
      
      </div>
  <div class="mx-2">
   <button  class="btn btn-primary">  <i class="fa fa-search"></i></button>
   <a href="/fr/our_clients" class="btn btn-primary"><i class="fa fa-refresh"></i></a>
  </div>  
  </div>  
  </form>

</div>
</div>
  <div class="" id="corp">
  
    <div>
      <p> <strong>{{ $msg ?? '' }} </strong> </p>
      </div>
    
     
  <div class="row">
    
      
  <div v-for="user in users" class="col-lg-4 col-md-6 col-sm-6 my-3">

   <div class="col-md-12" ontouchstart="this.classList.toggle('hover');">
    <div class="container">
      <div  v-if="user.photo != 'empty' " >      
          <div class="front"  style="background-image: url({{ Storage::disk('s3')->url('profile_pics/tes22_1628454106.jpg') }}) ;">
            
              <div class="inner">
                <p>@{{ user.name }}</p>
                <span class="p-0 toggledText">
                  @{{ user.fonction }}</span>
              </div>
          </div>
    </div>
    <div v-else>

    <div  class="front"  style="background-image: url({{asset('css/avatar.png')}});">
      
      
        <div class="inner">
          <p>@{{ user.name }}</p>
          <span class="p-0 toggledText">
            @{{ user.fonction }}</span>
        </div>
      </div>
    </div>
   
      <div class="back">
        <div class="inner">
        <p> <a v-bind:href="'/fr/contact_client/'+user.id" class="btn btn-primary" target="blank"><i class="fa fa-plus"></i> Détails</a></p>
        </div>
      
    </div>
  </div>
      
     

</div>

    </div>

  </div>

    

</div>
  </div>
</div>
  
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
     
    </div>
  <div class="text-center  text-white shadow-lg" >
    © 2020 Copyright:
    <a class="text-white" href="#">Koudami.com</a>
    <p>Tous droits résérvés</p>
  </div>
</footer>        
            
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script>
  
  class User {
    constructor(id,name,fonction,photo) {
    this.id = id;
    this.name = name;
    this.fonction = fonction;
    this.photo = photo;
  }
  }
 const app = new Vue({
    el: '#corp',
    data: {
        bornInf:0,
        bornMax:18,
        users:[],
        enablescroll:true,
        isloading:false
        },
      created () {
    window.addEventListener('scroll', this.handleScroll);
    },
    destroyed () {
    window.removeEventListener('scroll', this.handleScroll);
      },
      mounted() {
        this.getusers();
        
      },
      methods: {

        handleScroll (event) {
       // Any code to be executed when the window is scrolled
       var limit = Math.max( document.body.scrollHeight, document.body.offsetHeight,document.documentElement.clientHeight, document.documentElement.scrollHeight );
            
            if(window.scrollY > 0.5 * limit && this.enablescroll == true && this.isloading == false)
              {
                this.getusers();
              }
         },
        getusers() {
          this.isloading = true;
          axios.get('/get_users_vuejs',{params:{bornInf:this.bornInf,bornMax:this.bornMax}})
                .then((response) => {

                  if(response.data.length == 0){
                    this.enablescroll = false;
                  }
                  for (var a in response.data){
                    
                   var photo = ((response.data[a])['photo'].length == 0) ? "empty" : (response.data[a])['photo'];
                  this.users.push( new User(
                        (response.data[a])['id'],
                        (response.data[a])['name'],
                        (response.data[a])['function'],
                        photo
                        
                     )); }
                 
                  this.bornInf = this.bornInf + this.bornMax;
                  this.isloading = false;
               
                })
                .catch(function (error) {
                  console.log(error);
                  this.isloading = false;
                });
         
        },
     
        
    
         

    }
   
}); 
</script>
<script>
  /*  map script*/


  function drop() {
  document.getElementById("myDropdown").classList.toggle("show");
}

  window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

  var charLimit = 20;
		
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

    function show_cat_child()
{
  $("#cat_child").toggle(500);
}


$(document).ready(function(){

 


  $('#lg').click(function(){

event.preventDefault();
var obj={
  language:'ar'
};
localStorage.setItem('myJavaScriptObject', JSON.stringify(obj));
location.replace('/ar/our_clients');

});

var tab=myMap.get("Adrar");
  var i=0;
  for(i=0;i<tab.length;i++){
    $("select#commune").append('<option value="'+tab[i]+'">'+tab[i]+'</option>');
        }
    $("select#wilaya").change(function(){
        var selectedCountry = $(this).children("option:selected").val();
        $("select#commune").empty();
        var tab=myMap.get(selectedCountry);
        var i=0;
        for(i=0;i<tab.length;i++){
         $("select#commune").append('<option value="'+tab[i]+'">'+tab[i]+'</option>');
        }

    });

    $('a').click(function(){

if($(this).parent().parent().attr('id')=="mySidebar"){
  event.preventDefault(); 
  $('#service_form').attr('action',$(this).attr('href'));
  $('#service_form').submit();



}


}); 


  });


  function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsivee";
    $('.linkdiv').css('position','relative');
    $('.icon').css('position','absolute');
  } else {
    x.className = "topnav";
    $('.linkdiv').css('position','absolute');
    $('.icon').css('position','relative');


  }
}






/* end */









/*  getting user position */
if(navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } 

function showPosition(position) {
  pos1=position.coords.latitude;
  pos2=position.coords.longitude;
  $('input[name="pos1"]').val(pos1);
  $('input[name="pos2"]').val(pos2);
  

}
/*  end */

  


  




/* drop down btn */
  




</script>
