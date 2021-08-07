<!doctype html>
<html lang="ar-DZ">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="koudami">
    <link href="{{ asset('icofont/icofont.min.css')}}" rel="stylesheet">

    <title>Koudami التسجيل </title>
    <meta name="description" content="مرحبا بك في صفحة التسجيل الخاصة بقدامي اذا كنت تريد تطوير مشروعك او توسيع مجال عملك فانت في المكان المناسب سارع في التسجيل">

    <script src="{{ asset('js/language.js')}}" defer></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
<div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">
        <a href="/ar"> <img src="{{ asset('images/logo.png') }}" alt="Koudami" width="70px" height="70px"></a>
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
        <div class="col-md-8">
            <div class="card no-border shadow-sm" id="parent">
                <div class="card-header  text-light text-center d-flex flex-row justify-content-center py-2" style="background: linear-gradient(45deg,rgb(0, 0, 73),dodgerblue)">

                    <h4 class="text-light">
                 
                    التسجيل   <i class="fa fa-user-plus"></i>
                </h4>
            </div>
    
                     
                <div class="card-body">
                    <div  id="theimage"> </div>   
                    <div class="d-flex flex-row-reverse align-items-center">
                        <div id="loadingstate"></div>
                        <div id="nonloadingstate"></div>
                        
                        <div class="text-secondary" id="state">انتهت(1/4)</div>
                    </div>
                        <form method="POST" action="{{ route('register') }}" >
                        @csrf
                            
                       <div class="card no-border shadow-sm" id="first">
                           <div class="card-body">
                            <h4 class="text-right"> معلومات شخصية</h4>

                               <div class="form-group row justify-content-end">
                               
                                   <div class="col-md-6 order-1 order-md-0">
                                       <input id="name" placeholder="الاسم" type="text" class="form-control no-border shadow no-border shadow" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
       
                                       <span id="identiferror"  style="color: rgb(202, 4, 4);font-weight:bold;"></span>

                                   </div>
                                   <label for="name" class="col-md-3 col-form-label text-right order-0 order-md-1">الاسم</label>
       
                               </div>
                            
       
                           
                            
                               <div class="form-group row justify-content-end">
                      
                                   <div class="col-md-6 order-1 order-md-0">
                                       <input id="email" placeholder="البريد الالكتروني"  type="email" class="form-control no-border shadow no-border shadow" name="email" value="{{ old('email') }}" required autocomplete="email">
       
                                       <span id="emailerror" style="color: rgb(202, 4, 4);font-weight:bold;"></span>
                                                
                                       <div class="d-flex flex-row justify-content-center py-3" >
                                           <div class="spinner-border" role="status" id="onlyspinner" >
                                               <span class="sr-only">Loading...</span>
                                             </div>

                                       </div>
                                   </div>
                                   <label for="email" class="col-md-3 col-form-label text-right order-0 order-md-1">البريد الالكتروني</label>
       
                               </div>

                               <div class="form-group d-flex flex-row justify-content-start">

                                <button class="btn shadow-sm bg-primary text-light" type="button" onclick="forwardfrom('first')">
                                    <i class="fa fa-arrow-left"></i>  التالي 
                                </button>
                                

                                 </div>
                           </div>
                       </div> 

                       <div id="second" class="card shadow-sm no-border" >
                           <div class="card-body">
                            <h4 class="text-right"> معلومات حول الوظيفة</h4>


                            <div class="form-group row justify-content-end">
                            
                                <div class="col-md-4 order-1 order-md-0">
                                    <select name="type_inscription" class="form-control no-border shadow" id="type_inscription" >
                                        <option value="entreprise" class="selected">
                                            مؤسسة   </option> 
                                   <option value="particulier">خاص </option>     
                                    </select>
                                
                                </div>
                                        <label for="prenom" class="col-md-3 col-form-label text-right order-0 order-md-1">طريقة التسجيل</label>
                 
                             
        
                                </div>
        
                                <div class="form-group row justify-content-end">
                                    <div class="col-md-4 order-1 order-md-0">
            
                                    <select name="categorie" id="categorie" class="form-control no-border shadow" data-live-search="true">
                                        <option value="Constructions et Travaux">الانشاءات والاعمال</option>
                                        <option value="Industrie et fabrication">الصناعة والتصنيع</option>
                                        <option value="Décoration et Aménagement">الديكور والترتيب</option>
                                        <option value="Traiteurs et Gateaux">حلويات</option>
                                        <option value="Nettoyage et jardinage">التنظيف والبستنة</option>
                                        <option value="Location de véhicules">تأجير المركبات</option>
                                        <option value="Securité et Alarme">أجهزة الامان</option>
                                        <option value="Menuiserie et Meubles">النجارة والأثاث</option>
                                        <option value="Hôtellerie"> فندقة</option>
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
                                        <option value="Vêtement et chaussures">ألبسة و أحذية</option>
                                        <option value="Sports et loisirs">رياضة</option>
                                        <option value="Divers">متنوعات</option>
            
            
                                    </select>  
            
                                </div>
                                    <label for="categorie" class="col-md-3 col-form-label text-right order-0 order-md-1"> الصنف</label>
                                </div>  
                                <div class="form-group row justify-content-end">
                                    <div class="col-md-4 order-1 order-md-0">
                                        <textarea name="function" class="no-border shadow" id="function" placeholder="مثال : بناء ، لحام ، دهان ، جزار ، محامي " list="functions" cols="30" rows="10"></textarea>
                                        <span id="functionerror" style="color: rgb(202, 4, 4);font-weight:bold;"></span>
                                        
                                        
                                    </div>
                                    <label for="function" class="col-md-4  col-form-label text-right order-0 order-md-1">الوظيفة</label>
                                    
                                </div>

                                <div class="form-group d-flex flex-row justify-content-between">
                                    <button  class="btn shadow-sm bg-primary text-light" type="button" onclick="forwardfrom('second')"  >
                                          <i class="fa fa-arrow-left"></i> التالي 
                                    </button>
                                    <button class="btn shadow-sm bg-primary text-light" type="button" onclick="backwardfrom('second')">
                                        السابق   <i class="fa fa-arrow-right"></i>
                                    </button>

                                    

                                </div>
                                

                           </div>
                       </div>
    
                       <div id="third" class="card shadow-sm no-border">
                           <div class="card-body">
                            <h4 class="text-right"> معلومات حول مكان العمل</h4>
                            <div class="form-group row justify-content-end">
                      
                                <div class="col-md-4 order-1 order-md-0">
                                 
                            <select name="wilaya" class="form-control no-border shadow no-border shadow" id="wilaya" required>
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
                         <label for="wilaya" class="col-md-3 col-form-label text-right order-0 order-md-1">الولاية</label>
    
                       </div>
    
                            <div class="form-group row justify-content-end ">
                           
                                <div class="col-md-4 order-1 order-md-0">
                                    <select name="commune" class="form-control no-border shadow"   id="commune" class="float-right" required>
                               
                                    </select>
                                </div>
                                <label for="commune" class="col-md-3  col-form-label text-right order-0 order-md-1">البلدية</label>
                            </div>
                            <div class="form-group row justify-content-end">
                                <div class="col-md-4 order-1 order-md-0">
                                    <input id="adresse" type="text" class="form-control no-border shadow" name="adresse" placeholder="اختياري" >
                             
                                </div>
                                <label for="adresse" class="col-md-3 col-form-label text-right order-0 order-md-1">العنوان</label>
                              
                            </div>

                            <div class="form-group d-flex flex-row justify-content-between">
                                <button  class="btn shadow-sm bg-primary text-light" type="button" onclick="forwardfrom('third')"  >
                                      <i class="fa fa-arrow-left"></i> التالي 
                                </button>
                                <button class="btn shadow-sm bg-primary text-light" type="button" onclick="backwardfrom('third')">
                                    السابق   <i class="fa fa-arrow-right"></i>
                                </button>

                                

                            </div>
                           </div>



                          </div>
                   
                          
                          <div id="forth" class="card shadow-sm no-border">
                              <div class="card-body">
                            <h4 class="text-right"> معلومات   سرية</h4>

                                <div class="form-group row justify-content-end">
                              
                                    <div class="col-md-6 order-1 order-md-0">
                                        <input id="password" placeholder="8 احرف و ارقام على الاقل" type="password" class="form-control no-border shadow" name="password" required autocomplete="new-password">
                                        
                                        <span id="passworderror" style="color: rgb(202, 4, 4);font-weight:bold;"></span>
                                        
                                      </div>
                                      <label for="password" class="col-md-3 col-form-label text-right order-0 order-md-1">كلمة السر</label>
                                      
                                  </div>
                                  
                                  <div class="form-group row justify-content-end">
                                      
                                      <div class="col-md-6 order-1 order-md-0">
                                          <input id="password-confirm" placeholder="تأكيد كلمة السر" type="password" class="form-control no-border shadow" name="password_confirmation" required autocomplete="new-password">
                                          <span id="passwordconfirmerror"  style="color: rgb(202, 4, 4);font-weight:bold;"></span>
                                          
                                      </div>
                                      <label for="password-confirm" class="col-md-3 col-form-label text-right order-0 order-md-1">تأكيد كلمة السر</label>
                                      
                                  </div>
                                  
                                  <div class="form-group row justify-content-end">
                               
                                      <div class="col-md-6 order-1 order-md-0">
                                          <input id="phone_number" type="tel" placeholder="0X XX XX XX XX" pattern="[0-9]{10,}" class="form-control no-border shadow" name="phone_number" required >
                                          <span id="phonenumbererror" style="color: rgb(202, 4, 4);font-weight:bold;"></span>
                                    
                                      </div>
                                      <label for="phone_number" class="col-md-3 col-form-label text-right order-0 order-md-1">رقم الهاتف</label>
          
                                  </div>
                                  <div class="form-group d-flex flex-row justify-content-between">
                                    <button  class="btn shadow-sm bg-success text-light" type="button" onclick="forwardfrom('forth')"  >
                                           التسجيل 
                                    </button>
                                    <button class="btn shadow-sm bg-primary text-light" type="button" onclick="backwardfrom('forth')">
                                        السابق   <i class="fa fa-arrow-right"></i>
                                    </button>
    
                                    
    
                                </div>


                              </div>
                          </div>

                        </div> 
                       
                        <div class="form-group row" hidden>
                            <label for="type_payement" class="col-md-4 col-form-label text-md-right">Moyen de payement:</label>

                            <div class="col-md-6">
                                <select name="type_payement" class="form-control no-border shadow" id="type_payement">
                                    <option value="CCP" selected>1- CCP </option>
                                    <option value="Carte Edahabia">2- Carte Edahabia </option>
                                    <option value="en espèces">3- Payement en espèces </option>
                     
                                </select>
                            </div>
                   
                        </div>                     
                        <div class="form-group row" hidden>
                            <label for="Ncompte" class="col-md-4 col-form-label text-md-right">N°Compte:</label>
                            
                            <div class="col-md-6">
                            <input id="Ncompte" type="text" class="form-control no-border shadow" name="Ncompte" value="0000000" >
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
                <a class="text-light text-decoration-none" href="#"><i class="fa fa-map-marker  ms-5 me-2 my-2"></i>&nbsp; &nbsp; رقم 03 تجزئة زموري طريق القمم درارية الجزائر</a>
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
      <p>جميع الحقوق محفوظة
    </p>
    </div>
  </footer>
