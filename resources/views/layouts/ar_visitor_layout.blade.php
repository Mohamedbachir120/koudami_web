<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="{{ asset('js/language.js')}}" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" integrity="sha256-Uv9BNBucvCPipKQ2NS9wYpJmi8DTOEfTA/nH2aoJALw=" crossorigin="anonymous"></script>
<link rel="icon" href="{{ asset('css/logo.png') }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Koudami') }}</title>

    <link rel="icon" href="{{ asset('css/logo.png') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <a href="/"> <img src="{{ asset('images/logo.png') }}"  alt="Koudami" width="70px" height="70px"></a>
                </a>
             
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
             
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                                
                            <a class="btn btn-primary"  onclick="change_lang()"  id="lang" >Fr</a>
                         
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
                {{-- <div class="ads embed-responsive embed-responsive-16by9">
                  <button  onclick='myfunction()' id="close">X</button>
                 
                  <img class="embed-responsive-item block mx-auto" controls src="{{ $ad->contenu }}">
              
                    </div> --}}
                  <div class="d-flex flex-row-reverse">
                      @auth
                            
                    <div class="col-sm-3 flex-fill">
                        <ul class="navbar-nav d-flex flex-column">
                        <li class="d-flex flex-row-reverse align-items-center text-right p-2 bg-dark text-light rounded my-1">  
                             @if (Auth::user()->photo != NULL)
                            <img src="{{ Auth::user()->photo}}" class="pic-profil"  width="70px" height="70px" alt="">  
                            @else
                                
                            <img src="/css/avatar.png"  class="pic-profil" width="70px" height="70px" alt="">  
                           
                            @endif
                            <div class="mx-3" >
                            <h4 >
                                {{ Auth::user()->name }}  {{ Auth::user()->prenom }}
                                <br>
                                
                            </h4>
                                <p>
                                    متصفح                                </p>
                        </div>
                           
                        </li>
                   
                        <li><a href="/home" class="btn btn-outline-dark text-center w-100"><i class="fa fa-home"></i> الصفحة الرئيسية</a></li>
                        <li><a href="/add_profil_pic" class="btn btn-outline-dark text-center w-100 mt-1"><i class="fa fa-user"></i> صورة البروفايل </a></li>
                        <li><a href="/ar/our_clients" class="btn btn-outline-dark w-100 mt-1"><i class="fa fa-eye"></i> تعرف على الخدمات المتوفرة</a></li>
                        <li><a href="/detail_visitor/{{ Auth::user()->id}}" class="btn btn-outline-dark mt-1 w-100"><i class="fa fa-book"></i> المعلومات الشخصية</a></li>
                        <li><a href="/edit_password/{{ Auth::user()->id }}" class="btn btn-outline-dark mt-1 w-100"><i class="fa fa-key"></i> تغيير كلمة السر </a> </li>
                                            
              
                      </ul>
              
                      
                      
                      </div>
                
                      @endauth
                    
                    <div class="col-sm-9">
                     @yield('content')
                    </div>
                  </div>   
        </main>
    </div>
</body>
</html>
<script type="text/javascript">
function change_lang()
{
    var auth= "{{{ (Auth::user()) ? Auth::user()->name : null }}}";
   
     
    if( $("#lang").text()=="Fr")
    {
        $("#lang").text("Fr");
        $(".fr").show();
        $(".ar").hide();


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
        

        
        var obj={
            "language":"fr",
            }
        localStorage.setItem('myJavaScriptObject', JSON.stringify(obj));
  
       

        if(auth.length>0){
            
            $.ajax({
        url: "/language",
        type:"GET",
        data:{
          language:'fr',
            
       
        },
        success:function(response){
        
        },
       });
        location.reload();

    }

      
    }
    else{
       
        $("#lang").text("عربية");
        $(".ar").show();
       
        $(".fr").hide();
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

        var obj={
         "language":"ar",
         }
     
     localStorage.setItem('myJavaScriptObject', JSON.stringify(obj));    
     

     if(auth.length>0){
            
            $.ajax({
        url: "/language",
        type:"GET",
        data:{
          language:'ar',
            
       
        },
        success:function(response){
        
        },
       });

       location.reload();
    }


    }

}



</script>
<style>
    .container{
   min-width: 100%;
 }
 .pic-profil{
     border-radius: 50%;
 }
</style>