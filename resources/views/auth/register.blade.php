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

        <main class="py-4">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-dark text-light text-center d-flex flex-row justify-content-between">
                 <h4 class="text-light"><i class="icofont-user-suited text-light"></i> &nbsp; Inscription Client </h4>   
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="prenom" class="col-md-4 col-form-label text-md-right">Mode d'inscription:</label>

                            <div class="col-md-6">
                                <select name="type_inscription" class="form-control" id="type_inscription" >
                                <option value="entreprise" selected>
                               1- Entreprise 
                                 </option> 
                               <option value="particulier">2-  Particulier </option>     
                                </select>
                        </div>
                        </div>
                  
                        <div id="entr">                      
                             <!-- <div class="form-group row" >
                                  <label for="Rc" class="col-md-4 col-form-label text-md-right">Registre de commerce:</label>

                                    <div class="col-md-6">
                                    <input id="Rc" type="text" class="form-control" name="Rc"  >
                                    </div>
                     
                                </div>
                            
                        <div class="form-group row" >
                            <label for="Nif" class="col-md-4 col-form-label text-md-right">Numéro d'identifiant fiscale:</label>

                            <div class="col-md-6">
                            <input id="Nif" type="text" class="form-control" name="Nif"  >
                            </div>
                      
                     


                        </div> -->
                      
                    </div>
                     
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Identifiant</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                     
                       

                     
                      
                        <div class="form-group row">
                            <label for="wilaya" class="col-md-4 col-form-label text-md-right">Wilaya</label>
                      
                            <div class="col-md-6">
                             
                        <select name="wilaya" class="form-control" id="wilaya" required>
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
                                <select name="commune"  id="commune" class="form-control" required>
                                </select>
                            </div>
                       
                        </div>
                                   
                      <div class="form-group row">
                        <label for="adresse" class="col-md-4 col-form-label text-md-right">Adresse</label>
                      
                        <div class="col-md-6">
                        <input id="adresse" type="text" class="form-control" name="adresse" placeholder="Facultatif" >
                        </div>
                       
                    </div>
                        <div class="form-group row">
                            <label for="categorie" class="col-md-4 col-form-label text-md-right">Votre catégorie:&nbsp;&nbsp;      </label>
                         <div class="col-md-6">

                            <select name="categorie" class="form-control" data-live-search="true" >
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
 
                            <div>
                     
                    </div>
                  
                
                    <div class="d-flex flex-column">
                       
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Mot de passe</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                     
                            </div>


    
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmer votre mot de passe</label>
    
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                 
                            </div>
                            <div class="form-group row">
                                <label for="phone_number" class="col-md-4 col-form-label text-md-right">Numéro de Téléphone</label>
    
                                <div class="col-md-6">
                                    <input id="phone_number" type="tel" pattern="[0-9]{10,}" class="form-control" name="phone_number" required >
                                </div>
                   
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
    
                            </div>
                        
                 
                            <div class="form-group row">
                                <label for="function" class="col-md-4 col-form-label text-md-right">Votre activité:</label>
                                <div class="col-md-6">
                                <textarea name="function" id="function" cols="40" rows="10"></textarea>
                                </div>
                                 
                            </div>

                               
                        <div class="form-group row" hidden>
                            <label for="type_payement" class="col-md-4 col-form-label text-md-right">Moyen de payement:</label>

                            <div class="col-md-6">
                                <select name="type_payement" class="form-control" id="type_payement">
                                    <option value="CCP" selected>1- CCP </option>
                                    <option value="Carte Edahabia">2- Carte Edahabia </option>
                                    <option value="en espèces">3- Payement en espèces </option>
                     
                                </select>
                            </div>
                   
                        </div>                     
                        <div class="form-group row" hidden>
                            <label for="Ncompte" class="col-md-4 col-form-label text-md-right">N°Compte:</label>
                            
                            <div class="col-md-6">
                            <input id="Ncompte" type="text" class="form-control" name="Ncompte" value="0000000" >
                            </div>
            
                       </div>
       
       
                            
                               
                    
                    
               

                 
                      
                        <div class="d-flex flex-row justify-content-end">
                            <button type="submit" class="btn btn-success mx-1">
                                S'inscrire
                             </button>
                      
                        </div>
                     
                    </form>
              
                </div>
            </div>
        </div>
    </div>
</div>
</main>
</div>

<footer class="bg-dark border  text-lg-start shadow-lg">
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
</style>

<script>

var lang=JSON.parse(localStorage.getItem('myJavaScriptObject'));
  if(lang["language"]=="ar"){
    location.replace("/register/ar");
  }

 



$(document).ready(function(){
    var selectedCountry = $("select#type_inscription").children("option:selected").val();
   
    if(selectedCountry=="entreprise"){

    $("#entr").show(500);
    $("#prenom").val("entreprise");

    $("#prenom").parent().parent().hide();

    }else{
        $("#entr").hide(500);

        $("#prenom").val("");
        $("#prenom").parent().parent().show();
        
    }

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
    $("select#type_inscription").change(function(){
       
        var selectedCountry = $(this).children("option:selected").val();
       
        if(selectedCountry=="entreprise"){

        $("#entr").show(500);
        $("#prenom").val("entreprise");
        $("#prenom").parent().parent().hide();
   
        }else{
            $("#entr").hide(500);
            $("#prenom").val("");

            $("#prenom").parent().parent().show();
            
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
