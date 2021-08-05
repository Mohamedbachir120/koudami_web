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

  <meta name="author" content="koudami">
  <meta name="description" content="Besoin d'un service ,boutique,artisan,service,constructeurs,médecin,avocat,location de véhicule,traiteurs de gateux,décoration,peintre,Imagerie ,bureautique ,Froid et climatisation,Hôtellerie,Réparation auto,réparation de télèphones,Maintenance informatique,réparateur électroménager,agence de voyage ... koudami vous propose les plus proches de vous pour optimiser votre temps de recherche ">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
  rel="stylesheet">

  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
  <link rel="stylesheet" href="{{ asset('css/our.css') }}">
  <script src="{{ asset('js/language.js') }}" defer></script>
  <script src="{{ asset('js/app.js') }}" defer></script>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>

<body id="app">
 
  <nav class="navbar navbar-expand-xl navbar-light bg-white font-weight-bold shadow" id="navbar">
          
    <a class="navbar-brand"  href="/ar"  id="logo"> <img src="{{ asset('images/logo.png') }}" alt="Koudami" width="70px" height="70px" ></a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
   

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto row align-items-center ml-2">
          <li class="nav-item active">
            <a class="nav-link mr-1" href="/ar/#apropos">مؤسستنا <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item mr-1">
            <a class="nav-link" href="#contact">اتصل بنا</a>
          </li>
          <li class="nav-item mr-1">
            <a class="nav-link" href="/ar/our_clients">خدمات</a>
          </li>
       
          <li class="nav-item mr-1">
            <a class="nav-link" href="#">المتجر</a>
          </li>
          <li class="nav-item mr-1">
            <a class="nav-link" href="/ar/jobs/all_articles">عروض عمل</a>
          </li>
         
    
        </ul>
                  
       
        <div class="row align-items-center justify-content-center">

       @guest
       <a href="/register/ar" class="nav-link animated-border-button col-xs-2 text-dark"> التسجيل &nbsp;  &nbsp;<i class="fa fa-user-plus"></i>  </a>
       <a href="/login" class="nav-link animated-border-button mr-2 col-xs-2 text-dark"> الدخول &nbsp;  &nbsp;<i class="fa fa-user"></i> </a>

       @endguest
       @auth
          <a href="/home" class="btn btn-primary mx-1"><i class="fa fa-home"></i>الصفحة الرئيسية</a>    

       @endauth
       <a class="btn  mx-2 rounded-fr"  id="lg" >Fr</a>
      </div>
      
      </div>
    </nav>

    <div id="cat" class="col-sm-12 bg-light row p-0 w-100" style="margin:0 !important;">
      <div class="col-sm-12 bg-primary">
        <button class="btn text-light" onclick="show_cat_child()"><span> الخدمات </span>&nbsp; &nbsp;<i class="fa fa-list fa-xs"></i></button>   
      
      </div>
      <div id="cat_child" class="col-sm-12"  style="max-height: 400px;overflow:scroll;">

       
  
  <div class="text-center p-2 font-weight-bold "><span class="material-icons md-light">engineering</span><a class=" text-dark text-decoration-none" href="/ar/service/Construction"> الانشاءات والاعمال</a></div>
     
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">construction</span><a class=" text-dark text-decoration-none" href="/ar/service/Industrie"> الصناعة والتصنيع</a></div>
 
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">inventory_2</span><a class=" text-dark text-decoration-none" href="/ar/service/Décoration">  الديكور والترتيب</a></div>
 
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">cake</span> <a class=" text-dark text-decoration-none" href="/ar/service/Traiteurs">حلويات</a></div>
 
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">park</span> <a class=" text-dark text-decoration-none" href="/ar/service/Nettoyage">التنظيف والبستنة</a></div>
 
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">time_to_leave</span><a class=" text-dark text-decoration-none" href="/ar/service/Location"> تأجير المركبات </a></div>
 
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">security</span><a class=" text-dark text-decoration-none" href="/ar/service/Sécurité"> أجهزة الامان </a></div>
  
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">carpenter</span> <a class=" text-dark text-decoration-none" href="/ar/service/Menuiserie">النجارة والأثاث</a></div>
  
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">hotel</span> <a class=" text-dark text-decoration-none" href="/ar/service/Hôtellerie">فندقة</a></div>
  
  <div class="text-center p-2 font-weight-bold"><i class="icofont-girl-alt float-end pe-3 fs-5"></i><a class=" text-dark text-decoration-none" href="/ar/service/Esthétique">تجميل</a></div>
  
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">euro_symbol</span> <a class=" text-dark text-decoration-none" href="/ar/service/Comptabilité">المحاسبة والاقتصاد</a></div>
  
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">computer</span><a class=" text-dark text-decoration-none" href="/ar/service/Maintenance">الصيانة و اعلام آلي</a></div>
  
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">router</span>  <a class=" text-dark text-decoration-none" href="/ar/service/Paraboles"> تثبيت أجهزة الاستقبال</a></div>
  
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">kitchen</span><a class=" text-dark text-decoration-none" href="/ar/service/Réparation">   إصلاح الاجهزة المنزلية</a></div>
        
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">gavel</span><a class=" text-dark text-decoration-none" href="/ar/service/Juridiques"> قانون</a></div>
  
  <div class="text-center p-2 font-weight-bold"> <span class="material-icons md-light">auto_stories</span><a class=" text-dark text-decoration-none" href="/ar/service/Ecole"> المدارس و التكوين</a></div>
  
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">directions_bus</span> <a class=" text-dark text-decoration-none" href="/ar/service/Transport"> نقل و المواصلات</a></div>
  
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">comment</span><a class=" text-dark text-decoration-none" href="/ar/service/Publicité">  اعلان و المواصلات</a></div>
  
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">ac_unit</span><a class=" text-dark text-decoration-none" href="/ar/service/Froid"> التبريد والتكييف</a></div>
  
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">medication</span><a class=" text-dark text-decoration-none" href="/ar/service/Médecine">الطب والصحة</a></div>
  
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">car_repair</span><a class=" text-dark text-decoration-none" href="/ar/service/Diagnostique">  إصلاح وتشخيص السيارات</a></div>
  
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">featured_play_list</span> <a class=" text-dark text-decoration-none" href="/ar/service/Projets"> بحوث و مشاريع</a></div>
  
  <div class="text-center p-2 font-weight-bold"> <span class="material-icons md-light">language</span><a class=" text-dark text-decoration-none" href="/ar/service/Bureautique"> مكتبيات و انترنت</a></div>
  
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">local_printshop</span><a class=" text-dark text-decoration-none" href="/ar/service/Impression">طباعة و نشر</a></div>
  
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">camera</span><a class=" text-dark text-decoration-none" href="/ar/service/Image"> سمعي بصري</a></div>
  
  <div class="text-center p-2 font-weight-bold"><i class="icofont-jacket float-end pe-3 fs-5"></i><a class=" text-dark text-decoration-none" href="/ar/service/Couture">الخياطة والتفصيل</a></div>
  
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">people</span> <a class=" text-dark text-decoration-none" href="/ar/service/Evènemets">  ترفيه و لقاءات</a></div>
  
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">build</span> <a class=" text-dark text-decoration-none" href="/ar/service/électroniques">تصليح اجهزة الكترونية</a></div>
  
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">flight</span><a class=" text-dark text-decoration-none" href="/ar/service/ar/Voyage">سفر</a></div>
  
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">sports_esports</span> <a class=" text-dark text-decoration-none" href="/ar/service/Jeux">الالعاب</a></div>
  <div  class="text-center p-2 font-weight-bold"><span class="material-icons md-light">watch</span> <a class=" text-dark text-decoration-none" href="/ar/service/Accessoires">إكسسوارات وأزياء</a></div>
  <div  class="text-center p-2 font-weight-bold"><span class="material-icons md-light">ice_skating</span>  <a class=" text-dark text-decoration-none" href="/ar/service/Vêtements">ألبسة و أحذية</a></div>
  <div  class="text-center p-2 font-weight-bold"><span class="material-icons md-light">sports_soccer</span> <a class=" text-dark text-decoration-none" href="/service/Sports">رياضة</a></div>
  <div  class="text-center p-2 font-weight-bold"><span class="material-icons md-light">receipt</span> <a class=" text-dark text-decoration-none" href="/service/Divers">متنوعات</a></div>

    
    </div>
     
    </div>

