<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="{{ asset('js/language.js')}}" defer></script>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>قدامي توظيف</title>

    <link rel="icon" href="{{ asset('css/logo.png') }}">
    {{-- <link rel="stylesheet" href="{{asset('css/main.css')}}"> --}}
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <meta name="author" content="koudami">
    <meta name="description" content="">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">


    <!-- Fonts -->
 
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
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
                <a class="nav-link" href="/ar/store/show_articles">المتجر</a>
              </li>
              <li class="nav-item mr-1">
                <a class="nav-link" href="/ar/jobs/all_articles">عروض عمل</a>
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
        <div id="cat" class="col-sm-12 bg-light row p-0 w-100" style="margin:0 !important;">
          <div class="col-sm-12 bg-primary d-flex flex-row justify-content-end">
            <button class="btn text-light text-right" onclick="show_cat_child()"><i class="fa fa-list fa-xs"></i>&nbsp; &nbsp;<span> الاصناف </span></button>   
          
          </div>
          <div id="cat_child" class="col-sm-12">
            <ul class="rounded py-2 px-3 text-right"  id="boutique_links">
              <li><a class="btn text-right " href="Fabrication et travail en entrepôt">تصنيع و عمل في المستودعات</a></li>
              <li><a class="btn text-right " href="Vente et commerce de détail">تجارة التجزئة</a></li>
              <li><a class="btn text-right " href="Informatique">اعلام الي</a></li>
              <li><a class="btn text-right " href="Installation, entretien et réparation ">التركيب والصيانة والإصلاح</a></li>
              <li><a class="btn text-right " href="Transports et logistique">النقل والخدمات اللوجستية</a></li>
              <li><a class="btn text-right " href="Direction">ادارة</a></li>
              <li><a class="btn text-right " href="Service client">خدمة الزبائن</a></li>
              <li><a class="btn text-right " href="Comptabilité et finance">محاسبة و مالية  </a></li>
              <li><a class="btn text-right " href="Science et ingénierie">علوم و هندسة</a></li>
              <li><a class="btn text-right " href="Activités commerciales">انشطة تجارية</a></li>
              <li><a class="btn text-right " href="Construction">بناء</a></li>
              <li><a class="btn text-right " href="Ressources humaines">الموارد البشرية</a></li>
              <li><a class="btn text-right " href="Restauration et hôtellerie">فندقة</a></li>
              <li><a class="btn text-right " href="Médias, communication et rédaction">الإعلام و المواصلات والكتابة</a></li>
              <li><a class="btn text-right " href="Administration et travail de bureau">ادارة و عمل مكتبي</a></li>
              <li><a class="btn text-right " href="Publicité et marketing">الدعاية والتسويق</a></li>
              <li><a class="btn text-right " href="Enseignement">تعليم</a></li>
              <li><a class="btn text-right " href="Agriculture et travail en plein air">الزراعة والعمل الخارجي</a></li>
              <li><a class="btn text-right " href="Services à la personne">خدمات شخصية</a></li>
              <li><a class="btn text-right " href="Santé">صحة</a></li>
              <li><a class="btn text-right " href="Art, mode et design">الفن والموضة والتصميم</a></li>
              <li><a class="btn text-right " href="Nettoyage et équipements">التنظيف والمعدات</a></li>
              <li><a class="btn text-right " href="Services de protection">الخدمات والحماية</a></li>
              <li><a class="btn text-right " href="Énergie et mines">الطاقة والتعدين</a></li>
              <li><a class="btn text-right " href="Bien-être animal">حماية الحيوان</a></li>
              <li><a class="btn text-right " href="Divertissement et voyage">الترفيه والسفر</a></li>
              <li><a class="btn text-right " href="Juridique">خدمات قانونية</a></li>
              <li><a class="btn text-right " href="Immobilier">خدمة العقارات</a></li>
              <li><a class="btn text-right " href="Services sociaux et org. à but non lucratif">الخدمات الاجتماعية والمنظمات غير الهادفة للربح</a></li>
              <li><a class="btn text-right " href="Sports, remise en forme et loisirs">الرياضة واللياقة البدنية والترفيه</a></li>
              
            </ul>

          </div>
        </div>


        <main class="py-4">
            <div class="container">
              
                  <div class="column">
                    <div class="col-sm-12">

                        <form action="/ar/jobs/find_article" method="GET" class="row  justify-content-center align-items-center     justify-content-center align-items-center">
                            @csrf
                       
                         
    
                            <input type="text" name="pos1" value=""  style="display: none;">
                            <input type="text" name="pos2" value=""  style="display: none;">
                 
                      
                        <div class="col-sm-2 col-md-1">
                            <p>
                                <a class="btn btn-dark" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fa fa-plus"></i>
                                </a>
                               
                            </p>
                           
                        </div>
                        <div class="collapse form-group row col-sm-5 col-md-5"   id="collapseExample">
                            <div class="col-sm-6">

                                <select name="commune"  id="commune" class="form-control">
                            <option value="" > البلدية </option>
                                </select>
                            
                            </div>
                            <div class="col-sm-6">
                                <select name="wilaya" class="form-control" id="wilaya">
                                    <option value=""> الولاية </option>
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
                        
                         
                        </div>
                    
                        <div class="form-group col-sm-3">
                            
                            
                            <input type="text" list="categories" class="form-control" name="keyword" id="categorie" placeholder="بحث" required>
    
                                <datalist id="categories" >
                                  <option value="Fabrication et travail en entrepôt">تصنيع و عمل في المستودعات</option>
                                  <option value="Vente et commerce de détail">تجارة التجزئة</option>
                                  <option value="Informatique">اعلام الي</option>
                                  <option value="Installation, entretien et réparation ">التركيب والصيانة والإصلاح </option>
                                  <option value="Transports et logistique">النقل والخدمات اللوجستية</option>
                                  <option value="Direction">ادارة</option>
                                  <option value="Service client">خدمة الزبائن</option>
                                  <option value="Comptabilité et finance">محاسبة و مالية</option>
                                  <option value="Science et ingénierie">علوم و هندسة</option>
                                  <option value="Activités commerciales">انشطة تجارية</option>
                                  <option value="Construction">بناء</option>
                                  <option value="Ressources humaines">الموارد البشرية</option>
                                  <option value="Restauration et hôtellerie">فندقة</option>
                                  <option value="Médias, communication et rédaction">الإعلام و المواصلات والكتابة</option>
                                  <option value="Administration et travail de bureau">ادارة و عمل مكتبي</option>
                                  <option value="Publicité et marketing">الدعاية والتسويق</option>
                                  <option value="Enseignement">تعليم</option>
                                  <option value="Agriculture et travail en plein air">الزراعة والعمل الخارجي</option>
                                  <option value="Services à la personne">خدمات شخصية</option>
                                  <option value="Santé">صحة</option>
                                  <option value="Art, mode et design">الفن والموضة والتصميم</option>
                                  <option value="Nettoyage et équipements">التنظيف والمعدات</option>
                                  <option value="Services de protection">الخدمات والحماية</option>
                                  <option value="Énergie et mines">الطاقة والتعدين</option>
                                  <option value="Bien-être animal">حماية الحيوان</option>
                                  <option value="Divertissement et voyage">الترفيه والسفر</option>
                                  <option value="Juridique">خدمات قانونية</option>
                                  <option value="Immobilier">خدمة العقارات</option>
                                  <option value="Services sociaux et org. à but non lucratif">الخدمات الاجتماعية والمنظمات غير الهادفة للربح</option>
                                  <option value="Sports, remise en forme et loisirs">الرياضة واللياقة البدنية والترفيه</option>
                                  
                                </datalist>
                            </div>
                            <div class="form-group d-flex flex-row-reverse col-sm-3 col-md-2">
                                <button class="btn btn-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                                <a class="btn btn-dark mr-1" href="/ar/jobs/all_articles">
                                    <i class="fa fa-refresh">
    
                                    </i>
                                </a>
                            </div>
                           

                        </form>

                    </div>
                   
                    <article class="row">
                    
                      <div id="articles" class="col-lg-9">
                        @if($articles->count()>0)

                        <div class="row justify-content-between px-3">
                       @foreach ($articles as $item)
                    
                       <div class="card col-lg-12 p-4 rounded  m-0">
                        <div class="d-flex flex-row justify-content-center flex-wrap align-items-center">
  
  
                        <div class="col-lg-8 col-md-12  order-lg-0 order-md-1 text-right">
  
                         <ul >
                          <li>  {{ $item->emploi}} : الوظيفة</li>
                          <li>  {{ $item->categorie_emploi}} : الصنف</li>
                          <li><span>  الراتب  :</span>  <span> دج  {{ $item->salaire }}</span>   </li>
                          <li> {{ $item->contact}} &nbsp;&nbsp;  : للتواصل</li>
                          <li>: توضيح  </li>
                          <li> &nbsp;&nbsp;<span class="toggledText">{{ $item->description}}</span> </li>
                          <li><strong> {{ $item->publicateurName }} : نشر من طرف</strong></li>                        
                          <li><strong>  &nbsp; &nbsp; {{ $item->created_at }} : تاريخ النشر </strong></li>
                       
                           
                      </ul> 
                     
                  </div>
                  <div class="col-lg-4 col-md-12 order-lg-1 order-md-0 p-sm-3">
                      <img class="rounded" src="{{ asset($item->photo) }}" alt="">
                  </div>
                       
                </div>
  
                      </div>
                       @endforeach
                            
    
    
    
                        </div>
                        @else
                        <div class="column">
                  
                   
                  
                          <div style="display: flex; flex-direction:row; justify-content:center;">
                            <img src="{{ asset('css/no_result.jpg')}}" alt="koudami no result" class="responsive" width="auto" height="500px">
                        
                          </div>
                        </div>
                        @endif
                    
                    </div>
                    <aside class="col-lg-3   order-sm-0 order-0 order-lg-1">

                  <div class="d-none d-lg-block border rounded p-3 shadow mb-3">
                    <h3 class="text-center my-2  text-light bg-primary  font-weight-bold rounded py-2"> &nbsp; &nbsp; الفئات</h3>

                    <ul class="rounded py-2 px-3 text-right"  id="boutique_links">
                      <li><a class="btn text-right " href="Fabrication et travail en entrepôt">تصنيع و عمل في المستودعات</a></li>
                      <li><a class="btn text-right " href="Vente et commerce de détail">تجارة التجزئة</a></li>
                      <li><a class="btn text-right " href="Informatique">اعلام الي</a></li>
                      <li><a class="btn text-right " href="Installation, entretien et réparation ">التركيب والصيانة والإصلاح</a></li>
                      <li><a class="btn text-right " href="Transports et logistique">النقل والخدمات اللوجستية</a></li>
                      <li><a class="btn text-right " href="Direction">ادارة</a></li>
                      <li><a class="btn text-right " href="Service client">خدمة الزبائن</a></li>
                      <li><a class="btn text-right " href="Comptabilité et finance">محاسبة و مالية  </a></li>
                      <li><a class="btn text-right " href="Science et ingénierie">علوم و هندسة</a></li>
                      <li><a class="btn text-right " href="Activités commerciales">انشطة تجارية</a></li>
                      <li><a class="btn text-right " href="Construction">بناء</a></li>
                      <li><a class="btn text-right " href="Ressources humaines">الموارد البشرية</a></li>
                      <li><a class="btn text-right " href="Restauration et hôtellerie">فندقة</a></li>
                      <li><a class="btn text-right " href="Médias, communication et rédaction">الإعلام و المواصلات والكتابة</a></li>
                      <li><a class="btn text-right " href="Administration et travail de bureau">ادارة و عمل مكتبي</a></li>
                      <li><a class="btn text-right " href="Publicité et marketing">الدعاية والتسويق</a></li>
                      <li><a class="btn text-right " href="Enseignement">تعليم</a></li>
                      <li><a class="btn text-right " href="Agriculture et travail en plein air">الزراعة والعمل الخارجي</a></li>
                      <li><a class="btn text-right " href="Services à la personne">خدمات شخصية</a></li>
                      <li><a class="btn text-right " href="Santé">صحة</a></li>
                      <li><a class="btn text-right " href="Art, mode et design">الفن والموضة والتصميم</a></li>
                      <li><a class="btn text-right " href="Nettoyage et équipements">التنظيف والمعدات</a></li>
                      <li><a class="btn text-right " href="Services de protection">الخدمات والحماية</a></li>
                      <li><a class="btn text-right " href="Énergie et mines">الطاقة والتعدين</a></li>
                      <li><a class="btn text-right " href="Bien-être animal">حماية الحيوان</a></li>
                      <li><a class="btn text-right " href="Divertissement et voyage">الترفيه والسفر</a></li>
                      <li><a class="btn text-right " href="Juridique">خدمات قانونية</a></li>
                      <li><a class="btn text-right " href="Immobilier">خدمة العقارات</a></li>
                      <li><a class="btn text-right " href="Services sociaux et org. à but non lucratif">الخدمات الاجتماعية والمنظمات غير الهادفة للربح</a></li>
                      <li><a class="btn text-right " href="Sports, remise en forme et loisirs">الرياضة واللياقة البدنية والترفيه</a></li>
                      
                    </ul>
               
                  </div>
                </aside>
              </article>
              {{ $articles->links() }}
   
            </div>





                  </div>   
        </main>
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
      <form action="/ar/jobs/article_search" hidden id="boutique_form" method="GET">
        @csrf
        <input type="text" name="pos1" value=""  style="display: none;">
        <input type="text" name="pos2" value=""  style="display: none;">
        <input type="text" name="keyword" value="" id="keyword">
        <input type="submit" value="valider">
      </form>
