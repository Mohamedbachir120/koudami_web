<!doctype html>
<html lang="fr-DZ">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="koudami">

    <title>Koudami Inscription client</title>
    <meta name="description" content="Bienvenue à la page d'inscription client  de Koudami, vous voulez améliorer votre business ? agrandir votre réseau ? allez inscrivez vous!">

    <script src="{{ asset('js/language.js')}}" defer></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('icofont/icofont.min.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Redressed&display=swap" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <a href="/"> <img src="{{ asset('images/logo.png') }}" alt="Koudami" width="70px" height="70px"></a>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item ar">
                                
                            <a class="btn btn-primary" onclick="change_lang()" id="lang" >Fr</a>

                        </li>

                        <li class="nav-item fr">
                            <a class="btn btn-primary" onclick="change_lang()" id="lang" >عربية</a>

                        </li>
                       
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link fr" href="{{ route('login') }}">Se connecter</a>
                                    <a class="nav-link ar"  href="{{ route('login') }}">الدخول</a>
                              
                                </li>
                                
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link fr" href="/register/fr">S'inscrire</a>
                                    <a class="nav-link ar" href="/register/ar">التسجيل</a>
                              
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item fr" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i>  Quitter
                                    </a>
                                    <a class="dropdown-item ar" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                    الخروج <i class="fa fa-sign-out"></i> 
                                 </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-3">
<div class="container">
    <div class="row justify-content-center px-0">
        <div class="col-lg-8 col-md-8 col-sm-12 px-2">
            <div class="card no-border shadow-sm" id="parent">
                <div class="card-header  text-light text-center d-flex flex-row justify-content-center py-2" style="background: linear-gradient(45deg,rgb(0, 0, 73),dodgerblue)">
                 <h3 class="text-light text-center"><i class="fa fa-user-plus"></i> &nbsp;Koudami Inscription  </h4>   
                </div>

                <div class="card-body " >
                    <div  id="theimage"> </div>   
                    <div class="d-flex flex-row align-items-center">
                        <div id="loadingstate"></div>
                        <div id="nonloadingstate"></div>
                        
                        <div class="text-secondary" id="state">Terminés(1/4)</div>
                    </div>
                    <form method="POST" id="registerform" action="{{ route('register') }}">
                        @csrf
                        
                        
                        <div class="card no-border shadow-sm rounded" id="first" >
                            
                            <div class="card-body">
                                <h4 class="text-left">Qui êtes vous ?</h4>

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right font-weight-bold">Identifiant</label>
        
                                    <div class="col-md-6">
                                        <input id="name" type="text" placeholder="Identifiant" class="shadow form-control no-border" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        
                                        <span id="identiferror" style="color: rgb(202, 4, 4);font-weight:bold;"></span>

                                    </div>
        
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right font-weight-bold">Email</label>
        
                                    <div class="col-md-6">
                                        <input id="email" type="email" placeholder="@Email" class="shadow form-control  no-border"  name="email" value="{{ old('email') }}" required autocomplete="email">
        
                                        
                                                <span id="emailerror" style="color: rgb(202, 4, 4);font-weight:bold;"></span>
                                                
                                                <div class="d-flex flex-row justify-content-center py-3" >
                                                    <div class="spinner-border" role="status" id="onlyspinner" >
                                                        <span class="sr-only">Loading...</span>
                                                      </div>

                                                </div>
                                    
                                    </div>
        
                                </div>
                                <div class="form-group d-flex flex-row justify-content-end">

                                    <button class="btn shadow-sm bg-primary text-light" type="button" onclick="forwardfrom('first')">
                                        Suivant  <i class="fa fa-arrow-right"></i>
                                    </button>
                                    

                                </div>
                            </div>
                        </div>
                      
                        <div class="card no-border shadow-sm rounded" id="second" >
                            <div class="card-body">
                                <h4 class="text-left">Que faites-vous ?</h4>

                                <div class="form-group row">
                                    <label for="prenom" class="col-md-4 col-form-label text-md-right">Mode d'inscription:</label>
        
                                    <div class="col-md-6">
                                        <select name="type_inscription" class="no-border shadow form-control" id="type_inscription" >
                                        <option  value="entreprise" selected>
                                            1- Entreprise 
                                         </option> 
                                       <option  value="particulier">
                                            2-  Particulier </option>     
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="categorie" class="col-md-4 col-form-label text-md-right">Votre catégorie:&nbsp;&nbsp;      </label>
                                 <div class="col-md-6">
        
                                    <select name="categorie" class="no-border shadow form-control" data-live-search="true" >
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
                                 
                                    </div> 
                                <div class="form-group row">
                                    <label for="function" class="col-md-4 col-form-label text-md-right">Votre activité:</label>
                                    <div class="col-md-6">
                                    <textarea name="function" class="form-control shadow no-border" id="function" cols="40" rows="10"></textarea>
                                    <span id="functionerror" style="color: rgb(202, 4, 4);font-weight:bold;"></span>
   
                                </div>
                                        
                                </div>  
                                <div class="form-group d-flex flex-row justify-content-between">
                                    <button  class="btn shadow-sm bg-primary text-light" type="button" onclick="backwardfrom('second')">
                                          <i class="fa fa-arrow-left"></i>  Précédent
                                    </button>

                                    <button class="btn shadow-sm bg-primary text-light" type="button" onclick="forwardfrom('second')" >
                                        Suivant  <i class="fa fa-arrow-right"></i>
                                    </button>
                                    

                                </div>
         
                          
                            </div>
                        </div>

                        <div class="card no-border shadow-sm" id="third"  >
                            <div class="card-body">
                                <h4 class="text-left">Où nous pouvons vous trouver ?</h4>

                                <div class="form-group row">
                                    <label for="wilaya" class="col-md-4 col-form-label text-md-right">Wilaya</label>
                              
                                    <div class="col-md-6">
                                     
                                <select name="wilaya" class="no-border shadow form-control" id="wilaya" required>
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
                        
                           </div>
        
                                <div class="form-group row">
                                    <label for="commune" class="col-md-4 col-form-label text-md-right">Commune</label>
                               
                                    <div class="col-md-6">
                                        <select name="commune"  id="commune" class="no-border shadow form-control" required>
                                        </select>
                                    </div>
                               
                                </div>
                                           
                              <div class="form-group row">
                                <label for="adresse" class="col-md-4 col-form-label text-md-right">Adresse</label>
                              
                                <div class="col-md-6">
                                <input id="adresse" type="text" class="no-border shadow form-control" name="adresse" placeholder="Facultatif" >
                                </div>
                               
                            </div>

                            <div class="form-group d-flex flex-row justify-content-between">
                                <button  class="btn shadow-sm bg-primary text-light" type="button" onclick="backwardfrom('third')">
                                      <i class="fa fa-arrow-left"></i>  Précédent
                                </button>

                                <button class="btn shadow-sm bg-primary text-light" type="button" onclick="forwardfrom('third')">
                                    Suivant  <i class="fa fa-arrow-right"></i>
                                </button>
                                

                            </div>

                            </div>
                        </div>
                        
                        <div class="card no-border shadow-sm" id="forth" >
                            <div class="card-body">
                                
                                <h4 class="text-left">Confidentialité !</h4>
                       
                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-sm-12 col-form-label text-md-right">Mot de passe</label>
            
                                        <div class="col-md-6 col-sm-12">
                                            <input id="password"   placeholder="8 caractéres alphanumériques" type="password" class="form-control no-border shadow" name="password" required autocomplete="new-password">
                                            <span id="passworderror" style="color: rgb(202, 4, 4);font-weight:bold;"></span>
                                            

                                        </div>
                             
                                    </div>
        
        
            
                                    <div class="form-group row">
                                        <label for="password-confirm"  class="col-md-4 col-form-label text-md-right">Confirmer votre mot de passe</label>
            
                                        <div class="col-md-6">
                                            <input id="password-confirm"  placeholder="confirmez le mot de passe" type="password" class="form-control no-border shadow" name="password_confirmation" required autocomplete="new-password">
                                            <span id="passwordconfirmerror" style="color: rgb(202, 4, 4);font-weight:bold;"></span>
                                       
                                        </div>
                         
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone_number" class="col-md-4 col-form-label text-md-right">Numéro de Téléphone</label>
            
                                        <div class="col-md-6">
                                            <input id="phone_number" placeholder="0X XX XX XX XX" type="tel"  class="form-control no-border shadow" name="phone_number" required >
                                            <span id="phonenumbererror" style="color: rgb(202, 4, 4);font-weight:bold;"></span>
                                      
                                        </div>
                           
                                    </div>
                                  
                                       
                                <div class="d-flex flex-row justify-content-between">

                                    <button  class="btn shadow-sm bg-primary text-light" type="button" onclick="backwardfrom('forth')">
                                      <i class="fa fa-arrow-left"></i>  Précédent
                                      </button>

                                    <button class="btn btn-success mx-1" type="button" onclick="forwardfrom('forth')">
                                        Terminer
                                     </button>
                                </div>   
                                
                            </div>
                        </div>
                       
                     
                      
                     
                       

                    </form>
              
                </div>
            </div>
        </div>
    </div>
</div>
</main>
</div>

<footer class="border  text-lg-start shadow-lg">
    <div class="container p-4">
      <div class="row">
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase text-light">Liens utiles</h5>
  
          <ul class="list-unstyled mb-0">
            <li>
              <a href="/" class="text-light text-decoration-none"><i class="fa fa-home"></i> Acceuil</a>
            </li>
            <li>
                <a href="/fr/our_clients" class="text-light text-decoration-none"><i class="fa fa-tasks" aria-hidden="true"></i>&nbsp; Services</a>
              </li>
             
            <li>
              <a href="#apropos" class="text-light text-decoration-none"><i class="fa fa-newspaper-o"></i>&nbsp;  A propos</a>
            </li>
            <li>
              <a href="#contact" class="text-light text-decoration-none"><i class="fa fa-archive"></i>&nbsp; Contact</a>
            </li>
            <li>
              <a href="#apropos" class="text-light text-decoration-none"><i class="fa fa-archive"></i>&nbsp; Conditions d'utilisation</a>
            </li>
          
          </ul>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase mb-0 text-light" id="contact">Contact</h5>
  
          <ul class="list-unstyled">
            <li>
                <a class="text-light text-decoration-none" href="#"><i class="fa fa-map-marker  ms-5 me-2 my-2"></i>&nbsp; &nbsp; Rue n 03 lot zemmouri chemin  des crêtes Draria - Alger</a>
            </li>
            <li>
                <a class="text-light text-decoration-none" href="#"><i class="fa fa-phone"></i>&nbsp; &nbsp; 05 61 09 04 05 / 023 35 43 43</a>
            </li>
            <li>
                <a class="text-light text-decoration-none" href="#"><i class="fa fa-envelope"></i>&nbsp; &nbsp; contact@koudami.com</a>
            </li>
            <li>
                <a class="text-light text-decoration-none" href="/"><i class="fa fa-internet-explorer"></i>&nbsp; &nbsp; koudami.com</a>
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

<style>


    #onlyspinner,#second,#third,#forth{

        display: none ;
    }
    body{
        background: white;
    }
    #theimage{
        min-height:300px;
        background: url("{{ asset('css/sign_up.jpg')}}");
        background-size:cover; 
        background-repeat: no-repeat;
        background-position: center;
        background-attachment: local;


    }
    footer{
        background: linear-gradient(45deg,rgb(1, 1, 49),dodgerblue);
    }
    .no-border{

        border: 0;
    }  
  
    .form-group{
        margin: 10px;;
    }
   
    .button{
        padding: 5px;
        background: rgb(70, 197, 255);
        border: none;
        color: white;
        font-size: 15px;
        margin: 10px;
        border-radius:5px; 
    }
    option{
        overflow-wrap: break-word;
    }
    ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
        color: rgb(8, 0, 0) !important;
        opacity: 1; /* Firefox */
        }

        #nonloadingstate{

        min-height: 6px;
        max-height: 6px;
       
       border-radius: 15px;
       background-color: transparent;
       width:75%;

        }
      #loadingstate{

        min-height: 6px;
        max-height: 6px;
       
        border-radius: 15px;
        background-color: green;
        width:25%;
        transition: width 1s linear ;
      }  