<div class="d-flex flex-row-reverse">
  <div id="tohide" class="col-md-3 my-5 shadow d-none d-lg-block d-md-block border rounded p-3 shadow mb-3">
      
    <h3 class="text-center my-2 text-light bg-primary rounded py-2 font-weight-bold"><i class="fa fa-list" aria-hidden="true"></i>&nbsp; &nbsp;الخدمات</h3>

   
  
  <div class="text-center p-2 font-weight-bold "><span class="material-icons md-light">engineering</span><a class=" text-dark text-decoration-none" href="/ar/service/Construction"> الانشاءات والاعمال</a></div>
     
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">construction</span><a class=" text-dark text-decoration-none" href="/ar/service/Industrie"> الصناعة والتصنيع</a></div>
 
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">inventory_2</span><a class=" text-dark text-decoration-none" href="/ar/service/Décoration">  الديكور والترتيب</a></div>
 
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">cake</span> <a class=" text-dark text-decoration-none" href="/ar/service/Traiteurs">حلويات</a></div>
 
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">park</span> <a class=" text-dark text-decoration-none" href="/ar/service/Nettoyage">التنظيف والبستنة</a></div>
 
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">time_to_leave</span><a class=" text-dark text-decoration-none" href="/ar/service/Location"> تأجير المركبات </a></div>
 
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">security</span><a class=" text-dark text-decoration-none" href="/ar/service/Sécurité"> أجهزة الامان </a></div>
  
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">carpenter</span> <a class=" text-dark text-decoration-none" href="/ar/service/Menuiserie">النجارة والأثاث</a></div>
  
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">hotel</span> <a class=" text-dark text-decoration-none" href="/ar/service/Hôtellerie">فندقة</a></div>
  
  <div class="text-center p-2 font-weight-bold"><i class="icofont-girl-alt float-end pe-3 fs-5"></i><a class=" text-dark text-decoration-none" href="/ar/service/Esthétique">تجميل</a></div>
  
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">euro_symbol</span> <a class=" text-dark text-decoration-none" href="/ar/service/Comptabilité">المحاسبة والاقتصاد</a></div>
  
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">computer</span><a class=" text-dark text-decoration-none" href="/ar/service/Maintenance">الصيانة و اعلام آلي</a></div>
  
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">router</span>  <a class=" text-dark text-decoration-none" href="/ar/service/Paraboles"> تثبيت أجهزة الاستقبال</a></div>
  
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">kitchen</span><a class=" text-dark text-decoration-none" href="/ar/service/Réparation">   إصلاح الاجهزة المنزلية</a></div>
        
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">gavel</span><a class=" text-dark text-decoration-none" href="/ar/service/Juridiques"> قانون</a></div>
  
  <div class="text-center p-2 font-weight-bold"> <span class="material-icons md-light">auto_stories</span><a class=" text-dark text-decoration-none" href="/ar/service/Ecole"> المدارس و التكوين</a></div>
  
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">directions_bus</span> <a class=" text-dark text-decoration-none" href="/ar/service/Transport"> نقل و المواصلات</a></div>
  
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">comment</span><a class=" text-dark text-decoration-none" href="/ar/service/Publicité">  اعلان و المواصلات</a></div>
  
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">ac_unit</span><a class=" text-dark text-decoration-none" href="/ar/service/Froid"> التبريد والتكييف</a></div>
  
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">medication</span><a class=" text-dark text-decoration-none" href="/ar/service/Médecine">الطب والصحة</a></div>
  
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">car_repair</span><a class=" text-dark text-decoration-none" href="/ar/service/Diagnostique">  إصلاح وتشخيص السيارات</a></div>
  
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">featured_play_list</span> <a class=" text-dark text-decoration-none" href="/ar/service/Projets"> بحوث و مشاريع</a></div>
  
  <div class="text-center p-2 font-weight-bold"> <span class="material-icons md-light">language</span><a class=" text-dark text-decoration-none" href="/ar/service/Bureautique"> مكتبيات و انترنت</a></div>
  
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">local_printshop</span><a class=" text-dark text-decoration-none" href="/ar/service/Impression">طباعة و نشر</a></div>
  
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">camera</span><a class=" text-dark text-decoration-none" href="/ar/service/Image"> سمعي بصري</a></div>
  
  <div class="text-center p-2 font-weight-bold"><i class="icofont-jacket float-end pe-3 fs-5"></i><a class=" text-dark text-decoration-none" href="/ar/service/Couture">الخياطة والتفصيل</a></div>
  
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">people</span> <a class=" text-dark text-decoration-none" href="/ar/service/Evènemets">  ترفيه و لقاءات</a></div>
  
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">build</span> <a class=" text-dark text-decoration-none" href="/ar/service/électroniques">تصليح اجهزة الكترونية</a></div>
  
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">flight</span><a class=" text-dark text-decoration-none" href="/ar/service/ar/Voyage">سفر</a></div>
  
  <div class="text-center p-2 font-weight-bold"><span class="material-icons md-light">sports_esports</span> <a class=" text-dark text-decoration-none" href="/ar/service/Jeux">الالعاب</a></div>
  <div  class="text-center p-2 font-weight-bold"><span class="material-icons md-light">watch</span> <a class=" text-dark text-decoration-none" href="/ar/service/Accessoires">إكسسوارات وأزياء</a></div>
  <div  class="text-center p-2 font-weight-bold"><span class="material-icons md-light">ice_skating</span>  <a class=" text-dark text-decoration-none" href="/ar/service/Vêtements">ألبسة و أحذية</a></div>
  <div  class="text-center p-2 font-weight-bold"><span class="material-icons md-light">sports_soccer</span> <a class=" text-dark text-decoration-none" href="/service/Sports">رياضة</a></div>
  <div  class="text-center p-2 font-weight-bold"><span class="material-icons md-light">receipt</span> <a class=" text-dark text-decoration-none" href="/service/Divers">متنوعات</a></div>



  </div>
  <div class="filter_result col-md-9 p-5">

  <div class="sub">
  <div class="mx-2">
    <div class="dropdown">
      <button class="filter dropbtn btn btn-primary" onclick="drop()"><i class="fa fa-filter"></i> تغيير</button>
      <div id="myDropdown" class="dropdown-content">
        <a onclick="change_param_ar('gps')"><i class="fa fa-map-marker"></i> باستعمال تحديد المواقع</a>
        <a onclick="change_param_ar('perso')"><i class="fa fa-hand-paper-o"></i>  بحث مخصص</a>
        <a onclick="change_param_ar('key')"><i class="fa fa-font"></i>  كلمات مفتاحية</a>
      </div>
    </div> 
   </div>
  

  <div class="param1" style="display: none;">
      <form action="/ar/filter_by_position"> 
      @csrf   
    <div  class="row">     
      
   
      <div class="sub_sub row">
        <div>

       <select class="form-control" name="categorie" id="categorie">
        <option value="Constructions et Travaux">الانشاءات والاعمال</option>
        <option value="Industrie et fabrication">الصناعة والتصنيع</option>
        <option value="Décoration et Aménagement">الديكور والترتيب</option>
        <option value="Traiteurs et Gateaux">حلويات</option>
        <option value="Nettoyage et jardinage">التنظيف والبستنة</option>
        <option value="Location de véhicules">تأجير المركبات</option>
        <option value="Securité et Alarme">أجهزة الامان</option>
        <option value="Menuiserie et Meubles">النجارة والأثاث</option>
        <option value="Hôtellerie">فندقة</option>
        <option value="Esthétique et Beauté">تجميل</option>
        <option value="Comptabilité et Economie">المحاسبة والاقتصاد</option>
        <option value="Maintenance et infromatique">الصيانة و اعلام آلي</option>
        <option value="Paraboles et démos">تثبيت أجهزة الاستقبال</option>
        <option value="Réparation Electromenager">إصلاح الاجهزة المنزلية</option>
        <option value="Juridique">قانون</option>
        <option value="Ecoles et formations">المدارس و التكوين</option>
        <option value="Transport et déménagement">نقل و المواصلات</option>
        <option value="Publicité et communication">اعلان و المواصلات</option>
        <option value="Froid et climatisation">التبريد والتكييف</option>
        <option value="Médecine et santé">الطب والصحة</option>
        <option value="Réparation auto et diagnostic">إصلاح وتشخيص السيارات</option>
        <option value="Projet et études">بحوث و مشاريع</option>
        <option value="Bureautique et internet">مكتبيات و انترنت</option>
        <option value="Impression et édition">طباعة و نشر</option>
        <option value="Image et son">سمعي بصري</option>
        <option value="Couture et confection">الخياطة والتفصيل</option>
        <option value="Evènement et Divertissement">ترفيه و لقاءات</option>
        <option value="Réparation Electronique">تصليح اجهزة الكترونية</option>
        <option value="Vouage">سفر</option>
        <option value="Jeux">الالعاب</option>
        <option value="Accessoires et Modes">إكسسوارات وأزياء</option>
        <option value="Vêtements et chaussures">ألبسة و أحذية</option>
        <option value="Sports et loisirs">رياضة</option>
        <option value="Divers">متنوعات</option>


  
      </select>
    </div>
      
    <input type="text" name="pos1" value=""  style="display: none;">
    <input type="text" name="pos2" value=""  style="display: none;">
   <div class="p-2">

   <select class="form-control" name="byposition" id="byposition" required>
    <option value="à proximité"><i class="fa fa-map-marker"></i> اماكن قريبة</option>
    <option value="n'importe">في اي مكان</option>
   </select>
  </div>
  

   <div class="p-2">
   <button  class="btn btn-primary" >  <i class="fa fa-search"></i></button>
   <a href="/ar/our_clients" class="btn btn-primary"><i class="fa fa-refresh"></i></a>
  </div>

