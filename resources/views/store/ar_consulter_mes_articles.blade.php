<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="{{ asset('js/language.js')}}" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" integrity="sha256-Uv9BNBucvCPipKQ2NS9wYpJmi8DTOEfTA/nH2aoJALw=" crossorigin="anonymous"></script>
<link href="{{ asset('icofont/icofont.min.css')}}" rel="stylesheet">

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
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <a href="/"> <img src="{{ asset('images/logo.png') }}" alt="Koudami" width="70px" height="70px"></a>
                </a>
             
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
             
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                                
                            <a class="btn btn-primary" onclick="change_lang()" id="lang" >Fr</a>
                         
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
                      <div class="col-sm-2 flex-fill">
                          <ul class="navbar-nav d-flex flex-column">
                          <li class="p-2 bg-dark text-center text-light rounded my-1">  
                             <h4> روابط مهمة</h4>
                          </li>
                              <li><a href="/home" class="btn btn-outline-dark tex-center w-100"><i class="fa fa-home"></i> الصفحة الرئيسية</a></li>
                              <li><a href="/ar/our_clients" class="btn btn-outline-dark tex-center w-100 mt-1"><i class="fa fa-weixin"></i> الخدمات </a></li>
                       
                
                        </ul>
                
                        
                        
                        </div>
                        @endauth
                    
                    <div class="col-sm-10">
                        <div class="card">
                            <div class="card-header bg-dark p-3 text-light text-center">
                                <h4>مبيعاتي</h4>
                            </div>
                            <div class="d-flex flex-row-reverse m-2">
                                <a class="btn btn-success col-sm-3 m-2" href="/store/create_article">
                                   مبيع للمتجر <i class="fa fa-plus"></i> 
                                </a>

                                <a class="btn btn-primary col-sm-3 m-2" href="/fr/store/show_articles">
                                  المتجر   <i class="icofont-shopping-cart"></i>  
                                </a>
                                
                            </div>
                            @if (Auth::user()->articles->count()>=10)

                            <div class="p-3">

                                <p>

                                            لقد وصلت للحد الاعلى للمبيعات
                                        
                                </p>
                            </div>
                            @endif

                            <div class="card-body p-3 d-flex flex-row-reverse justify-content-start">

                               
                                @foreach (Auth::user()->articles as $item)
                                <div class="col-sm-4 column">
                                    <ul class="rounded border p-3 text-right">
                                        <li class="bg-dark text-light text-center"> {{ $item->prix }} دج</li>
                                        <li class="my-2">
                                            <div id="carouselExampleControls" class="carousel slide  rounded-3 col-md-12" data-ride="carousel">
                                                <div class="carousel-inner bg-light p-1 rounded">
                                        
                                                <div class="carousel-item active">
                                                    <img src="{{ Storage::disk('s3')->url($item->image) }}" class="responsive" width="300px"  height="150px" alt="koudami">
                                           
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="{{ Storage::disk('s3')->url($item->image2) }}" class="responsive" width="300px"  height="150px" alt="koudami">
                                                  
                                                    </div>
                                                
                                                <div class="carousel-item">
                                                    <img src="{{ Storage::disk('s3')->url($item->image3) }}" class="responsive" width="300px"  height="150px" alt="koudami">
                                                    
                                                </div> 
                                        
                                            
                                               
                                        
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon bg-dark  p-2 rounded-circle" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                              </a>
                                              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon bg-dark p-2 rounded-circle" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                              </a>
                                            </div>
                                         </li>

                                <li>   {{  $item->id }} :الاعلان رقم 
                                </li>
                           <li>
                                  {{ $item->nom_article }} : الاعلان 
                         
                           </li>
                           <li>
                              الصنف

                           @php
                               $to_arabic=[];
                               $to_arabic["Véhicules"]="مركبات";
                               $to_arabic["Ventes immobilières"]="مبيعات العقارات";
                               $to_arabic["Locations immobilières"]="كراء العقارات";
                               $to_arabic["meubles"]="أثاث المنزل";
                               $to_arabic["Pour la maison"]="من أجل المنزل";
                               $to_arabic["Electroménager"]="أجهزة المنزلية";
                               $to_arabic["Outils"]="معدات";
                               $to_arabic["Jardin"]="حدائق";
                               $to_arabic["Electronique et ordinateurs"]="الكترونيات و حواسيب";
                               $to_arabic["Téléphone mobiles"]="هواتف نقالة";
                               $to_arabic["Vide-grenier"]="بيع مرائب";
                               $to_arabic["Divers"]="متنوعات";
                               $to_arabic["Sports et activités extérieurs"]="رياضة و أنشطة خارجية";
                               $to_arabic["Antiquités et objets de collection"]="التحف  الاثرية والمقتنيات";
                               $to_arabic["Instruments de musique"]="آلات موسيقية";
                               $to_arabic["Artisanat d'art"]="الحرف";
                               $to_arabic["Pièces auto"]="قطع غيار السيارات";
                               $to_arabic["Vélos"]="دراجات";
                               $to_arabic["Vêtements et chaussures pour femmes"]="ملابس وأحذية نسائية";
                               $to_arabic["Vêtements et chaussures pour hommes"]="ملابس وأحذية رجالية";
                                $to_arabic["Bijoux et accessoires"]="المجوهرات والاكسسوارات";
                                $to_arabic["Sacs et bagages"]="الحقائب والأمتعة";
                                $to_arabic["Puériculture et enfants"]="رعاية الأطفال";
                                $to_arabic["Santé et beauté"]="الصحة و التجميل";
                                $to_arabic["Jouets et jeux"]="ألعاب";
                                $to_arabic["Fournitures pour animaux"]="مستلزمات الحيوانات الأليفة";
                                $to_arabic["Jeux vidéo"]="ألعاب الفيديو";
                                $to_arabic["Livres,films et musique"]="كتب وأفلام وموسيقى";
                               
                               echo (": ".$to_arabic[ $item->categorie ]);
                           @endphp  
                                                      </li>
                           <li>
                            {{ $item->description }}  : توضيح

                           </li>
                           <li>
                               {{ $item->phone_number }} : رقم الهاتف
                           </li>
                           <li>
                               {{ $item->wilaya }} -  {{ $item->commune }} : العنوان
                           </li>
                           <li class="row">
                            <form action="/store/delete_article/{{ $item->id }}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    @method('delete')

                                    <button  type="submit" class="btn btn-danger" onclick="return confirm('voulez vous vraiment supprimez cette article');"><i class="fa fa-eraser"></i></button>

                                </form>

                                <a href="/store/edit_article/{{ $item->id}}" class="btn btn-success mx-2"><i class="fa fa-edit"> </i> </a>
                            </li>
                                </ul>
                                  
                                </div>
                        
                           @endforeach
                                

                       
            </div>
            </div>
                       






                    </div>
                  </div>   
        </main>
    </div>
</body>
</html>
<script type="text/javascript">

var v="{{ session('msg') }}";

if(v.length >0){
    alert(v);
}

function change_lang()
{
    var obj={
            "language":"fr",
            }
        localStorage.setItem('myJavaScriptObject', JSON.stringify(obj));
  
          $.ajax({
        url: "/language",
        type:"GET",
        data:{
          language:'fr',
            
       
        },
        success:function(response){
           if(response){
            location.reload();

           }
        
        },
       });

}



</script>
<style>
    .container{
   min-width: 100%;
 }
li{
    list-style: none;
}
.responsive{
    width: 100%;
    max-height: 200px;
    height: auto;    
    }

</style>