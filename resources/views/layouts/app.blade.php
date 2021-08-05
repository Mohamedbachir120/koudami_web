<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('css/logo.png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('icofont/icofont.min.css')}}" rel="stylesheet">

    <title>{{ config('app.name', 'Koudami') }}</title>
    <!-- Scripts -->
    <meta name="author" content="koudami">

    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{ asset('js/language.js')}}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" integrity="sha256-Uv9BNBucvCPipKQ2NS9wYpJmi8DTOEfTA/nH2aoJALw=" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow" >
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
                        <li class="nav-item">
                                
                            <a class="btn btn-primary" role="button" onclick="change_lang()" id="lang">Fr</a>
                         
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
            @yield('content')
        </main>
    </div>
</body>
</html>
<style>
    #commune option,#commune{
        padding: 10px;
        border:none;
        background: rgb(240, 240, 240);
        border-radius: 3px;
        
    }
 
</style>
<script type="text/javascript">
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