</div>  

  </div>
  </form>
  
  
  </div>

  <div class="param2" style="display: none;">
    <form action="/ar/filter_by_position"> 
    @csrf   
  <div  class="row">     
    
 
    <div class="sub_sub form-group row">
      <div class="p-2">

    <select class="form-control" name="categorie" id="categorie">
      <option value="Constructions et Travaux">الانشاءات والاعمال</option>
      <option value="Industrie et fabrication">الصناعة والتصنيع</option>
      <option value="Décoration et Aménagement">الديكور والترتيب</option>
      <option value="Traiteurs et Gateaux">حلويات</option>
      <option value="Nettoyage et jardinage">التنظيف والبستنة</option>
      <option value="Location de véhicules">تأجير المركبات</option>
      <option value="Securité et Alarme">أجهزة الامان</option>
      <option value="Menuiserie et Meubles">النجارة والأثاث</option>
      <option value="Hôtellerie">فندقة</option>
      <option value="Esthétique et Beauté">تجميل</option>
      <option value="Comptabilité et Economie">المحاسبة والاقتصاد</option>
      <option value="Maintenance et infromatique">الصيانة و اعلام آلي</option>
      <option value="Paraboles et démos">تثبيت أجهزة الاستقبال</option>
      <option value="Réparation Electromenager">إصلاح الاجهزة المنزلية</option>
      <option value="Juridique">قانون</option>
      <option value="Ecoles et formations">المدارس و التكوين</option>
      <option value="Transport et déménagement">نقل و المواصلات</option>
      <option value="Publicité et communication">اعلان و المواصلات</option>
      <option value="Froid et climatisation">التبريد والتكييف</option>
      <option value="Médecine et santé">الطب والصحة</option>
      <option value="Réparation auto et diagnostic">إصلاح وتشخيص السيارات</option>
      <option value="Projet et études">بحوث و مشاريع</option>
      <option value="Bureautique et internet">مكتبيات و انترنت</option>
      <option value="Impression et édition">طباعة و نشر</option>
      <option value="Image et son">سمعي بصري</option>
      <option value="Couture et confection">الخياطة والتفصيل</option>
      <option value="Evènement et Divertissement">ترفيه و لقاءات</option>
      <option value="Réparation Electronique">تصليح اجهزة الكترونية</option>
      <option value="Voyage">سفر</option>
      <option value="Jeux">الالعاب</option>
      <option value="Accessoires et Modes">إكسسوارات وأزياء</option>
      <option value="Vêtements et chaussures">ألبسة و أحذية</option>
      <option value="Sports et loisirs">رياضة</option>
      <option value="Divers">متنوعات</option>


    </select>
  </div>