</body>
</html>
<script type="text/javascript">

function show_cat_child()
{
  $("#cat_child").toggle(500);
}

function show_categorie(){

$("#boutique_links").parent().toggleClass('d-none d-lg-block');
console.log($("#boutique_links").parent().parent().parent().css('flex-direction'))
}
$(document).ready(function(){

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

    
  var tab=myMap.get("Adrar");
var tab2=ar_myMap.get('Adrar');
  var i=0;
  for(i=0;i<tab.length;i++){
    $("select#commune").append('<option value="'+tab[i]+'">'+tab2[i]+'</option>');
        }
    $("select#wilaya").change(function(){
        var selectedCountry = $(this).children("option:selected").val();
        $("select#commune").empty();
        var tab=myMap.get(selectedCountry);
        var tab2=ar_myMap.get(selectedCountry);
        var i=0;
        for(i=0;i<tab.length;i++){
         $("select#commune").append('<option value="'+tab[i]+'">'+tab2[i]+'</option>');
        }

    });



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
location.replace('/fr/jobs/all_articles');

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
    
    img{
        border-radius: 11px;
        max-width: 100%;
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


::-webkit-scrollbar-track {
  background: #f1f1f1;
}

::-webkit-scrollbar-thumb {
  background: rgb(2, 123, 153)  ;
}

li{
    list-style: none;
    overflow: hidden;
}
.responsive{
    width: 100%;
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

#articles [class*="col-"] {
  margin-bottom: 30px;
}

.content {
  height: 100%;
  padding: 20px 20px 10px;
}


</style>