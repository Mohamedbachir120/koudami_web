<!doctype html>
<html lang="ar-DZ">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>قدامي</title>
    <meta name="author" content="koudami">
    <meta name="description" content=" هي أول منصة رقمية في الجزائر تقدم لمستخدميها خدمات متنوعة قريبة من موقعهم بسهولة وسرعة بفضل نظام  تحديد المواقع  وهذا في مختلف    قطاعات النشاط   هدفنا هو مساعدتك في بناء شبكتك المهنية والسماح بالتالي للأعضاء الآخرين الذين يبحثون عن مهاراتك بالاتصال بك للحصول على عرض خدمة ، توظيف ، مبيعات ، مشتريات ">
   
   
    <!-- Scripts -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ asset('js/language.js')}}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
   
    <!-- Fonts -->
    <link href="{{ asset('icofont/icofont.min.css')}}" rel="stylesheet">
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

              <div class="col d-flex flex-column text-center mb-2 "><span class="material-icons md-light">engineering</span><a class=" text-light   text-decoration-none" href="/ar/service/Construction"> الانشاءات والاعمال</a></div>
     
              <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">construction</span><a class=" text-light   text-decoration-none" href="/ar/service/Industrie"> الصناعة والتصنيع</a></div>
             
              <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">inventory_2</span><a class=" text-light   text-decoration-none" href="/ar/service/Décoration">  الديكور والترتيب</a></div>
             
              <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">cake</span> <a class=" text-light   text-decoration-none" href="/ar/service/Traiteurs">حلويات</a></div>
             
              <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">park</span> <a class=" text-light   text-decoration-none" href="/ar/service/Nettoyage">التنظيف والبستنة</a></div>
             
              <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">time_to_leave</span><a class=" text-light   text-decoration-none" href="/ar/service/Location"> تأجير المركبات </a></div>
             
              <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">security</span><a class=" text-light   text-decoration-none" href="/ar/service/Sécurité"> أجهزة الامان </a></div>
              
              <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">carpenter</span> <a class=" text-light   text-decoration-none" href="/ar/service/Menuiserie">النجارة والأثاث</a></div>
              
              <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">hotel</span> <a class=" text-light   text-decoration-none" href="/ar/service/Hôtellerie">فندقة</a></div>
              
              <div class="col d-flex flex-column text-center  mt-3 "><i class="icofont-girl-alt float-end pe-3 fs-5"></i><a class=" text-light   text-decoration-none" href="/ar/service/Esthétique">تجميل</a></div>
              
              <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">euro_symbol</span> <a class=" text-light   text-decoration-none" href="/ar/service/Comptabilité">المحاسبة والاقتصاد</a></div>
              
              <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">computer</span><a class=" text-light   text-decoration-none" href="/ar/service/Maintenance">الصيانة و اعلام آلي</a></div>
              
              <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">router</span>  <a class=" text-light   text-decoration-none" href="/ar/service/Paraboles"> تثبيت أجهزة الاستقبال</a></div>
              
              <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">kitchen</span><a class=" text-light   text-decoration-none" href="/ar/service/Réparation">   إصلاح الاجهزة المنزلية</a></div>
                    
              <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">gavel</span><a class=" text-light   text-decoration-none" href="/ar/service/Juridiques"> قانون</a></div>
              
              <div class="col d-flex flex-column text-center my-2"> <span class="material-icons md-light">auto_stories</span><a class=" text-light   text-decoration-none" href="/ar/service/Ecole"> المدارس و التكوين</a></div>
              
              <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">directions_bus</span> <a class=" text-light   text-decoration-none" href="/ar/service/Transport"> نقل و المواصلات</a></div>
              
              <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">comment</span><a class=" text-light   text-decoration-none" href="/ar/service/Publicité">  اعلان و المواصلات</a></div>
              
              <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">ac_unit</span><a class=" text-light   text-decoration-none" href="/ar/service/Froid"> التبريد والتكييف</a></div>
              
              <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">medication</span><a class=" text-light   text-decoration-none" href="/ar/service/Médecine">الطب والصحة</a></div>
              
              <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">car_repair</span><a class=" text-light   text-decoration-none" href="/ar/service/Diagnostique">  إصلاح وتشخيص السيارات</a></div>
              
              <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">featured_play_list</span> <a class=" text-light   text-decoration-none" href="/ar/service/Projets"> بحوث و مشاريع</a></div>
              
              <div class="col d-flex flex-column text-center my-2"> <span class="material-icons md-light">language</span><a class=" text-light   text-decoration-none" href="/ar/service/Bureautique"> مكتبيات و انترنت</a></div>
              
              <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">local_printshop</span><a class=" text-light   text-decoration-none" href="/ar/service/Impression">طباعة و نشر</a></div>
              
              <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">camera</span><a class=" text-light   text-decoration-none" href="/ar/service/Image"> سمعي بصري</a></div>
              
              <div class="col d-flex flex-column text-center  mt-3 "><i class="icofont-jacket float-end pe-3 fs-5"></i><a class=" text-light   text-decoration-none" href="/ar/service/Couture">الخياطة والتفصيل</a></div>
              
              <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">people</span> <a class=" text-light   text-decoration-none" href="/ar/service/Evènemets">  ترفيه و لقاءات</a></div>
              
              <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">build</span> <a class=" text-light   text-decoration-none" href="/ar/service/électroniques">تصليح اجهزة الكترونية</a></div>
              
              <div class="col d-flex flex-column text-center my-2"><span class="material-icons md-light">flight</span><a class=" text-light   text-decoration-none" href="/ar/service/ar/Voyage">سفر</a></div>
              
              <div class="col d-flex flex-column text-center mt-3"><span class="material-icons md-light">sports_esports</span> <a class=" text-light   text-decoration-none" href="/ar/service/Jeux">الالعاب</a></div>
              <div  class="col d-flex flex-column text-center  mt-3 "><span class="material-icons md-light">watch</span> <a class=" text-light   text-decoration-none" href="/ar/service/Accessoires">إكسسوارات وأزياء</a></div>
              <div  class="col d-flex flex-column text-center  mt-3 "><span class="material-icons md-light">ice_skating</span>  <a class=" text-light   text-decoration-none" href="/ar/service/Vêtements">ألبسة و أحذية</a></div>
              <div  class="col d-flex flex-column text-center  mt-3 "><span class="material-icons md-light">sports_soccer</span> <a class=" text-light   text-decoration-none" href="/service/Sports">رياضة</a></div>
              <div  class="col d-flex flex-column text-center  mt-3 "><span class="material-icons md-light">receipt</span> <a class=" text-light   text-decoration-none" href="/service/Divers">متنوعات</a></div>

            </div>
          <form action="" hidden id="service_form" method="GET">
            @csrf
            <input type="text" name="pos1" value=""  style="display: none;">
            <input type="text" name="pos2" value=""  style="display: none;">
 
            <input type="submit" value="valider">
          </form>
          <form action="/ar/store/article_search" hidden id="boutique_form" method="GET">
            @csrf
            <input type="text" name="pos1" value=""  style="display: none;">
            <input type="text" name="pos2" value=""  style="display: none;">
            <input type="text" name="keyword" value="" id="keyword">
            <input type="submit" value="valider">
          </form>

           <!-- end of the sidebar --> 