<div class="p-2">

    <select name="wilaya" class="form-control" id="wilaya" required>
      <option value="Adrar">   ادرار  01 </option> 
      <option value="Chlef">02   الشلف  </option> 
      <option value="Laghouat">03   الأغواط  </option> 
      <option value="Oum el Bouaghi">04 أم البواقي</option> 
      <option value="Batna">05   باتنة  </option> 
      <option value="Béjaïa">06   بجاية  </option> 
      <option value="Biskra">07  بسكرة  </option> 
      <option value="Béchar">08  بشار  </option> 
      <option value="Blida">09  البليدة  </option> 
      <option value="Bouira">10  البويرة  </option> 
      <option value="Tamanrasset">11  تمنراست  </option> 
      <option value="Tébessa">12  تبسة  </option> 
      <option value="Tlemcen">13  تلمسان  </option> 
      <option value="Tiaret">14   تيارت  </option> 
      <option value="Tizi Ouzou">15  تيزي وزو  </option> 
      <option value="Alger">16  الجزائر  </option> 
      <option value="Djelfa">17  الجلفة  </option> 
      <option value="Jijel">18  جيجل  </option> 
      <option value="Sétif">19  سطيف  </option> 
      <option value="Saida">20  سعيدة  </option> 
      <option value="Skikda">21  سكيكدة  </option> 
      <option value="Sidi-Bel- Abbès">22  سيدي بلعباس </option> 
      <option value="Annaba">23  عنابة  </option> 
      <option value="Guelma">24  قالمة  </option> 
      <option value="Constantine">25  قسنطينة  </option> 
      <option value="Médéa">26  المدية  </option> 
      <option value="Mostaganem">27  مستغانم  </option> 
      <option value="M'Sila">28  مسيلة  </option> 
      <option value="Mascara">29 معسكر  </option> 
      <option value="Ouargla">30  ورقلة  </option> 
      <option value="Oran">31  وهران  </option> 
      <option value="illizi">33  اليزي  </option> 
      <option value="Bordj Bou Arreridj">34  برج بوعريريج </option> 
      <option value="Boumerdès">35  بومرداس  </option> 
      <option value="El Tarf">36  الطارف  </option> 
      <option value="Tindouf">37  تيندوف  </option> 
      <option value="Tissemsilt">38  تيسمسيلت  </option> 
      <option value="El Oued">39  الواد  </option> 
      <option value="Khenchela">40  خنشلة  </option> 
      <option value="Souk-Ahras">41  سوق أهراس  </option> 
      <option value="Tipaza">42  تيبازة  </option> 
      <option value="Mila">43  ميلة  </option> 
      <option value="Aïn Defla">44  عين الدفلى  </option> 
      <option value="Naâma">45  النعامة  </option> 
      <option value="Aïn Témouchent">46  عين تيموشنت </option> 
      <option value="Ghardaia">47  غرداية  </option> 
      <option value="Relizane">48  غيليزان  </option> 
      <option value="Timimoun">49 تيميمون</option>
      <option value="Bordj Badji Mokhtar">50 برح باجي مختار</option>
      <option value="Ouled Djellal">51 ولاد جلال</option>
      <option value="Béni Abbès">52 بني عباس</option>
      <option value="In Salah">53 عين صالح</option>
      <option value="In Guezzam">54 عين قزام</option>
      <option value="Touggourt">55 توغرت</option>
      <option value="Djanet">56 جانت</option>
      <option value="El M'Gahir">57 المغير</option>
      <option value="El Meniaa">58 المنيعة</option>
  </select>
