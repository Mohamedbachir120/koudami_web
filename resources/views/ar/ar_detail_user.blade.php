<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="koudami">
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
  <a class="navbar-brand  col-lg-2 mr-0 px-3 tex-right" href="/ar">قدامي</a>

</nav>

<div class="container-fluid">
  <div class="row">
  

    <main role="main" class="col-md-12 ml-sm-auto col-lg-10  mt-3 pl-lg-5 mb-5">

        <div class="card">
            <div class="card-header">
                <h4>صورة البروفايل</h4>
            </div>
            <div class="card-body d-flex flex-row justify-content-center mt-5 ">

                @if (Auth::user()->photo != NULL)
            
                <img  class="profile rounded" src="{{ Storage::disk('s3')->url(Auth::user()->photo) }}" alt="" >
     
                @else
                <img  class="profile rounded" src="/css/avatar.png" alt="">
     
                @endif

                
            </div>
            <div class="p-3">
              <div class=" d-flex flex-row justify-content-center">
                <button class="btn btn-primary" onclick="show_form()"><i class="fa fa-edit"></i> تغيير</button> &nbsp;

              </div>
            <div class="d-flex flex-row justify-content-center p-3" id="change_pic">
               
                <form action="/save_pic" enctype="multipart/form-data"  method="post">
                  @csrf
                  <input type="file" name="image" id="photo" required>
                  <label for="photo">الصورة</label>
              
                  <input type="submit" class="btn btn-success"  value="تأكيد">
              </form>
            </div>  
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h4>كلمة السر</h4></div>
          <div class="card-body">
            <form method="POST" action="/update_password/{{ Auth::user()->id }}">
                    @csrf
                    <div class="form-group row justify-content-end">
                  

                    <div class="col-md-5">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required >

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <label for="password" class="col-form-label text-md-right">كلمة السر القديمة </label>

                    </div>
                    <div class="form-group row justify-content-end">
                  
                   
                    <div class="col-md-5">
                        <input id="confirmpassword" type="password" class="form-control @error('password') is-invalid @enderror" name="confirmpassword" required >

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <label for="password" class=" col-form-label text-md-right">كلمة السر الجديدة</label>
  
                  </div>
                  
                    <div class="form-group row justify-content-start">
                  
                            <div class="col-md-3 offset-md-4 ">
                                <button type="submit" class="btn btn-primary ">
                                   Valider
                                </button>
                            </div>
                     </div>          
            </form>
                </div>
        </div>
        <div class="card">
            <div class="card-header bg-dark text-light text-center"><h4>{{ $user->name }} - {{ $user->prenom }} </h4> </div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
               
                @endif
             
                 
                <ul style="text-align: center">
                    <li> {{ $user->name }}&nbsp; : الاسم </li>
                    <li> {{ $user->prenom }} &nbsp;:اللقب </li>
                    <li>{{ $user->email }}:&nbsp; البريد الالكتروني  </li>
                    <li>{{ $user->phone_number }} &nbsp; : رقم الهاتف</li>
                    <li>{{ $user->wilaya }} - {{ $user->wilaya }}:&nbsp; مكان الاقامة </li>
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
                            $to_arabic["Sports et loisris"]="رياضة";
                            $to_arabic["Divers"]="متنوعات";
         
                    
                            echo (': '.$to_arabic[$user->categorie]);   
                   @endphp
                   <i class="icofont-list"></i>
                        </li>                    <li> {{ $user->function }}: &nbsp; الوظيفة</li>
                    <li> {{ $user->created_at }}:&nbsp; تاريخ  الالتحاق بالمنصة </li>
                   
                </ul>

                <div class="row justify-content-center">
                    <div> 
                      
                     <button class="btn btn-primary" onclick="show_form2()"><i class="fa fa-edit"></i> تغيير</button> &nbsp;
                  
                  
                   </div> 
                  
                   </div>
                   <div id="change_info" class="border rounded p-4 m-3">
                    <form method="POST"  action="/update_user/{{ Auth::user()->id }}">
                      @csrf
                            <div class="form-group row justify-content-end">

                                <div class="col-md-4">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}" name="name"  autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <label for="name" class="col-md-3 col-form-label text-md-right">اللقب</label>

                            </div>
                            <div class="form-group row justify-content-end">
                            
                                <div class="col-md-4">
                                    <input id="prenom" type="text" class="form-control" name="prenom" value="{{ $user->prenom }}"  >
                                </div>
                                <label for="prenom" class="col-md-3 col-form-label text-md-right">الاسم</label>

                            </div>
                        
                            <div class="form-group row justify-content-end">
                            
                                <div class="col-md-4">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}"  autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <label for="email" class="col-md-3 col-form-label text-md-right">البريد الالكتروني</label>

                            </div>
                            <div class="form-group row justify-content-end">
                            
                                <div class="col-md-4">
                                    <input id="phone_number" type="tel" pattern="[0-9]{10,}" class="form-control" value="{{ $user->phone_number }}" name="phone_number"  >
                                </div>
                                <label for="phone_number" class="col-md-3 col-form-label text-md-right">رقم الهاتف</label>

                            </div>
                        
                            <div class="form-group row justify-content-end">
                                <select name="categorie" class="selectpicker" id="categorie">
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
                                <option value="Vêtement et chaussures">ألبسة و أحذية</option>
                                <option value="Sports et loisirs">رياضة</option>
                                <option value="Divers">متنوعات</option>

                                
                                </select>  
                                <label for="categorie" class="col-md-3 col-form-label text-md-right">الصنف</label>

                                </div>                        

                    <div class="form-group row justify-content-end">

                    <textarea name="function" id="function" placeholder="مثال : بناء ، لحام ، دهان ، جزار ، محامي " list="functions" cols="30" rows="10">{{ $user->function}} </textarea>

                        <label for="function" class="col-md-3 col-form-label text-md-right">الوظيفة</label>

                    </div>

                 

                    

                       
                        <div class="form-group row   justify-content-start mx-2">
                                <button type="submit" class="btn btn-primary" id="submit">
                                تأكيد
                                </button>
                            </div>       
                    </form>
                   </div>
                  
                    </div>
            </div>
        </div>
   
    </main>

  

    
    <nav id="sidebarMenu" class="col-lg-2 d-lg-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3 text-right">
        <h5 class="p-3">              <span data-feather="user"></span>    البروفايل</h5>
        <ul class="nav flex-column text-right">
          <li class="nav-item">
            <a class="nav-link active " href="/home">
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
      
        </ul>

    
      
      </div>
    </nav>
  

  </div>
</div>


<script>
function  show_form(){

$('#change_pic').css('visibility')=="hidden"? $('#change_pic').css('visibility','visible'):$('#change_pic').css('visibility','hidden');
window.scrollTo({ top: 200, behavior: 'smooth' });
  
}
function show_form2(){
$('#change_info').css('visibility')=="hidden"? $('#change_info').css('visibility','visible'):$('#change_info').css('visibility','hidden');
$('#change_info').toggle();
window.scrollTo({ top: 1000, behavior: 'smooth' });

}


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
  

 
  
  $(document).ready(function(){
  
    
    
    
  var v= "{{ session('msg') }}";
  
  if(v.length > 1 ){
  
  alertSpecial(v);
  }
  
  
  });
 

  
  
  
 





  </script>
<style>
    img{
        width: auto;
        height: auto;
        max-width: 100%;
    }
    #change_info,#change_pic{
  visibility: hidden;
  display: none;
}
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
