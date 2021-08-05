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
    <script src="{{ asset('js/language.js') }}" defer></script>




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
        <button type="submit" class="btn text-light">Quitter</button>
        
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
                <div class="card-header">
                    <h4>Votre photo de Profile</h4>
                </div>
                <div class="card-body d-flex flex-row justify-content-center mt-5 ">

                  @if (Auth::user()->photo != NULL)
              
         <img  class="profile rounded" src="{{ Storage::disk('s3')->temporaryUrl(Auth::user()->photo, now()->addHours(5)) }}" alt="" >

                  
       
                  @else
                  <img  class="profile rounded" src="/css/avatar.png" alt="">
       
                  @endif
  
                  
              </div>
                <div class="p-3">
                  <div class=" d-flex flex-row justify-content-center">
                    <button class="btn btn-primary" onclick="show_form()"><i class="fa fa-edit"></i> Modifier</button> &nbsp;
   
                  </div>
                <div class="d-flex flex-row justify-content-center p-3" id="change_pic">
                   
                    <form action="/save_pic" enctype="multipart/form-data"  method="post">
                      @csrf
                      <label for="photo">L'image</label>
                      <input type="file" name="image" id="photo" required>
                  
                      <input type="submit" class="btn btn-success"  value="Confirmer">
                  </form>
                </div>  
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h4>Votre mot de passe</h4></div>
              <div class="card-body">
                <form method="POST" action="/update_password/{{ Auth::user()->id }}">
                        @csrf
                        <div class="form-group row">
                      
                        <label for="password" class="col-md-4 col-form-label text-md-right">Ancien mot de passe</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required >

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        </div>
                        <div class="form-group row">
                      
                        <label for="password" class="col-md-4 col-form-label text-md-right">Nouveau mot de passe</label>

                        <div class="col-md-6">
                            <input id="confirmpassword" type="password" class="form-control @error('password') is-invalid @enderror" name="confirmpassword" required >

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        </div>
                      
                        <div class="form-group row justify-content-end">
                      
                                <div class="col-md-3 offset-md-4 ">
                                    <button type="submit" class="btn btn-primary ">
                                       Valider
                                    </button>
                                </div>
                         </div>          
                </form>
                    </div>
            </div>
<div class="card">
    <div class="card-header bg-dark text-light text-center"><h4>{{ Auth::user()->name }} </h4></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                   
                    @endif
                 
                     
                    <ul>
                        <li>Identifiant: &nbsp; {{ Auth::user()->name }}</li>
                        <li>Email:&nbsp;{{ Auth::user()->email }} </li>
                        <li>Statut:&nbsp;{{Auth::user()->statut}}</li>
                        <li>Numéro de téléphone: &nbsp;{{ Auth::user()->phone_number }}</li>
                        <li>Derniére localisation:&nbsp;{{ Auth::user()->wilaya }} - {{ Auth::user()->wilaya }}</li>
                        <li>Catégorie : &nbsp; {{ Auth::user()->categorie  }}</li>
                        <li>Fonction: &nbsp;  {{ Auth::user()->function }} </li>
                        <li>A rejoint la plateforme le:&nbsp;   {{ Auth::user()->created_at }} </li>
                       
                    </ul>

                        <div class="row justify-content-center">
                         <div> 
                           
                          <button class="btn btn-primary" onclick="show_form2()"><i class="fa fa-edit"></i> Modifier</button> &nbsp;
                       
                       
                        </div> 
                       
                        </div>
                        <div id="change_info" class="border rounded p-4 m-3">
                          <form method="POST"  action="/update_user/{{ Auth::user()->id }}">
                            @csrf
    
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Nom</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ Auth::user()->name }}" name="name"  autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
      
                         
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}"  autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone_number" class="col-md-4 col-form-label text-md-right">Numéro de Téléphone</label>
    
                                <div class="col-md-6">
                                    <input id="phone_number" type="tel" pattern="[0-9]{10,}" class="form-control" value="{{ Auth::user()->phone_number }}" name="phone_number"  >
                                </div>
                            </div>
                         
                            <div class="form-group row">
                                <label for="categorie" class="col-md-4 col-form-label text-md-right">Votre catégorie:</label>
                                 <select name="categorie" class="selectpicker" id="categorie">
                                 <option value="{{ Auth::user()->categorie}}" selected>{{ Auth::user()->categorie}}</option>
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
                         
                                </select>  
                                </div>                        
    
                      
                            
                                <div class="form-group row">
                                    <label for="function" class="col-md-4 col-form-label text-md-right">L'activité:</label>                   
                                <textarea name="function" id="function" placeholder="Example : Soudeur , Maçon , peintre , Vendeur , Comptable , Avocat ..." list="functions" cols="30" rows="10">
                                    {{ Auth::user()->function }}
                                </textarea>
    
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
                                
                                <div class="form-group row">
                                    <label for="wilaya" class="col-md-4 col-form-label text-md-right">Wilaya</label>
                              
                                    <div class="col-md-6">
                                     
                                <select name="wilaya" class="form-control" id="wilaya" required>
                                    <option value="{{ Auth::user()->wilaya }}" selected> {{ Auth::user()->wilaya }}</option>
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
                                <select name="commune"  id="commune"  required>
                                    <option value="{{ Auth::user()->commune }}" selected> {{ Auth::user()->commune }}</option>
    
                                </select>
                            </div>
                       
                        </div>
                                <div class="form-group row" hidden>
                                    <label for="Ncompte" class="col-md-4 col-form-label text-md-right">N°Compte:</label>
                                    
                                    <div class="col-md-6">
                                    <input id="Ncompte" type="text" class="form-control" name="Ncompte" value="0000000" >
                                    </div>
                    
                               </div>
    
                           <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="submit">
                                 Valider
                                </button>
                            </div>
                        </div>               
                    
                        
    
                        </form>  
                        </div>
                      
                        </div>
                </div>
</div>


 
    </main>
  </div>
</div>

</body>
<script>



$(document).ready(function(){

var tab=myMap.get(document.getElementById("wilaya").value);
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
function  show_form(){

$('#change_pic').css('visibility')=="hidden"? $('#change_pic').css('visibility','visible'):$('#change_pic').css('visibility','hidden');
window.scrollTo({ top: 200, behavior: 'smooth' });
  
}
function show_form2(){
$('#change_info').css('visibility')=="hidden"? $('#change_info').css('visibility','visible'):$('#change_info').css('visibility','hidden');
$('#change_info').toggle();
window.scrollTo({ top: 1000, behavior: 'smooth' });

}
</script>
<style>
#change_info,#change_pic{
  visibility: hidden;
  display: none;
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
img{
  max-width: 100%;
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
</html>