</div>
<div class="p-2">

  <select name="commune" class="form-control" id="commune" required>

  </select>

</div>

  <div class="p-2">
   <button  class="btn btn-primary" >  <i class="fa fa-search"></i></button>
   <a href="/ar/our_clients" class="btn btn-primary"><i class="fa fa-refresh"></i></a>
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
  <form action="/ar/filter_by_position"> 
    @csrf 
    <div class="sub_sub form-group row">
      <div>
        <input type="text" class="keyword form-control" name="keyword" placeholder="كلمة مفتاحية">
        <input type="text" name="pos1" value=""  style="display: none;">
        <input type="text" name="pos2" value=""  style="display: none;">
         
      
      </div>
  <div class="mx-2">
   <button  class="btn btn-primary">  <i class="fa fa-search"></i></button>
   <a href="/ar/our_clients" class="btn btn-primary"><i class="fa fa-refresh"></i></a>
  </div>  
  </div>  
  </form>

</div>
</div>
  <div class="">
  

  <div>
  <p> <strong>{{ $msg ?? '' }} </strong> </p>
  </div>

  
  @if($users->count() > 0)
  <div class="row">
      @foreach ($users as $user)
  

   <div class="col-lg-4 col-md-6 col-sm-6 my-3" ontouchstart="this.classList.toggle('hover');">
    <div class="container">
      @if($user->photo != NULL)
    <div class="front" style="background-image: url({{ Storage::disk('s3')->url($user->photo) }}) ;">
      @else
    <div class="front" style="background-image: url({{asset('css/avatar.png')}});">
      
      @endif
        <div class="inner">
          <p>{{ $user->name }}</p>
          <span class="p-0 toggledText">
            {{ $user->function }}</span>
        </div>
      </div>
      <div class="back">
        <div class="inner">
        <p> <a href="/ar/contact_client/{{ $user->id }}" class="btn btn-primary" target="blank"><i class="fa fa-plus"></i> تفاصيل</a></p>
        </div>
      </div>
    </div>
  </div>
      
     


      @endforeach
    </div>

  </div>
  @else
  <div class="column">

  <h3 class="text-center">  لايوجد نتائج
  </h3>

  <div style="display: flex; flex-direction:row; justify-content:center;">
    <img src="{{ asset('css/no_result.jpg')}}" alt="koudami no result" class="responsive" width="auto" height="500px">

  </div>