</style>

<script>




var lang=JSON.parse(localStorage.getItem('myJavaScriptObject'));
  if(lang["language"]=="ar"){
    location.replace("/register/ar");
  }

    const repassword = /(([^\s]+.+)|(.+[^\s]+)){4,}/;
    const rephone=/((\d\d\s){4,}(\d\d))|((\d\d){5,})/
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
 
 var msg="",msgidentif="",msgactivite="",passworderror="",passwordconfirmerror="",phonenumbererror="";
  function forwardfrom(value){
   
        switch (value){

            
     
            case "first": {

                if($("#name").val().trim().length > 1){
                        msgidentif="";
                        $("#identiferror").text(msgidentif);
                        if(re.test(String($("#email").val()).toLowerCase())){
                          $("#onlyspinner").show();  
                        $.ajax({
                        url: "/getmail",
                        type:"GET",
                        data:{
                        email: $("#email").val(),
                            
                    
                        },
                        success:function(response){

                            if(response.user.length == 0){
                                $("#onlyspinner").hide();  

                                msg="";
                                $("#"+value).slideToggle();
                                $("#second").slideToggle('slow'); 
                                $('#loadingstate').css('width','50%');  
                                $('#nonloadingstate').css('width','50%');
                                $('#state').text('Terminés(2/4)');
                                $("#emailerror").text(msg);        

                            }else{
                                $("#onlyspinner").hide();  

                                 msg = "cette adresse email est déja utilisée";
                                 $("#emailerror").text(msg);        


                            }

                                },
                            });
                    
                                }
                                else{

                                 msg = "Veuillez saisir une adresse email valide";
                                 $("#emailerror").text(msg);        



                                }
                            }else{
                                msgidentif="Veuillez saisir un nom valide";
                                $("#identiferror").text(msgidentif);




                            }    

                            break; 
                            
                            
                            }

            case "second":
                     if($("#function").val().trim().length > 1){
                            msgactivite="";
                            $("#functionerror").text(msgactivite);
                            $("#"+value).slideToggle();
                            $("#third").slideToggle();           
                            $('#loadingstate').css('width','75%');  
                            $('#nonloadingstate').css('width','25%'); 
                            $('#state').text('Terminés(3/4)');
                            
                        }else{
                            msgactivite="Veuillez saisir une actvité valide";
                            $("#functionerror").text(msgactivite);



                        }
                           break;

            case "third": $("#"+value).slideToggle();
                          $("#forth").slideToggle();           
                          $('#loadingstate').css('width','100%');  
                          $('#nonloadingstate').css('width','0%');
                          $('#state').text('Terminés(4/4)');
                          
                            break;
            case "forth": if(repassword.test($("#password").val())){
                                    $("#passworderror").text("");
                                    if($("#password").val() == $("#password-confirm").val()){
                                            $("#passwordconfirmerror").text("");
                                        if(rephone.test($("#phone_number").val())){
                                            $("#phonenumbererror").text("");
                                            $("#registerform").submit();


                                        }else{

                                            phonenumbererror="veuillez saisir un numéro de téléhone valide";
                                            $("#phonenumbererror").text(phonenumbererror);
                                        }
                                        



                                    }
                                    else{
                                        passwordconfirmerror="le mot de passe est sa confirmation doivent être identique";
                                        $("#passwordconfirmerror").text(passwordconfirmerror);    
                                    } 
                            }
                            else{

                            passworderror=" veuillez saisir un mot de passe valide";
                            $("#passworderror").text(passworderror);
                            
                            }                
             
             break;       
        }

    }


  

  function backwardfrom(value){
        switch (value){

            case "second":$("#"+value).slideToggle();
                          $("#first").slideToggle();           
                          $('#loadingstate').css('width','25%');  
                          $('#nonloadingstate').css('width','75%');
                          $('#state').text('Terminés(1/4)');
                          
                            break;

            case "third": $("#"+value).slideToggle();
                          $("#second").slideToggle();          
                          $('#loadingstate').css('width','50%');  
                          $('#nonloadingstate').css('width','50%'); 
                          $('#state').text('Terminés(2/4)');
                          
                           break;
             
            case "forth": $("#"+value).slideToggle();
                          $("#third").slideToggle(); 
                          $('#loadingstate').css('width','75%');  
                          $('#nonloadingstate').css('width','25%');
                          $('#state').text('Terminés(3/4)');
                          
                            break;

        }

}
$(document).ready(function(){

    
    

    $('.no-border').focus(function(){
        
       $(this).css('border',"2px solid dodgerblue");

    }
    );
    $('.no-border').focusout(function(){
        
        $(this).css('border',"0px solid blue");
 
     }
     );
    
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
 

   



    
});






