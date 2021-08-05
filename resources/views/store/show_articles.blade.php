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
                <a class="nav-link mr-1" href="#apropos">A propos <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item mr-1">
                <a class="nav-link" href="#contact">Contact</a>
              </li>
              <li class="nav-item mr-1">
                <a class="nav-link" href="/fr/our_clients">Services</a>
              </li>
           
              <li class="nav-item mr-1">
                <a class="nav-link" href="#">Boutique</a>
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
        <div id="cat" class="col-sm-12 bg-light row p-0 w-100" style="margin:0 !important;">
          <div class="col-sm-12 bg-primary">
            <button class="btn text-light" onclick="show_cat_child()"><span> Catégories </span>&nbsp; &nbsp;<i class="fa fa-list fa-xs"></i></button>   
          
          </div>
          <div id="cat_child" class="col-sm-12">

          <ul class="rounded py-3 px-2" id="boutique_links">
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
         
        </div>

        <main class="py-4">
            <div class="container">
                
                  <div class="column">
                    <div class="col-sm-12">

                        <form action="/fr/store/find_article" method="GET" class="row  justify-content-center align-items-center">
                            @csrf
                       
                        <div class="form-group col-sm-3">
                            
                            
                        <input type="text" list="categories" class="form-control" name="keyword" id="categorie" placeholder="recherche" required>

                            <datalist id="categories" >
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
                            </datalist>
                        </div>
                        <div class="col-sm-2 col-md-1">
                            <p>
                                <a class="btn btn-dark" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fa fa-plus"></i>
                                </a>
                               
                            </p>
                           
                        </div>
                            <div class="collapse form-group row col-sm-5 col-md-5"   id="collapseExample">
                                <div class="col-sm-6">
                                    <select name="wilaya" class="form-control" id="wilaya">
                                        <option value=""> wilaya </option>
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
                                        <option value="Abbès">23  Abbès   </option> 
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
                              <div class="col-sm-6">

                                <select name="commune"  id="commune" class="form-control">
                            <option value="" > commune </option>
                                </select>
                            
                            </div>
                             
                            </div>
    
                            <input type="text" name="pos1" value=""  style="display: none;">
                            <input type="text" name="pos2" value=""  style="display: none;">
                 
                        <div class="form-group row col-sm-3 col-md-2">
                            <button class="btn btn-primary">
                                <i class="fa fa-search"></i>
                            </button>
                            <a class="btn btn-dark ml-1" href="/fr/store/show_articles">
                                <i class="fa fa-refresh">

                                </i>
                            </a>
                        </div>

                        </form>

                    </div>
                    <article class="row">
                      <aside class="col-lg-3">
                        <div class="d-none d-lg-block border rounded p-3 shadow mb-3">
                          <h3 class="text-center my-2 text-light bg-primary rounded py-2 font-weight-bold"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp; &nbsp;Boutique </h3>
                          <ul class="rounded py-2" id="boutique_links">
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
                    <div id="articles" class="col-lg-9">

                    <div class="row justify-content-between px-3">
                   @foreach ($articles as $item)
                   <div class=" col-xs-12 col-sm-6 col-md-6 col-lg-4 column p-2" style="background: none !important ;">
                        <div class="box p-0">
                          

                         
                                {{-- <img src="{{ Storage::disk('s3')->url($item->image) }}" class="" loading="lazy"    alt="koudami"> --}}
                        
                        <div class="price  text-white col-6 pt-2">
                              <h5>{{ $item->prix}} DA</h5>
                         </div>             
                          <div class="box-content">
                          <a class="btn p-2 col-4 " href="/fr/store/buy_article/{{ $item->id }}" target="blank">Détails</a>
                          </div>
                      
                          
                        </div>
                      <h5 class="toggledText" title="{{ $item->nom_article }}">{{ $item->nom_article}}</h5>

                      </div>
                   @endforeach
                        



                    </div>
                    
                
                
                
                
                
                </div>
              </article>
              {{ $articles->links() }}

                       
            </div>





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
 
  


  

function show_cat_child()
{
  $("#cat_child").toggle(500);
}

$(document).ready(function(){

  var currentLocation = window.location;
  const str = ''+currentLocation;

  var tab = str.split('/');
  if(tab[tab.length-1] != "show_articles"){
  var artilces = {!! $articles2 !!}
  
  var categorie = artilces;
  var parent_property = {
        'background':'dodgerblue',
        'padding':'7px',
        'margin':'10px',
        'border-radius':'13px'
       };
   var child_property = {
    'color':'white',
    'font-weight':'bold'
   };    
    var elements = $('#boutique_links a').toArray();

    elements.forEach(element => {

     var text = $(element).text();
     if(text.includes(categorie)){
       

      $(element).parent().css(parent_property);
      $(element).css(child_property);

     }
      
    });
  }

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

location.replace('/ar/store/show_articles');

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
  .responsive{
    width: 78%;
    max-height: 400px;
    height: auto;    
    }
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
        object-fit: cover;
          width: 100%;
          height: 33vh;
          border-radius: 15px;
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
    .box .box-content a {
        margin-top: 30%;
    margin-left: 35%;
    color: dodgerblue;
    background: white;

    }
    .box .box-content a:hover {
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
    
    
    #cat,#cat_child{
      display: none;
    }
   
    @media only screen and (max-width:990px) {
        .box:hover price{
            bottom: -70px;
        }
        #cat{
          display: block;
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
 img{
     border-radius: 50%;
 }
li{
    list-style: none;
    overflow: hidden;
}
.responsive{
    width: 100%;
    max-height: 200px;
    height: auto;  
    border-radius:5px;   
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

#articles    .row-flex {
  display: flex;
  flex-wrap: wrap;
}


/* vertical spacing between columns */

#articles [class*="col-"] {
  margin-bottom: 30px;
}

.content {
  height: 100%;
  padding: 20px 20px 10px;
}

</style>