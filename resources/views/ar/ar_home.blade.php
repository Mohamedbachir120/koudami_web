<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title> {{ Auth::user()->name }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="icon" href="{{ asset('css/logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" integrity="sha256-Uv9BNBucvCPipKQ2NS9wYpJmi8DTOEfTA/nH2aoJALw=" crossorigin="anonymous"></script>




  </head>
  <body>
    <nav class="navbar navbar-dark sticky-top bg-primary flex-lg-nowrap p-0 shadow">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
    
          <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn text-light mt-2" style="  transform: rotate(180deg) !important;"><i class="fa fa-sign-out fa-lg"></i> </button>
            
        </form>
        </li>
      </ul>
  <button class="navbar-toggler position-absolute d-lg-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control  w-100 rounded" type="text" placeholder="Search" aria-label="Search">
  <a class="navbar-brand  col-lg-2 mr-0 px-3 text-right" href="/ar">قدامي</a>

</nav>

<div class="container-fluid">
  <div class="row">
  

    <main role="main" class="col-md-12 ml-sm-auto col-lg-10  mt-3 pl-lg-5 mb-5">
      <div class="col-lg-10 col-md-12 ml-lg-5" style="border-radius:11px ;">
          @if(Auth::user()->galerie != NULL && Auth::user()->galerie->pic1 != NULL )
            <img class="first" src="{{ Storage::disk('s3')->url(Auth::user()->galerie->pic1) }}" alt=""  >
          @elseif(Auth::user()->galerie != NULL && Auth::user()->galerie->pic2!=NULL)
            <img class="first" src="{{ Storage::disk('s3')->url(Auth::user()->galerie->pic2) }}" alt=""  >
          @elseif(Auth::user()->galerie != NULL && Auth::user()->galerie->pic3!=NULL)
            <img class="first" src="{{ Storage::disk('s3')->url(Auth::user()->galerie->pic3) }}" alt=""  >
          @else
        <div class="col-lg-12">

          <img  class="first" src="/css/galerie.jpg" alt="" >

        </div>
        
         @endif
         
      </div>
      <div class="col-lg-10 col-md-12 ml-lg-5 profile-parent d-flex flex-row-reverse  border-bottom pb-1 rounded ">
        <div class="col-md-4 col-sm-2">
          <div class="d-flex flex-column align-items-end">
            @if (Auth::user()->photo != NULL)
                
           <img  class="profile" src="{{ Storage::disk('s3')->url(Auth::user()->photo) }}" alt="" width="100" height="100">

           @else
           <img  class="profile" src="/css/avatar.png" alt="" width="100" height="100">

           @endif
           <div>
            <legend>{{  Auth::user()->name }}</legend>
         
           </div>
          </div>
       
        </div>
        <div class="col-sm-10 col-md-8  rounded">
          <ul class="d-flex flex-row-reverse">
            <li class="profiles_link actif" id="status">

              <a href="#">الوضع الحالي <i class="fa fa-user"></i> </a>
            </li>
            <li class="profiles_link" id="galerie">
              
              <a href="#"> معرض الصور <i class="fa fa-picture-o"></i> </a>
            </li>
            <li class="profiles_link" id="article">
              <a href="#">مبيعات</a>

              <i class="fa fa-tags"></i>
            </li>            
        
          </ul>
          
        </div>
       
       
      </div>
      <div class="status_content p-3">
        <div class="card">
          <div class="card-header bg-white">
            <h4> الوضع الحالي <i class="fa fa-user"></i> </h4>
        
          </div>
          <div class="card-body">

        <ul class="text-right">
         <li>    {{ Auth::user()->name }} : الاسم</li>   
        
      
        <li> 
           الوضع
          @if ( Auth::user()->statut =="disponible")
              متوفر
          @else
              غير متوفر:
          @endif
          
          
          </li>

        <li>
          الصنف
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
                $to_arabic["Hôtellerie"]="فندقة";
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
                $to_arabic["Jeux"]="تحميل الالعاب";
                $to_arabic["Accessoires et Modes"]="إكسسوارات وأزياء";
                $to_arabic["Vêtement et chaussures"]="ألبسة و أحذية";
                $to_arabic["Sports et loisirs"]="رياضة";
                $to_arabic["Divers"]="متنوعات";

                echo (': '.$to_arabic[Auth::user()->categorie]);   
       @endphp
       <i class="icofont-list"></i>
            </li>
        <li>{{ Auth::user()->function }} : الوظيفة</li>
        <li> {{ Auth::user()->wilaya }} : الولاية</li>
        <li> {{ Auth::user()->commune }} : البلدية</li>  
        </ul>
        </div>
      </div>
      <div>
        <div class="card-header">
          <h4>الاحصائيات<i class="fa fa-pie-chart"></i> </h4>
        </div>
      <div class="d-flex flex-row justify-content-center">
        
        <script>
          $(document).ready(function(){
                      var ctx = document.getElementById('myChart').getContext('2d');
                      var tab=["النقر على اعجاب","اعجب من طرف ","التعليقات المرسلة","التعليقات المتلقاة","عدد الزيارات"];
                      var tab2=["{{ Auth::user()->liked->count() }}","{{ Auth::user()->liked_by->count() }}","{{ Auth::user()->posts->count()}} ","{{ Auth::user()->comments->count()}}","{{ Auth::user()->nbr_visite }}"];

                  var myChart = new Chart(ctx, {
                          type: 'bar',
                      data: {
                          labels: tab,
                          datasets: [{
                              label: 'الارقام',
                              data: tab2,
                              backgroundColor: [
                                  'rgba(255, 99, 132 )',
                                  'rgba(54, 162, 235 )',
                                  'rgba(255, 206, 86 )',
                                  'rgba(75, 192, 192 )',
                                  'rgba(153, 102, 255 )',
                                  'rgba(255, 100, 64 )',
                                  'rgba(255, 159, 12 )',
                                  'rgba(255, 159, 64 )',
                                  'rgba(30, 159, 64 )',
                                  'rgba(60, 159, 64 )',
                                  'rgba(10, 70, 64 )',
                                  'rgba(64, 10, 70 )',
                                  'rgba(10, 140, 0 )',
                                  'rgba(10, 59, 140 )',
                                  'rgba(10, 21, 13 )',
                                  'rgba(100, 100, 103 )',
                                  'rgba(50, 25, 23 )',
                                  'rgba(36, 58, 0 )',
                                  'rgba(10, 200, 0 )',
                                  'rgba(10, 0, 200 )',
                                  'rgba(10, 150, 0 )',
                                  'rgba(10, 0,26 )',
                                  'rgba(10, 17, 205 )',
                                  'rgba(178, 88, 0 )',
                                  'rgba(132, 14, 0 )',
                                  'rgba(169, 0, 155 )',
                                  'rgba(100, 100, 25 )',
                                  'rgba(91, 25, 0 )',
                                  'rgba(10, 70, 15 )',
                                  'rgba(10, 39, 11 )',
                                  'rgba(10, 27, 38 )',
                                  'rgba(38, 38, 0 )',
                                  'rgba(100, 12, 24 )',
                                  'rgba(75, 0, 64 )',
                                  'rgba(55, 64, 0 )',
                                  'rgba(230, 0, 69 )',
                                  'rgba(208, 0,110 )',
                                  'rgba(10, 0,106 )',
                       
                              ],
                              borderColor: [
                                  'rgba(255, 99, 132, 1)',
                                  'rgba(54, 162, 235, 1)',
                                  'rgba(255, 206, 86, 1)',
                                  'rgba(75, 192, 192, 1)',
                                  'rgba(153, 102, 255, 1)',
                                  'rgba(255, 159, 64, 1)'
                              ],
                              borderWidth: 1
                          }]
                      },
                      options: {
                          scales: {
                              yAxes: [{
                                  ticks: {
                                      beginAtZero: true
                                  }
                              }]
                          }
                      }
                  });
                  });
          
          </script>
       

     
<canvas id="myChart" style="max-width: 500px; max-height:400px;" ></canvas>
</div>
      
      </div>
        <div>
          <table class="table table-hover my-2">
            <thead class="text-right">
              <tr>
                  <th>العدد</th>
                  <th>الصنف</th>
              </tr>
            </thead>
            <tbody class="text-right">
            <tr>
              <td> {{ Auth::user()->liked->count() }} </td>
              <td> النقر على اعجاب  </td>

            </tr>
            <tr>
              <td>  {{ Auth::user()->liked_by->count() }} </td>
              <td>اعجب من طرف   </td>

            </tr>
            <tr>
              <td> {{ Auth::user()->posts->count()}}   </td>
              <td>عدد التعليقات المرسلة  </td>
              
            </tr>
            <tr>
              <td> {{ Auth::user()->comments->count()}}   </td>
              <td>عدد التعليقات المتلقاة   </td>
              
            </tr>
            <tr>
              <td> {{ Auth::user()->nbr_visite }} </td>
              <td>عدد الزيارات</td>

            </tr>
         
            <tr>
            <td>{{ Auth::user()->sended->count() }}</td>
            <td>عدد الرسائل</td>

            </tr>
            <tr>
              <td>{{ Auth::user()->received->count() }}</td>
              <td>عدد الرسائل المتلقاة</td>

            </tr>
          </tbody>

          </table>
        </div>
    </div>
    <div class="galerie_content p-3 rounded" hidden="true">
      <div class="card">
        <div class="card-header  text-light">
              <h4 class="text-light">معرض الصور <i class="fa fa-picture-o"></i> </h4>
        </div>

        <div class="card-body p-4 d-flex flex-column align-items-end">
          <div class="row flex-row-reverse align-items-end">

             <div class="col-md-4">

                @if (Auth::user()->galerie != NULL && Auth::user()->galerie->pic1 != NULL )                       
                <img src="{{ Storage::disk('s3')->url(Auth::user()->galerie->pic1) }}" width="300px" class="responsive"  height="300px" alt="Koudami">    
              <div class="d-flex flex-row">
                <div>

                <button class="btn btn-success m-2" onclick="enable_form('#pic1')"><i class="fa fa-edit"></i></button>  
              </div>
               
                <form action="/delete_pic/pic1"  enctype="multipart/form-data"  method="post">
                @csrf
                <button class="btn btn-danger m-2" onclick="return confirm('هل تريد حقا حذف الصورة')"><i class="fa fa-eraser"></i> </button>  
              </form>
              </div>
                
                @else
                <button class="btn btn-outline-dark p-5 m-2" onclick="enable_form('#pic1')">اضافة صورة <i class="fa fa-picture-o"></i></button>  
                <p class="text-center">الصورة 1</p>
                @endif
              </div> 
              <div class="col-md-4">
                  @if (Auth::user()->galerie != NULL && Auth::user()->galerie->pic2 != NULL)
                  <img src="{{ Storage::disk('s3')->url(Auth::user()->galerie->pic2) }}" width="300px" class="responsive"   height="300px" alt="Koudami">    
                  <div class="d-flex flex-row">
                    <div>
                    <button class="btn btn-success m-2" onclick="enable_form('#pic2')"><i class="fa fa-edit"></i></button>  
                  </div>
                    <form action="/delete_pic/pic2"  enctype="multipart/form-data"  method="post">
                      @csrf
                      <button class="btn btn-danger m-2" onclick="return confirm('voulez vous vraiment supprimer cette photo')"><i class="fa fa-eraser"></i> </button>  
                    </form>
                    
                  </div>
               
                 
                  @else
                  <button class="btn btn-outline-dark p-5 m-2" onclick="enable_form('#pic2')">اضافة صورة  <i class="fa fa-picture-o"></i></button>  
                  <p class="text-center">الصورة 2</p>
           
                  @endif
              </div>
              <div class="col-md-4"> 
                  @if (Auth::user()->galerie != NULL && Auth::user()->galerie->pic3 != NULL)
                  <img src="{{ Storage::disk('s3')->url(Auth::user()->galerie->pic3) }}" width="300px" class="responsive"   height="300px" alt="Koudami">    
                  <div class="d-flex flex-row">
                    <div>
                    <button class="btn btn-success m-2" onclick="enable_form('#pic3')"><i class="fa fa-edit"></i></button>  
                  </div>
                   
                    <form action="/delete_pic/pic3"  enctype="multipart/form-data"  method="post">
                      @csrf
                      <button class="btn btn-danger m-2" onclick="return confirm('voulez vous vraiment supprimer cette photo')"><i class="fa fa-eraser"></i> </button>  
                    </form>
                    
                  </div>
               
                  @else
                  <button class="btn btn-outline-dark p-5 m-2" onclick="enable_form('#pic3')">اضافة صورة  <i class="fa fa-picture-o"></i></button>  
                  <p class="text-center">الصورة 3</p>
           
                  @endif
              </div>    

            
          </div>
          <img id="blah" src="#" height="200px" width="200px" class="responsive"  alt="your image" hidden/>
      
            <form class="p-4" action="/add_to_galerie" class="text-right" enctype="multipart/form-data" id="myform" method="post">
            @csrf
            <div class="form-group row" hidden>
              <input type="file" name="pic1" class="photo"  id="pic1"   accept="image/*">
              <label for="pic1">الصورة الاولى  <i class="fa fa-picture-o"></i> &nbsp;</label>
             
            </div>
           <div class="form-group row" hidden>
            <input type="file" name="pic2" class="photo"  id="pic2"   accept="image/*">
            <label for="pic2">الصورة الثانية <i class="fa fa-picture-o"></i> &nbsp;</label>
           
           </div>
           <div class="form-group row" hidden>
            <input type="file" name="pic3" class="photo"  id="pic3"  accept="image/*">
            <label for="pic3">الصورة الثالثة <i class="fa fa-picture-o"></i> &nbsp;</label>
           
           </div>
           <div>
          </div>
           <div id="submit" hidden>
            <input type="submit" value="تأكيد" class="btn btn-success">
      
           </div>
        </form>
         
        </div>

</div>

    </div>
    <div class="article_content"  hidden="true">
      <div class="card">
        <div class="card-header bg-dark p-3 text-light text-center">
            <h4> اعلاناتي<i class="fa fa-tags"></i></h4>
        </div>
        <div class="d-flex flex-row-reverse m-2">
            <a class="btn btn-success col-sm-3 m-2" href="/store/create_article">
                اعلان للمتجر <i class="fa fa-plus"></i>
            </a>

            <a class="btn btn-primary col-sm-3 m-2" href="/fr/store/show_articles">
              المتجر <i class="icofont-shopping-cart"></i>  
            </a>
            
        </div>
     

        <div class="card-body p-3 row justify-content-start">

           
            @foreach (Auth::user()->articles as $item)
            <div class="col-sm-4 column">
                <div class="card border my-2 text-right">
                  <img class="card-img-top" src="{{ Storage::disk('s3')->url($item->image) }}" alt="Card image cap" height="200">
                  <div class="card-body">
                    <ul class="p-0">

                   <li class="text-danger"> {{ $item->prix }} DA </li>
                 
                   
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
                    
                    echo (": ".$to_arabic[ $item->categorie ]);
                @endphp  

              </li>
              <li>
                : توضيح
              </li>
               <li class="toggledText">
                   {{ $item->description }}  

               </li>
            
               <form action="/store/delete_article/{{ $item->id }}" class="py-3" enctype="multipart/form-data" method="post">
                       @csrf
                       @method('delete')

                       <button  type="submit" class="btn btn-danger" onclick="return confirm('هل انت متأكد من حذف الاعلان');"><i class="fa fa-eraser"></i></button>
                       <a href="/store/edit_article/{{ $item->id}}" role="link" class="btn btn-success mx-2"><i class="fa fa-edit"> </i> </a>

                   </form>

            </ul>
                  </div>
                
            </div>
            </div>
       @endforeach
            

   
</div>
</div>
 

    </div>
  

   
    </main>
    
    <nav id="sidebarMenu" class="col-lg-2 d-lg-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3 text-right">
        <h5 class="p-3">              <span data-feather="user"></span>    البروفايل</h5>
        <ul class="nav flex-column text-right">
          <li class="nav-item">
            <a class="nav-link active " href="#">
             الصفحة الرئيسية <span class="sr-only">(current)</span>
              <i class="fa fa-home"></i>

            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " target="_blank" href="/ar/our_clients">
              <i class="fa fa-server"></i>
              الخدمات
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " target="_blank" href="/ar/store/show_articles">
                المتجر
              <i class="fa fa-shopping-cart"></i>
              
            </a>
          </li>
          <li class="nav-item">
            <button class="btn nav-link dropdown-toggle  w-100 text-right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              عروض عمل <span class="font-weight-bold text-danger">جديد </span>   

              </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="/ar/jobs/all_articles">كل العروض</a>
              <a class="dropdown-item" href="/jobs/mes_articles">عروضي</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/messagerie">
              الرسائل
              <i class="fa fa-comment"></i>
              
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/home/show_users/detail_user/{{ Auth::user()->id }}">
              المعلومات الشخصية

              <i class="fa fa-file"></i>

            </a>
          </li>
          <li class="nav-item"><button   class="nav-link btn border w-100 tex-right"  onclick="change_lang()"  id="lang">
            Fr
          </button>
        </li>
        </ul>

    
      
      </div>
    </nav>
  

  </div>
</div>


<script>


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

  function alertSpecial(msg) {
    $('#msg').html(msg);
    alert($('#msg').text());
    }
  
  
  
  var obj={
    language:'fr'
  };
  localStorage.setItem('myJavaScriptObject', JSON.stringify(obj));
  
  
    
  
  var pos1;
  var pos2;
  tab=[];
  
  function getposition(){
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition);
    } 
  
  
  }
  
  function showPosition(position) {
   
    pos1=position.coords.latitude;
    pos2=position.coords.longitude;
   tab.push(pos1);
   tab.push(pos2);
  
   var test="{{ Auth::user()->pos1 }}";
  if((("{{ Auth::user()->pos1 }}">=tab[0]+0.01 || "{{ Auth::user()->pos1 }}"<=tab[0]-0.01)) ||  test=="")
   {
  
    $.ajax({
          url: "/location",
          type:"GET",
          data:{
            att:tab[0],
            long:tab[1]  
         
          },
          success:function(response){
          //
          $('p.pos').remove();
          },
         });
  
   }
   
  }
  
  $(document).ready(function(){
  
    $('.profiles_link').click(function(e){
      
        
        $('.actif').toggleClass('actif');
        
        $(this).toggleClass('actif');
      if($(this).attr('id')=="galerie"){
        $('.galerie_content').attr('hidden',false);
        $('.article_content').attr('hidden',true);
        $('.status_content').attr('hidden',true);
     
      }
      else if(($(this).attr('id')=="article"))
      {
        $('.article_content').attr('hidden',false);
        $('.galerie_content').attr('hidden',true);
        $('.status_content').attr('hidden',true);
     
      }
      else if(($(this).attr('id')=="status")){

        $('.status_content').attr('hidden',false);
        $('.galerie_content').attr('hidden',true);
        $('.article_content').attr('hidden',true);
     



      }
      window.scrollTo({ top: 500, behavior: 'smooth' });

    });

    
  var v= "{{ session('msg') }}";
  
  if(v.length > 1 ){
  
  alertSpecial(v);
  }
  getposition();
  
  
  });
  function changer_statut()
  {
    $.ajax({
          url: "/mettre_ajour_statut",
          type:"GET",
          data:{
            
         
          },
          success:function(response){
            $('#statut').text(response.statut);
            $('#st-btn').remove();
            if(response.statut=="disponible"){
  
              $('#st-principale').append('<span id="st-btn">changer à non disponible  &nbsp;<button onclick="changer_statut()" class="btn btn-danger"><i class="icofont-addons"></i></button></span>');
            }else{
  
              $('#st-principale').append('<span id="st-btn">changer à disponible  &nbsp;<button onclick="changer_statut()" class="btn btn-success"><i class="icofont-ui-power"></i></button></span>'); 
  
            }
  
          },
         });
  
  
  }

  
  
  function enable_form(param){
    var ele=$(param);
    var parent=ele.parent();

    $('#myform')[0].reset();

    parent.siblings().attr('hidden',true);
    parent.siblings().children().attr('required',false);

    ele.attr('required',true);
    $('#blah').attr('hidden',true);
    ele.parent().removeAttr('hidden');
   
    
    $('#submit').removeAttr('hidden');
    


  } 

  function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }

    
    reader.readAsDataURL(input.files[0]);// convert to base64 string
    $('#blah').removeAttr('hidden');
  }
}
$( document ).ready(function() {


$("#pic1").change(function() {

  readURL(this);
});

$("#pic2").change(function() {

  readURL(this);
});
$("#pic3").change(function() {

  readURL(this);
});
});