<!-- nav bar -->


        <nav class="navbar navbar-expand-xl navbar-light bg-white font-weight-bold shadow" id="navbar">
          
          <a class="navbar-brand"  href="/ar"  id="logo"> <img src="{{ asset('images/logo.png') }}" alt="Koudami" width="70px" height="70px" ></a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
         

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto row align-items-center ml-2">
                <li class="nav-item active">
                  <a class="nav-link mr-1" href="#apropos">مؤسستنا <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item mr-1">
                  <a class="nav-link" href="#contact">اتصل بنا</a>
                </li>
                <li class="nav-item mr-1">
                  <a class="nav-link" role="button" onclick="openNav();">خدمات</a>
                </li>
             
                <li class="nav-item mr-1">
                  <a class="nav-link" href="/ar/store/show_articles">المتجر</a>
                </li>
                <li class="nav-item mr-1">
                  <a class="nav-link" href="/ar/jobs/all_articles">عروض عمل</a>
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
                      <input type="text" class="form-control" name="keyword" placeholder=" ... بحث"  aria-describedby="basic-addon2">

                    </div>
                    <style>
                      
                    </style>
              
                   
                  </form>
                         
                </li>
          
          
              </ul>
                        
             
              <div class="row align-items-center justify-content-center">

             @guest
             <a href="/register/ar" class="nav-link animated-border-button col-xs-2"> التسجيل &nbsp;  &nbsp;<i class="fa fa-user-plus"></i>  </a>
             <a href="/login" class="nav-link animated-border-button mr-2 col-xs-2"> الدخول &nbsp;  &nbsp;<i class="fa fa-user"></i> </a>

             @endguest
             @auth
                <a href="/home" class="btn btn-primary mx-1"><i class="fa fa-home"></i>الصفحة الرئيسية</a>    

             @endauth
             <a class="btn  mx-2 rounded-fr"  id="lg" >Fr</a>
            </div>
            
            </div>
          </nav>