</div>
  

@endif
  <div class="row-links">

  {{ $users->onEachSide(2)->links() }}
  </div>
</div>
  </div>
</div>
  
<footer class="bg-dark border  text-lg-start shadow-lg">
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
              <a class="text-light text-decoration-none" href="#"><i class="fa fa-map-marker  ms-5 me-2 my-2"></i>&nbsp; رقم 03 تجزئة زموري طريق القمم درارية الجزائر</a>
          </li>
          <li>
              <a class="text-light text-decoration-none" href="#"><i class="fa fa-phone"></i>&nbsp; 05 61 09 04 05 / 023 35 43 43</a>
          </li>
          <li>
              <a class="text-light text-decoration-none" href="#"><i class="fa fa-envelope"></i>&nbsp;contact@koudami.com</a>
          </li>
          <li>
              <a class="text-light text-decoration-none" href="#"><i class="fa fa-internet-explorer"></i>&nbsp;koudami.com</a>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style>
 
  

  *{
  margin: 0;
  padding: 0;
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
}

h1{
  font-size: 2.5rem;
  font-family: 'Montserrat';
  font-weight: normal;
  color: #444;
  text-align: center;
  margin: 2rem 0;
}

.wrapper{
  width: 90%;
  margin: 0 auto;
  max-width: 80rem;
}