function change_lang()
{
    var auth= "{{{ (Auth::user()) ? Auth::user()->name : null }}}";
   
     
    
 
        

        
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
          location.reload();

        },
       });

}    
    
   




  </script>
<style>
  thead,.card-header{
    text-align: center;
    background: linear-gradient(130deg,dodgerblue,blueviolet);
    color: white;
} 
.responsive{
    width: 100%;
    max-height: 200px;
    height: auto;    
    }
  body{
    scroll-behavior: smooth;
  }
      .responsive{
        
          }
    
      .status_content,.galerie_content,.article_content{
      transition: 1s ease;
     
        
      }
   .profile-parent li{
    padding: 20px;
    width: 100%;
    border-bottom: 2px solid dodgerblue;
    margin: 2%;
    box-shadow: 0 0 3px 3px lightgray;
    border-radius: 11px;
    transition: 0.7s ease-in-out;
  }
  .profile-parent li:hover {
   
    color: white;
    background: dodgerblue;

  }
  .profile-parent li:hover a{
    color:white;
  }
  .profile-parent a{
    color: rgb(0, 3, 5);
    font-weight: 400;
    transition: 0.7s linear;

  }

  li{
    list-style: none;
  }
  .actif{
     background: dodgerblue;
   }   
  .actif a{
    color: white;
  } 
  
  a{

    text-decoration: none;
  }
  .profile-parent{
    z-index: 10;
  }
  .profile{
    border-radius: 50%;
    margin-top: -50px;
    z-index: 3;
  }
  @media screen and (max-width: 640px) {
    .profile-parent li{
    padding: 5px;
    width: 100%;
    border-bottom: 2px solid dodgerblue;
    margin: 2%;
    box-shadow: 0 0 3px 3px lightgray;
    border-radius: 6px;
    transition: 0.7s ease-in-out;
  }
  .profile-parent{
    padding: 5px;
  }
  .profile{
    width: 50px;
    margin-top: -30px;
    height: 50px;
  }
  * {
    font-size:0.8rem;
  }
  #myChart{
    visibility: hidden;
    height: 0;
  }
  main a ,legend{
    font-size: 10px;
    font-weight: normal;
  }

  }