<!--  end of the navbar -->

        <main class="column">
          
      


        <div class="d-flex flex-row flex-wrap mt-5">
           

          <div class="column d-none d-md-block col-md-2">

              
               
            @foreach ($ads as $item)
            <a href="{{ $item->link }}" target="_blank">

            <img src="{{ Storage::disk('s3')->url($item->contenu)  }}" width="600" height="400" loading="lazy"  class="rounded border responsive my-1" alt="koudami ads">
            </a>                  
            @endforeach
            </div>  
            <div class="column col-sm-12 col-md-7 order-1 order-md-0 order-lg-0">
              

              <div id="carouselExampleControls" class="carousel slide  rounded-3" data-ride="carousel">
                <div class="carousel-inner bg-light p-1 rounded">

                  @foreach ($ads as $item)
                @if ($loop->first)
                <div class="carousel-item active">
                  <a href="{{ $item->link }}"  target="_blank">
                    <img src="{{ Storage::disk('s3')->url($item->contenu)  }}" width="600" height="300" class="responsive border   rounded" loading="lazy" data-bs-interval="2000" alt="koudami ads">   
                    </a>
                  </div>
               
                @endif
                @break
               @endforeach
                
              
                @foreach ($ads as $item)
                @if ($item != $loop->first)
                <div class="carousel-item">
                  <a href="{{ $item->link }}"  target="_blank">
                    <img src="{{ Storage::disk('s3')->url($item->contenu)  }}" width="600" height="300" class="responsive border   rounded" loading="lazy" data-bs-interval="2000" alt="koudami ads">   
                    </a>
                  </div>
                 @endif
                
                

                @endforeach
              
                
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon bg-dark  p-3 rounded-circle" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon bg-dark p-3 rounded-circle" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
              <div class="landing-part row align-items-center justify-content-center" >
                <div class="landing-text col-xs-12 col-md-6 row align-items-center justify-content-center">
                        <div class="slogan ">
                        <h1 class="text-center mb-3">قدامي</h1>
                        <h3 class="text-center mb-3"> <strong> كلش قدامك# </strong></h3>
                        <a href="/ar/store/show_articles" target="_blank" class="btn btn-danger"> <i class="fa fa-shopping-cart mr-2"></i> GO shopping</a> 
                      </div>
                      </div>
                    
          
                    </div>
          
            
                 

            </div>          
            

            <div class="col-md-3 border rounded p-3 shadow  order-0 order-md-1 order-lg-1">
              <h3 class="text-center my-2  text-light bg-primary  font-weight-bold rounded py-2"> متجر&nbsp; &nbsp;<i class="fa fa-shopping-cart" aria-hidden="true"></i></h3>
              <ul class="rounded py-2 px-3"style="max-height: 400px; overflow-y:scroll;" id="boutique_links">
                <p class="text-right font-weight-bold">مركبات&nbsp; &nbsp;<i class="fa fa-car"></i></p>
                <li><a class="btn text-right w-100" clas href="Véhicules">مركبات</a></li>
                <p class="text-right font-weight-bold">عقارات&nbsp; &nbsp;<i class="fa fa-building" aria-hidden="true"></i></p>
                <li><a class="btn text-right w-100" href="Ventes immobilières">مبيعات العقارات</a></li>
                <li><a class="btn text-right w-100" href="Locations immobilières">كراء العقارات</a></li>
                <li><a class="btn text-right w-100" href="Meubles">أثاث المنزل</a></li>
                <li><a class="btn text-right w-100" href="Pour la maison">من أجل المنزل</a></li>
                <li><a class="btn text-right w-100" href="Electroménager">أجهزة المنزلية</a></li>
                <li><a class="btn text-right w-100" href="Outils">معدات</a></li>
                <li><a class="btn text-right w-100" href="Jardin">حدائق</a></li>
                <p class="text-right font-weight-bold">الكترونيات&nbsp;&nbsp;<i class="fa fa-mobile fa-lg" aria-hidden="true"></i></p>
                <li><a class="btn text-right w-100" href="Electronique et ordinateurs">الكترونيات و حواسيب</a></li>
                <li><a class="btn text-right w-100" href="Téléphones mobiles">هواتف نقالة</a></li>
                <p class="text-right font-weight-bold">اعلانات قصيرة&nbsp; &nbsp;<i class="fa fa-binoculars" aria-hidden="true"></i></p>
                <li><a class="btn text-right w-100" href="Vide-grenier">بيع مرائب</a></li>
                <li><a class="btn text-right w-100" href="Divers">متنوعات</a></li>
                <p class="text-right font-weight-bold">ترفيه&nbsp; &nbsp;<i class="fa fa-futbol-o" aria-hidden="true"></i></p>
                <li><a class="btn text-right w-100" href="Sports et activités extérieurs">رياضة و أنشطة خارجية</a></li>
                <li><a class="btn text-right w-100" href="Antiquités et objets de collection">التحف  الاثرية والمقتنيات</a></li>
                <li><a class="btn text-right w-100" href="Instruments de musique">آلات موسيقية</a></li>
                <li><a class="btn text-right w-100" href="Artisanat d'art">الحرف</a></li>
                <li><a class="btn text-right w-100" href="Pièces auto">قطع غيار السيارات</a></li>
                <li><a class="btn text-right w-100" href="Vélos">دراجات</a></li>
                <p class="text-right font-weight-bold">ملابس و اكسسوارات&nbsp; &nbsp;<i class="fa fa-gift" aria-hidden="true"></i></p>
                <li><a class="btn text-right w-100" href="Vêtements et chaussures pour femmes">ملابس وأحذية نسائية</a></li>
                <li><a class="btn text-right w-100" href="Vêtements et chaussures pour hommes">ملابس وأحذية رجالية</a></li>
                <li><a class="btn text-right w-100" href="Bijoux et accessoires">المجوهرات والاكسسوارات</a></li>
                <li><a class="btn text-right w-100" href="Sacs et bagages">الحقائب والأمتعة</a></li>
                <p class="text-right font-weight-bold">للعائلة&nbsp; &nbsp;<i class="fa fa-heart"></i></p>
                <li><a class="btn text-right w-100" href="Puériculture et enfants">رعاية الأطفال</a></li>
                <li><a class="btn text-right w-100" href="Santé et beauté">الصحة و التجميل</a></li>
                <li><a class="btn text-right w-100" href="Jouets et jeux">ألعاب</a></li>
                <li><a class="btn text-right w-100" href="Fournitures pour animaux">مستلزمات الحيوانات الأليفة</a></li>
                <p class="text-right font-weight-bold">تسلية&nbsp; &nbsp;<i class="fa fa-gamepad"></i></p> 
                <li><a class="btn text-right w-100" href="Jeux vidéo">ألعاب الفيديو</a></li>
                <li><a class="btn text-right w-100" href="Livres,films et musique">كتب وأفلام وموسيقى</a></li>
              </ul>
         
            </div>
              

          
            
            

        </div>
    
           
        <div class="mt-2 bg-white flex-fill  text-center rounded shadow" id="apropos">
          <div class="col-sm-12  p-5 row flex-wrap">

       
        
         <br>
        <p style="line-height: 200%;" class="col-sm-12 col-lg-9 text-dark text-justify  text-right p-1 font-weight-bold order-1 order-md-1 order-lg-0">
        
             هي أول منصة رقمية في الجزائر تقدم لمستخدميها خدمات متنوعة قريبة من موقعهم بسهولة وسرعة بفضل نظام  تحديد المواقع  وهذا في مختلف    قطاعات النشاط
              <br>  هدفنا هو مساعدتك في بناء شبكتك المهنية والسماح بالتالي للأعضاء الآخرين الذين يبحثون عن مهاراتك بالاتصال بك للحصول على عرض خدمة ، توظيف ، مبيعات ، مشتريات 
         </p>
         <div class="col-sm-12 col-lg-3 d-flex flex-row align-items-center justify-content-center" id="apropos_titre">
           <h2 class="text-dark text-center order-0  order-md-0 order-lg-1" >مؤسستنا</h2>
         
         </div>
       </div>
         
   </div>
        <h3 class="mt-5 text-center">عملا ءنا</h3>

        <div class=" flex-wrap container-nos-clients  mt-4">
          @foreach ($users as $item)

          <div class="hexagon" >
            <div class="shape">
              @if($item->photo == NULL)
              <a href="/fr/contact_client/{{ $item->id }}" target="_blank" >  <img class="my-3" src="{{ asset('css/avatar.png')}}" width="80px" id="user_img" height="80px"  alt="{{ $item->categorie }}"></a>
               @else
               <a href="/fr/contact_client/{{ $item->id }}" target="_blank" >  <img class="my-3" src="{{ Storage::disk('s3')->url($item->photo) }}" width="80px" id="user_img" height="80px"  alt="{{ $item->categorie }}"></a>
               
               @endif               
                <div class="content">
                    <div>
                      <li> {{ $item->name }} {{ $item->prenom }} </li> 
                      <li> {{ $item->email }}  </li>  
           @php
           $to_arabic=[];
                   $to_arabic["Constructions et Travaux"]="الانشاءات والاعمال";
                   $to_arabic["Industrie et fabrication"]="الصناعة والتصنيع";
                   $to_arabic["Décoration et Aménagement"]="الديكور والترتيب";
                   $to_arabic["Traiteurs et Gateaux"]="حلويات";
                   $to_arabic["Nettoyage et jardinage"]="التنظيف والبستنة";
                   $to_arabic["Location de véhicules"]="تأجير المركبات";
                   $to_arabic["Securité et Alarme"]="أجهزة الامان";
                   $to_arabic["Menuiserie et Meubles"]="النجارة والأثاث";
                   $to_arabic["Hôtelerie"]="فندقة";
                   $to_arabic["Esthétique et Beauté"]="تجميل";
                   $to_arabic["Comptabilité et Economie"]="المحاسبة والاقتصاد";
                   $to_arabic["Maintenance et infromatique"]="الصيانة و اعلام آلي";
                   $to_arabic["Paraboles et démos"]="تثبيت أجهزة الاستقبال";
                   $to_arabic["Réparation Electromenager"]="إصلاح الاجهزة المنزلية";
                   $to_arabic["Juridique"]="قانون";
                   $to_arabic["Ecoles et formations"]="المدارس و التكوين";
                   $to_arabic["Transport et déménagement"]="نقل و المواصلات";
                   $to_arabic["Publicité et communication"]="اعلان و المواصلات";
                   $to_arabic["Froid et climatisation"]="التبريد والتكييف";
                   $to_arabic["Médecine et santé"]="الطب والصحة";
                   $to_arabic["Réparation auto et diagnostic"]="إصلاح وتشخيص السيارات";
                   $to_arabic["Projet et études"]="بحوث و مشاريع";
                   $to_arabic["Bureautique et internet"]="مكتبيات و انترنت";
                   $to_arabic["Impression et édition"]="طباعة و نشر";
                   $to_arabic["Image et son"]="سمعي بصري";
                   $to_arabic["Couture et confection"]="الخياطة والتفصيل";
                   $to_arabic["Evènement et Divertissement"]=" ترفيه و لقاءات";
                   $to_arabic["Réparation Electronique"]="تصليح اجهزة الكترونية";
                   $to_arabic["Voyage"]="سفر";
                   $to_arabic["Jeux"]="الالعاب";
                   $to_arabic["Accessoires et Modes"]="إكسسوارات وأزياء";
                   $to_arabic["Vêtements et chaussures"]="ألبسة و أحذية";
                   $to_arabic['Sports et loisirs']="رياضة"; 
                   $to_arabic['Divers']="متنوعات";   
  

                   try {
                     //code...
                     echo ($to_arabic[$item->categorie]);   
       
                   } catch (\Throwable $th) {
                     //throw $th;
                   }
          @endphp          
           <li> {{ $item->phone_number}} </li> 
          
          
        
          </div>
         
        
        </div>
        </div>
          </div>
        @endforeach

        </div>