</body>
</html>

<style>
    input,textarea,option,select{
        direction: rtl;

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
   
    select,input,option
    {
        padding: 10px;
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
                                $('#state').text('(2/4)انتهت');
                                $("#emailerror").text(msg);        
                            }else{
                                $("#onlyspinner").hide();  
                                 msg = "هذا البريد الإلكتروني قيد الاستخدام بالفعل";
                                 $("#emailerror").text(msg);        
                            }
                                },
                            });
                    
                                }
                                else{
                                 msg = "الرجاء كتابة بريد الكتروني صحيح";
                                 $("#emailerror").text(msg);        
                                }
                            }else{
                                msgidentif="الرجاء كتابة اسم صحيح";
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
                            $('#state').text('(3/4)انتهت');
                            
                        }else{
                            msgactivite="الرجاء كتابة وظيفة صحيحة";
                            $("#functionerror").text(msgactivite);
                        }
                           break;
            case "third": $("#"+value).slideToggle();
                          $("#forth").slideToggle();           
                          $('#loadingstate').css('width','100%');  
                          $('#nonloadingstate').css('width','0%');
                          $('#state').text('(4/4)انتهت');
                          
                            break;
            case "forth": if(repassword.test($("#password").val())){
                                    $("#passworderror").text("");
                                    if($("#password").val() == $("#password-confirm").val()){
                                            $("#passwordconfirmerror").text("");
                                        if(rephone.test($("#phone_number").val())){
                                            $("#phonenumbererror").text("");
                                            $("#registerform").submit();
                                        }else{
                                            phonenumbererror="الرجاء كتابة رقم هاتف صحيح";
                                            $("#phonenumbererror").text(phonenumbererror);
                                        }
                                        
                                    }
                                    else{
                                        passwordconfirmerror="تأكيد كلمة السر خاطئ";
                                        $("#passwordconfirmerror").text(passwordconfirmerror);    
                                    } 
                            }
                            else{
                            passworderror=" الرجاء كتابة كلمة سر صحيحة";
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
                          $('#state').text('(1/4)انتهت');
                          
                            break;
            case "third": $("#"+value).slideToggle();
                          $("#second").slideToggle();          
                          $('#loadingstate').css('width','50%');  
                          $('#nonloadingstate').css('width','50%'); 
                          $('#state').text('(2/4)انتهت');
                          
                           break;
             
            case "forth": $("#"+value).slideToggle();
                          $("#third").slideToggle(); 
                          $('#loadingstate').css('width','75%');  
                          $('#nonloadingstate').css('width','25%');
                          $('#state').text('(3/4)انتهت');
                          
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

    var selectedCountry = $("select#type_inscription").children("option:selected").val();
   
    if(selectedCountry=="entreprise"){

    $("#entr").show(500);
    }else{
        $("#entr").hide(500);
        
    }


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
    $("select#type_inscription").change(function(){
    
    var selectedCountry = $(this).children("option:selected").val();
   
    if(selectedCountry=="entreprise"){

    $("#entr").show(500);
    }else{
        $("#entr").hide(500);
        
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