function change_lang()
{

    var auth= "{{{ (Auth::user()) ? Auth::user()->name : null }}}";
   
     
    if( $("#lang").text()=="عربية")
    {
     

        var obj={
            "language":"ar",
            }
        localStorage.setItem('myJavaScriptObject', JSON.stringify(obj));
            location.reload();

        var current=window.location.pathname;


        switch(window.location.pathname){

            case '/register/ar':location.replace('/register/fr');break;
            case "/register/fr": location.replace('/register/ar');break;
            case '/fr/create_visitor':location.replace('/fr/create_visitor');break;
            case '/ar/create_visitor':location.replace('/ar/create_visitor');break;

}
         if(window.location.pathname.substring(1,3)=="ar")      
            {

                
            var chaine='/fr'+current.substring(3,current.length);
            location.replace(chaine);
            }
            else if(window.location.pathname.substring(1,3)=="fr")
            {

            var chaine='/ar'+current.substring(3,current.length);
            location.replace(chaine);
       
            }
        

        
       

        if(auth.length>0){
            
            $.ajax({
        url: "/language",
        type:"GET",
        data:{
          language:'ar',
            
       
        },
        success:function(response){
            location.reload();

        },
       });

    }

      
    }
    else if($("#lang").text()=="Fr"){
       
        


        var obj={
         "language":"fr",
         }
     
     localStorage.setItem('myJavaScriptObject', JSON.stringify(obj));    
         location.reload();

        var current=window.location.pathname;

        switch(window.location.pathname){

            case '/register/ar':location.replace('/register/fr');break;
            case "/register/fr": location.replace('/register/ar');break;
            case '/fr/create_visitor':location.replace('/fr/create_visitor');break;
            case '/ar/create_visitor':location.replace('/ar/create_visitor');break;

        }

        if(window.location.pathname.substring(1,3)=="ar")      
            {

                
            var chaine='/fr'+current.substring(3,current.length);
            location.replace(chaine);
            }
            else if(window.location.pathname.substring(1,3)=="fr")

            {

            var chaine='/ar'+current.substring(3,current.length);
            location.replace(chaine);

            }

     if(auth.length>0){
            
            $.ajax({
        url: "/language",
        type:"GET",
        data:{
          language:'fr',
            
       
        },
        success:function(response){
            location.reload();

        },
       });

    }


    }

}


</script>