<footer class="bg-dark  text-lg-start">
    <div class="container p-4">
      <div class="row text-right">
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase text-light">روابط مهمة</h5>
    
            <ul class="list-unstyled mb-0">
              <li>
                <a href="/" class="text-light text-decoration-none"> الصفحة الرئيسية &nbsp; &nbsp;<i class="fa fa-home"></i></a>
              </li>
              <li>
                  <a href="/fr/our_clients" class="text-light text-decoration-none"> الخدمات&nbsp;  &nbsp;<i class="fa fa-tasks" aria-hidden="true"></i></a>
                </li>
               
              <li>
                <a href="#apropos" class="text-light text-decoration-none">  مؤسستنا&nbsp;  &nbsp;<i class="fa fa-newspaper-o"></i></a>
              </li>
              <li>
                <a href="#contact" class="text-light text-decoration-none"> اتصل بنا&nbsp;  &nbsp;<i class="fa fa-archive"></i></a>
              </li>
              <li>
                <a href="#apropos" class="text-light text-decoration-none"> شروط الاستخدام&nbsp;  &nbsp;<i class="fa fa-archive"></i></a>
              </li>
            
            </ul>
          </div>
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <ul class="list-unstyled mb-0">
                <h5 class="text-uppercase mb-0 text-light" id="contact">اتصل بنا</h5>
        
                <li>
                  <a class="text-light text-decoration-none" href="#">رقم 03 تجزئة زموري طريق القمم درارية الجزائر &nbsp; &nbsp; <i class="fa fa-map-marker  ms-5 me-2 my-2"></i></a>
                </li>
                <li>
                    <a href="#!" class="text-light text-decoration-none">0561 09 04 05 / 023 35 43 43  &nbsp; &nbsp; <i class="fa fa-phone"></i></a>
                  </li>
                 
                <li>
                  <a href="#!" class="text-light text-decoration-none"> contact@koudami.com &nbsp; &nbsp;<i class="fa fa-envelope"></i></a>
                </li>
                <li>
                  <a href="/" class="text-light text-decoration-none"> koudami.com &nbsp; &nbsp;<i class="fa fa-internet-explorer"></i> </a>
                </li>
              </ul>
          </div>
        
        <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
          <h5 class="text-uppercase text-light">موقعنا</h5>

          <iframe class="responsive" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12794.787399563726!2d2.9881538!3d36.705822!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x466c815d673fe26b!2z2YLYp9i52Kkg2KfZhNit2YHZhNin2Kog2KfZhNmC2YXZhSBTYWxsZSBkZXMgZsOqdGVzIExlcyBDcsOqdGVz!5e0!3m2!1sfr!2sdz!4v1608743579926!5m2!1sfr!2sdz" width="500" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" loading="lazy" tabindex="0"></iframe>
        </div>
       
       
        </div>
      </div>
    <div class="text-center p-1 text-light" style="background-color: rgba(0, 0, 0, 0.2)">
      © 2020 Copyright:
      <a class="text-light" href="#">Koudami.com</a>
      <p>جميع الحقوق محفوظة</p>
    </div>
  </footer>
                







            
     



        </main>
    </div>