.cols{
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
      flex-wrap: wrap;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
}

.col{
  width: calc(25% - 2rem);
  margin: 1rem;
  cursor: pointer;
}

.container{
  -webkit-transform-style: preserve-3d;
          transform-style: preserve-3d;
  -webkit-perspective: 1000px;
          perspective: 1000px;
}

.front,
.back{
  background-size: cover;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.25);
  border-radius: 10px;
  background-position: center;
  -webkit-transition: -webkit-transform .7s cubic-bezier(0.4, 0.2, 0.2, 1);
  transition: -webkit-transform .7s cubic-bezier(0.4, 0.2, 0.2, 1);
  -o-transition: transform .7s cubic-bezier(0.4, 0.2, 0.2, 1);
  transition: transform .7s cubic-bezier(0.4, 0.2, 0.2, 1);
  transition: transform .7s cubic-bezier(0.4, 0.2, 0.2, 1), -webkit-transform .7s cubic-bezier(0.4, 0.2, 0.2, 1);
  -webkit-backface-visibility: hidden;
          backface-visibility: hidden;
  text-align: center;
  min-height: 280px;
  height: auto;
  border-radius: 10px;
  color: #fff;
  font-size: 1rem;
}

.back{
  background: #cedce7;
  background: -webkit-linear-gradient(45deg,  #cedce7 0%,#596a72 100%);
  background: -o-linear-gradient(45deg,  #cedce7 0%,#596a72 100%);
  background: linear-gradient(45deg,  #cedce7 0%,#596a72 100%);
}

.front:after{
  position: absolute;
    top: 0;
    left: 0;
    z-index: 1;
    width: 100%;
    height: 100%;
    content: '';
    display: block;
    opacity: .6;
    background-color: #000;
    -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
    border-radius: 10px;
}
.container:hover .front,
.container:hover .back{
    -webkit-transition: -webkit-transform .7s cubic-bezier(0.4, 0.2, 0.2, 1);
    transition: -webkit-transform .7s cubic-bezier(0.4, 0.2, 0.2, 1);
    -o-transition: transform .7s cubic-bezier(0.4, 0.2, 0.2, 1);
    transition: transform .7s cubic-bezier(0.4, 0.2, 0.2, 1);
    transition: transform .7s cubic-bezier(0.4, 0.2, 0.2, 1), -webkit-transform .7s cubic-bezier(0.4, 0.2, 0.2, 1);
}

.back{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
}

.inner{
    -webkit-transform: translateY(-50%) translateZ(60px) scale(0.94);
            transform: translateY(-50%) translateZ(60px) scale(0.94);
    top: 50%;
    position: absolute;
    left: 0;
    width: 100%;
    padding: 2rem;
    -webkit-box-sizing: border-box;
            box-sizing: border-box;
    outline: 1px solid transparent;
    -webkit-perspective: inherit;
            perspective: inherit;
    z-index: 2;
}

.container .back{
    -webkit-transform: rotateY(180deg);
            transform: rotateY(180deg);
    -webkit-transform-style: preserve-3d;
            transform-style: preserve-3d;
}

.container .front{
    -webkit-transform: rotateY(0deg);
            transform: rotateY(0deg);
    -webkit-transform-style: preserve-3d;
            transform-style: preserve-3d;
}

.container:hover .back{
  -webkit-transform: rotateY(0deg);
          transform: rotateY(0deg);
  -webkit-transform-style: preserve-3d;
          transform-style: preserve-3d;
}

.container:hover .front{
  -webkit-transform: rotateY(-180deg);
          transform: rotateY(-180deg);
  -webkit-transform-style: preserve-3d;
          transform-style: preserve-3d;
}

.front .inner p{
  font-size: 1.2rem;
  margin-bottom: 2rem;
  position: relative;
}

.front .inner p:after{
  content: '';
  width: 4rem;
  height: 2px;
  position: absolute;
  background: #C6D4DF;
  display: block;
  left: 0;
  right: 0;
  margin: 0 auto;
  bottom: -.75rem;
}

.front .inner span{
  color: rgb(255, 255, 255);
  font-family: 'Montserrat';
  font-weight: 500;
}

@media screen and (max-width: 64rem){
  .col{
    width: calc(33.333333% - 2rem);
  }
}

@media screen and (max-width: 48rem){
  .col{
    width: calc(50% - 2rem);
  }
}

@media screen and (max-width: 32rem){
  .col{
    width: 100%;
    margin: 0 0 2rem 0;
  }
}

  #cat,#cat_child{
      display: none;
    }
   
    @media only screen and (max-width:990px) {
      
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
p{
  word-break: break-word;
}

.sub{
  margin-bottom: 3% !important;

}


#articles    .row-flex {
  display: flex;
  flex-wrap: wrap;
}


/* vertical spacing between columns */

#articles [class*="col-"] {
  margin-bottom: 30px;
}


.responsive{
    width: 78%;
    max-height: 400px;
    height: auto;    
    }
    </style>

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
  language:'fr'
};
localStorage.setItem('myJavaScriptObject', JSON.stringify(obj));
location.replace('/fr/our_clients');

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

  





</script>