body{
  background: white !important;
}
  .flex-wrapper {
display: flex;
flex-flow: row nowrap;
}
.bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
      .first{
      object-fit: cover;
      width: 100%;
      height: 60vh;
      border-radius: 15px;

      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
     
      }
      body {
  font-size: .875rem;
}
main{
  position: absolute !important;
  left:  0 !important; 

}
.feather {
  width: 16px;
  height: 16px;
  vertical-align: text-bottom;
}

/*
 * Sidebar
 */
 .container{
   min-width: 100%;
 }


.sidebar {
  position: fixed;
  top: 0;
  bottom: 0;
  right: 0;
  z-index: 100; /* Behind the navbar */
  padding: 48px 0 0; /* Height of navbar */
  box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
}

@media (max-width: 767.98px) {
  .sidebar {
    top: 5rem;
  }
  .first{
      object-fit: cover;
      width: 100%;
      height:33vh;
      border-radius: 15px;

      }
      thead{
        background: dodgerblue;
      }
}

.sidebar-sticky {
  position: relative;
  top: 0;
  height: calc(100vh - 48px);
  padding-top: .5rem;
  overflow-x: hidden;
  overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
}

@supports ((position: -webkit-sticky) or (position: sticky)) {
  .sidebar-sticky {
    position: -webkit-sticky;
    position: sticky;
  }
}