</body>
</html>
<script>
  
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

  $('#lg').click(function(){

event.preventDefault();
var obj={
  language:'fr'
};
localStorage.setItem('myJavaScriptObject', JSON.stringify(obj));
var auth="{{ Auth::user() }}"
if(auth!=""){

    $.ajax({
        url: "/language",
        type:"GET",
        data:{
          language:'fr',
            
       
        },
        success:function(response){
        
        },
       });

}
location.replace('/');

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
   .landing-part{
              width: 100%;
              height: 40vh;
             
            }
            .landing-text{
              width: 50%;
            }
          
  body{

 font-family: 'Montserrat', sans-serif !important;
 
  }
#apropos{
   /* background-image: url('css/login.jpg') !important;  */
}
 p{
  font-size: 16px !important;
  letter-spacing: 1px;
}


 
.container-nos-clients{
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
    }
  
.hexagon{
        position: relative;
        width: 350px;
        height: 241px;
        margin: 50px 20px 70px ;
    }
     .hexagon::before{
       content: '';
       position: absolute;
       bottom: -65px;
       width: 100%;
       height: 60px;
       background:none;
       border-radius: 50%;
       transition: 0.5s;
    }
    
     .hexagon:hover::before{
      opacity: 0.8;
      transform: scale(0.8);
    }
    
     .hexagon .shape{
        position: absolute;
        top: 0;
        left: 14%;
        width:70%;
        height: 100%;
        background: none;
        clip-path: circle(50% at 49% 50%);
        transition: 0.5s;
    }
     .hexagon:hover .shape{
     transform: translateY(-30px);
    }
     .hexagon .shape img{
    position: absolute;
    top: -17px;
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

      border-right:3px solid #1271b7 !important;
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

 

    @media screen and (max-width: 650px) {

       #slider{
           max-width: 100%;
       } 

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
