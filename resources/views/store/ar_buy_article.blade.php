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

    <title>Koudami  Boutique</title>

    <link rel="icon" href="{{ asset('css/logo.png') }}">
    {{-- <link rel="stylesheet" href="{{asset('css/main.css')}}"> --}}
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <meta name="author" content="koudami">
    <meta name="description" content="Besoin de  location de véhicule,achats véhicule,Ventes immobilières,Location immobilières,Meubles,Electromenager,Jardin,Téléphones mobiles,Divers,Instruments de musique,pièces auto,traiteurs de gateux,décoration,Hôtellerie,Réparation auto... koudami vous propose les plus proches de vous pour optimiser votre temps de recherche ">
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
                <a class="nav-link" role="button" onclick="show_categorie()">المتجر</a>
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


        <main class="py-4">
            <div class="container">
              
                  <div class="column">
                    
                    <article class="row">
                    
                    <div id="articles" class="row text-right  col-md-9 order-1 order-sm-1 order-lg-0">

                         
                            <div id="carouselExampleControls" class="carousel slide  rounded-3 col-sm-12" data-ride="carousel">
                                <div class="carousel-inner bg-light p-1 rounded">
                        
                                <div class="carousel-item active">
                                    <img src="{{ Storage::disk('s3')->url($article->image) }}" class="responsive" width="200px" loading="lazy"  height="200px" alt="koudami">
                            
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ Storage::disk('s3')->url($article->image2) }}" class="responsive" width="200px" loading="lazy" height="200px" alt="koudami">
                                
                                    </div>
                                
                                <div class="carousel-item">
                                    <img src="{{ Storage::disk('s3')->url($article->image3) }}" class="responsive" width="200px" loading="lazy" height="200px" alt="koudami">
                                </div> 
                        
                            
                               
                        
                            </div>
                            {{-- <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                              </a>
                              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                              </a> --}}
                            </div> 
                            <div class="col-sm-12">
                                                
                            <ul>
                                <h4>معلومات حول الاعلان </h4>
                              <li>    {{ $article->nom_article }} : الاعلان 
                            </li>                    
                              <li>
                                 الصنف 
                                @php
                                    $to_arabic=[];
                                    $to_arabic["Véhicules"]="مركبات";
                                    $to_arabic["Ventes immobilières"]="مبيعات العقارات";
                                    $to_arabic["Locations immobilières"]="كراء العقارات";
                                    $to_arabic["Meubles"]="أثاث المنزل";
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
                                    
                                    echo (": ".$to_arabic[ $article->categorie ]);
                                @endphp    </li>
                                    <li>
                                        : توضيح
                                        <p class="toggledText">{{ $article->description }} </p> 

                                    </li>                         
                            <li> 
                                    التوصيل  
                            @if ($article->livraison=="disponible")
                            :    متوفر  
                            @else     
                            : غير متوفر   
                            @endif
                               </li> 
                            <li>  {{ $article->prix }} : السعر </li> 
                            <li> {{ $article->created_at}}: التاريخ </li>
                        </ul>
                            <ul>
                                <h4>معلومات حول البائع </h4>
                            <li>  {{ $article->publicateur->name }} :  البائع</li>
                            <li>  {{ $article->publicateur->phone_number }}:  رقم الهاتف </li>
                            <li> {{ $article->publicateur->wilaya }} - {{ $article->publicateur->commune }}: العنوان </li>

                            </ul>
                        </div>  
                        

                
                
                
                
                
                </div>
                <aside class="col-lg-3   order-sm-0 order-0 order-lg-1">

                  <div class="d-none d-lg-block border rounded p-3 shadow mb-3">
                    <h3 class="text-center my-2  text-light bg-primary  font-weight-bold rounded py-2"> متجر&nbsp; &nbsp;<i class="fa fa-shopping-cart" aria-hidden="true"></i></h3>

                    <ul class="rounded py-2 px-3"  id="boutique_links" style="max-height: 400px; overflow-y:scroll;">
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
                </aside>
              </article>
   
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
      <form action="/ar/store/article_search" hidden id="boutique_form" method="GET">
        @csrf
        <input type="text" name="pos1" value=""  style="display: none;">
        <input type="text" name="pos2" value=""  style="display: none;">
        <input type="text" name="keyword" value="" id="keyword">
        <input type="submit" value="valider">
      </form>
</body>
</html>
<script type="text/javascript">


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

location.replace('/fr/store/buy_article/{{ $article->id }}');

});

var charLimit = 100;
		
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
    article{
      flex-direction: row-reverse !important;
    }

   }
 
    .container{
   min-width: 100%;
 }
 
li{
    list-style: none;
    overflow: hidden;
}
.responsive{
  max-width: 100%;
  max-height: 400px;
  width:auto;
  height:auto;

    
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

.content {
  height: 100%;
  padding: 20px 20px 10px;
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


</style>