.sidebar .nav-link {
  font-weight: 500;
  color: #333;
}

.sidebar .nav-link .feather {
  margin-right: 4px;
  color: #999;
}

.sidebar .nav-link.active {
  color: #007bff;
}

.sidebar .nav-link:hover .feather,
.sidebar .nav-link.active .feather {
  color: inherit;
}

.sidebar-heading {
  font-size: .75rem;
  text-transform: uppercase;
}

/*
 * Navbar
 */

.navbar-brand {
  padding-top: .75rem;
  padding-bottom: .75rem;
  font-size: 1rem;
  box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
}

.navbar .navbar-toggler {
  top: .25rem;
  right: 1rem;
}

.navbar .form-control {
  padding: .75rem 1rem;
  border-width: 0;
  border-radius: 0;
}

.form-control-dark {
  color: #fff;
  background-color: rgba(255, 255, 255, .1);
  border-color: rgba(255, 255, 255, .1);
}

.form-control-dark:focus {
  border-color: transparent;
  box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
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
::-webkit-scrollbar {
    width: 12px;
}
 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
    border-radius: 5px;

}
 
::-webkit-scrollbar-thumb {
    border-radius: 5px;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
    background: dodgerblue;

}
</style>



      
          <span  id="msg" hidden></span>



</body>

