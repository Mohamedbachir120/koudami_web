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
            <div class="card">
                <div class="card-header bg-dark text-light text-center d-flex flex-row justify-content-end">

                    <h4 class="text-light">
                 
                    التسجيل كعميل  <i class="icofont-user-suited text-light"></i>
                </h4>
            </div>
    
                     
                <div class="card-body">
                       
                        <form method="POST" action="{{ route('register') }}">
                        @csrf
                    
                        <div class="form-group row justify-content-end">
                            
                        <div class="col-md-4">
                            <select name="type_inscription" class="form-control" id="type_inscription" >
                                <option value="entreprise" class="selected">
                                    مؤسسة   </option> 
                           <option value="particulier">خاص </option>     
                            </select>
                        
                        </div>
                                <label for="prenom" class="col-md-3 col-form-label text-md-right">طريقة التسجيل</label>
         
                     

                        </div>
                    <div id="entr">                      
                        <!-- <div class="form-group row justify-content-end" >
                  
                            <div class="col-md-6">
                            <input id="Rc" type="text" class="form-control" name="Rc"  >
                            </div>
                            <label for="Rc" class="col-md-3 col-form-label text-md-right">السجل التجاري</label>

                        </div>
                            
                        <div class="form-group row justify-content-end" >
                      
                            <div class="col-md-6">
                            <input id="Nif" type="text" class="form-control" name="Nif"  >
                            </div>
                      
                            <label for="Rc" class="col-md-3 col-form-label text-md-right">رقم المعرف الضريبي</label>



                        </div> -->
                      
                    </div>
                     
                        <div class="form-group row justify-content-end">
                        
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label for="name" class="col-md-3 col-form-label text-md-right">الاسم</label>

                        </div>
                     

                    
                     
                        <div class="form-group row justify-content-end">
               
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label for="email" class="col-md-3 col-form-label text-md-right ">البريد الاكتروني</label>

                        </div>
                        <div class="form-group row justify-content-end">
                     
                            <div class="col-md-6">
                                <input id="phone_number" type="tel" pattern="[0-9]{10,}" class="form-control" name="phone_number" required >
                            </div>
                            <label for="phone_number" class="col-md-3 col-form-label text-md-right">رقم الهاتف</label>

                        </div>
                     
                        <div class="form-group row justify-content-end">
                      
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label for="password" class="col-md-3 col-form-label text-md-right ">كلمة السر</label>

                        </div>

                        <div class="form-group row justify-content-end">
                
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <label for="password-confirm" class="col-md-3 col-form-label text-md-right">تأكيد كلمة المسر</label>

                        </div>
                 
                  
                        <div class="form-group row justify-content-end">
                      
                            <div class="col-md-4">
                             
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
                     <label for="wilaya" class="col-md-3 col-form-label text-md-right ">الولاية</label>

                   </div>

                        <div class="form-group row justify-content-end">
                       
                            <div class="col-md-4">
                                <select name="commune"   id="commune" class="float-right" required>
                           
                                </select>
                            </div>
                            <label for="commune" class="col-md-3 col-form-label text-md-right">البلدية</label>
                        </div>
                        <div class="form-group row justify-content-end">
                            <div class="col-md-4">
                                <input id="adresse" type="text" class="form-control" name="adresse" placeholder="اختياري" >
                         
                            </div>
                            <label for="adresse" class="col-md-3 col-form-label text-md-right ">العنوان</label>
                          
                        </div>


                        <div class="form-group row justify-content-end">
                        <div class="col-md-4">

                        <select name="categorie" id="categorie" class="form-control" data-live-search="true">
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
                        <label for="categorie" class="col-md-3 col-form-label text-md-right"> الصنف</label>
                          
                        </div> 
                        <div class="form-group row justify-content-end">
                         <div class="col-md-4">
                            <textarea name="function" id="function" placeholder="مثال : بناء ، لحام ، دهان ، جزار ، محامي " list="functions" cols="30" rows="10"></textarea>

                    
                         </div>
                         <label for="function" class="col-md-3  col-form-label text-md-right">الوظيفة</label>

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

                     
                       
                       
                       
                       
                        
                     
                 
                

                  

                <div class="form-group row mb-0">
                
                
               
                    <button type="submit" class="btn btn-success mx-2">
                       التسجيل  
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



$(document).ready(function(){

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
$('#password').keyup(function(){

if($(this).val().length<8){

    $(this).css('box-shadow','0px 0px 2px 2px red');
    $("#submit").prop('disabled',true);

}else{
    $(this).css('box-shadow','0px 0px 2px 2px green');
    $("#submit").prop('disabled',false);

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
