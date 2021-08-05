<!doctype html>
<html lang="fr-DZ">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="koudami">

    <title>Koudami Connexion</title>
    <meta name="description" content="Bienvenue à la page de connexion  de Koudami, connectez vous et profiter de nombreux services!">

    <script src="{{ asset('js/language.js')}}" defer></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
                <a class="navbar-brand ar" href="{{ url('/') }}">
                    <a href="/" id="home_link"> <img src="{{ asset('images/logo.png') }}" alt="Koudami" width="70px" height="70px"></a>
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

        <main class="py-4 bg-white">
            <div class="container" class="fr">
                <div class="row justify-content-start" id="content">
                    <div class="card col-md-6">
                        <div class="text-dark mt-3 mb-3">
                         
                            <div class="d-flex flex-column align-items-center flex-wrap text-center p-2">
                                <h1 class="text-primary fr connexion">Bienvenue à Koudami </h1>
                                <h1 class="text-primary ar connexion">اهلا بكم في قدامي</h1>
            
                               
                                <form method="POST" action="{{ route('login') }}" class="mt-3 flex-fill">
                                    @csrf
                                    <h2 class="fr p-2">Connexion</h2>
                                    <h2 class="ar p-2">تسجيل الدخول</h2>
                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right fr">Email</label>
                                        
                                        <div class="col-md-8">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <label for="email" class="col-md-4 col-form-label text-md-left ar">البريد الالكتروني</label>
            
                                    </div>

                                    <div>
                                      <input type="text" name="lg" id="lg" hidden>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right fr">Mot de passe</label>
                                    
                                        <div class="col-md-8">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <label for="password" class="col-md-4 col-form-label text-md-left ar">كلمة السر</label>
            
                                    </div>
                                   
                                    <div class="form-group row">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            
                                                <label class="form-check-label fr" for="remember">
                                                    Resté connecté 
                                                </label>
            
                                                <label class="form-check-label ar"  for="remember">
                                                    تذكرني في المرة القادمة                                    </label>
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary fr">
                                                Connexion
                                            </button>
                                            <button type="submit" class="btn btn-primary ar" >
                                                الدخول
                                            </button>
            
                                            @if (Route::has('password.request'))
                                            <a class="btn btn-link ar" href="{{ route('password.request') }}" >
                                                نسيت كلمة السر
                                            </a>
                                
                                            <a class="btn btn-link fr" href="{{ route('password.request') }}">
                                                Mot de passe oublié
                                                </a>
                                            @endif
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

<footer class="bg-dark border  text-lg-start shadow-lg fr">
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
                <a class="text-light text-decoration-none" href="#"><i class="fa fa-map-marker  ms-5 me-2 my-2"></i>&nbsp; Rue n 03 lot zemmouri chemin  des crêtes Draria - Alger</a>
            </li>
            <li>
                <a class="text-light text-decoration-none" href="#"><i class="fa fa-phone"></i>&nbsp;05 61 09 04 05 / 023 35 43 43</a>
            </li>
            <li>
                <a class="text-light text-decoration-none" href="#"><i class="fa fa-envelope"></i>&nbsp;contact@koudami.com</a>
            </li>
            <li>
                <a class="text-light text-decoration-none" href="/"><i class="fa fa-internet-explorer"></i>&nbsp;koudami.com</a>
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

<footer class="bg-dark border  text-lg-start shadow-lg ar">
    <div class="container p-4">
      <div class="row text-right justify-content-end">
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase text-light">روابط مهمة</h5>
  
          <ul class="list-unstyled mb-0">
            <li>
              <a href="/" class="text-light text-decoration-none">  الصفحة الرئيسية <i class="fa fa-home"></i></a>
            </li>
            <li>
                <a href="/fr/our_clients" class="text-light text-decoration-none"> الخدمات&nbsp;<i class="fa fa-tasks" aria-hidden="true"></i></a>
              </li>
             
            <li>
              <a href="#apropos" class="text-light text-decoration-none">  مؤسستنا&nbsp;<i class="fa fa-newspaper-o"></i></a>
            </li>
            <li>
              <a href="#contact" class="text-light text-decoration-none"> اتصل بنا&nbsp;<i class="fa fa-archive"></i></a>
            </li>
            <li>
              <a href="#apropos" class="text-light text-decoration-none"> شروط الاستخدام&nbsp;<i class="fa fa-archive"></i></a>
            </li>
          
          </ul>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase mb-0 text-light" id="contact">اتصل بنا</h5>
  
          <ul class="list-unstyled">
            <li>
                <a class="text-light text-decoration-none" href="#"><i class="fa fa-map-marker  ms-5 me-2 my-2"></i>&nbsp; &nbsp; رقم 03 تجزئة زموري طريق القمم درارية الجزائر</a>
            </li>
            <li>
                <a class="text-light text-decoration-none" href="#"><i class="fa fa-phone"></i>&nbsp; &nbsp; 05 61 09 04 05 / 023 35 43 43</a>
            </li>
            <li>
                <a class="text-light text-decoration-none" href="#"><i class="fa fa-envelope"></i>&nbsp; &nbsp; contact@koudami.com</a>
            </li>
            <li>
                <a class="text-light text-decoration-none" href="/ar"><i class="fa fa-internet-explorer"></i>&nbsp; &nbsp; koudami.com</a>
            </li>
          </ul>
        </div>
      
       
        </div>
      </div>
    <div class="text-center  text-white shadow-lg" >
      © 2020 Copyright:
      <a class="text-white" href="#">Koudami.com</a>
      <p>جميع الحقوق محفوظة
    </p>
    </div>
  </footer>
         
</body>
</html>
<style>
 
 body{

font-family: 'Montserrat', sans-serif !important;

 }
    @media (min-width:650px){

        #content{
    background: url('css/login_2.jpg');
    background-position: 90% 100%;
    background-size: 50% 90%;
    background-repeat:no-repeat; 
    


 }
 .card{
     background:none !important;
     border:none !important;

 }
    

    }  
      @media (max-width:650px){
        #content{
    background: url('css/login_2.jpg');
    background-position:center;
    background-size: cover;
    background-repeat:no-repeat; 
    


 }
 .card{
     background:rgba(255, 255, 255, 0.589);

 }

    }
    footer{

    }
    .connexion{

  background-color: #f3ec78;
    background-image: linear-gradient(45deg, #2779fd 10%, #8b23b4);
    background-size: 100%;
    -webkit-background-clip: text;
    -moz-background-clip: text;
    -webkit-text-fill-color: transparent; 
    -moz-text-fill-color: transparent;
    font-size:45px; 
    font-family: 'Dancing Script', cursive !important;
    /* font-family: 'Redressed', cursive !important; */

        }
    
  
   
</style>

<script>

$(document).ready(function(){
   
    var obj=JSON.parse(localStorage.getItem('myJavaScriptObject'));
  if(obj["language"]=="ar"){

    location.replace('/ar/login');
  $('#home_link').attr('href',"/ar");

   // creating cookie

   $('#lg').val('ar');

   // end of creating cookie


    $('.fr').hide();
    $('.ar').show();

  }else{

    $('.ar').hide();
    $('.fr').show();

  }
});
function change_lang()
{
  if(obj['language']=="fr"){

    obj['language']="ar";
    localStorage.setItem('myJavaScriptObject', JSON.stringify(obj));
    location.reload();

  }else{

    obj['language']="fr";
    localStorage.setItem('myJavaScriptObject', JSON.stringify(obj));
    location.reload(); 
  }
  
}


</script>