</html>
<script>

var v= "{{ session('msg') }}";
  if(v.length > 1 ){
    alert(v);
  }
  
  var obj={
  language:'ar'
};
localStorage.setItem('myJavaScriptObject', JSON.stringify(obj));


var pos1;
var pos2;
tab=[];



  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } 

function showPosition(position) {
 
  pos1=position.coords.latitude;
  pos2=position.coords.longitude;
 tab.push(pos1);
 tab.push(pos2);

 var test="{{ Auth::user()->pos1 }}";
if((("{{ Auth::user()->pos1 }}">=tab[0]+0.01 || "{{ Auth::user()->pos1 }}"<=tab[0]-0.01)) ||  test=="")
 {
 $.ajax({
        url: "/location",
        type:"GET",
        data:{
          att:tab[0],
          long:tab[1]  
       
        },
        success:function(response){
        //
        },
       });

}
}

function changer_statut()
{
  $.ajax({
        url: "/mettre_ajour_statut",
        type:"GET",
        data:{
          
       
        },
        success:function(response){
          var text="";
          (response.statut=="disponible")? text="متوفر": text="غير متوفر" ;
          $('#statut').text(text);
          $('#st-btn').remove();
          if(response.statut=="disponible"){

            $('#st-principale').append('<span id="st-btn">  <button onclick="changer_statut()" class="btn btn-danger"><i class="icofont-addons"></i></button>&nbsp; تغيير الى غير متوفر </span>');
          }else{

            $('#st-principale').append('<span id="st-btn">  &nbsp;<button onclick="changer_statut()" class="btn btn-success"><i class="icofont-ui-power"></i></button>&nbsp; تغيير الى  متوفر</span>'); 

          }

        },
       });


}
function myfunction(){
$(".ads").hide();
$('.row').show();


}


</script>
<style>
 
.card-header{
    text-align: center;
} 
 
#header{
   display: none;
 }
  #close {
    position: fixed;
    top: 0;
    right: 0;
    float:right;
    display:inline-block;
    padding:5px;
    border: none;
    border-radius:3px; 
    background:red;
    color: white;
}
</style>