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
  <a class="navbar-brand  col-lg-2 mr-0 px-3" href="/">koudami</a>
  <button class="navbar-toggler position-absolute d-lg-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control  w-100 rounded" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">

      <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn text-light mt-2"><i class="fa fa-sign-out fa-lg"></i> </button>
        
    </form>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-lg-2 d-lg-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <h5 class="p-3">              <span data-feather="user"></span>          Mon Profile</h5>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <i class="fa fa-home"></i>
              Acceuil <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" target="_blank" href="/fr/our_clients">
              <i class="fa fa-server"></i>
              Services
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" target="_blank" href="/fr/store/show_articles">
              <i class="fa fa-shopping-cart"></i>
              Boutique
            </a>
          </li>
          <li class="nav-item">
            <button class="btn nav-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-users"></i>
              Recrutements <span class="font-weight-bold text-danger">New </span>
              </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="/fr/jobs/all_articles">Tous les offres</a>
              <a class="dropdown-item" href="/jobs/mes_articles">Mes offres</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/messagerie">
              <i class="fa fa-comment"></i>
              Messagerie
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/home/show_users/detail_user/{{ Auth::user()->id }}">
              <i class="fa fa-file"></i>
              Informations personnels
            </a>
          </li>
          <li class="nav-item"><button   class="nav-link btn border w-100"  onclick="change_lang()"  id="lang">
            عربية
          </button>
          </li>
        </ul>

    
      
      </div>
    </nav>

    <main role="main" class="col-md-12 ml-sm-auto col-lg-10  mt-3 px-lg-5 mb-5">
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
      <div class="col-lg-10 col-md-12 ml-lg-5 profile-parent d-flex flex-row justify-content-between border-bottom pb-1 rounded ">
        <div class="col-md-4 col-sm-2  ml-2">
          <figure>
            @if (Auth::user()->photo != NULL)
                
           <img  class="profile" src="{{ Storage::disk('s3')->url(Auth::user()->photo) }}" alt="" width="100" height="100">

           @else
           <img  class="profile" src="/css/avatar.png" alt="" width="100" height="100">

           @endif
            <legend>{{  Auth::user()->name }}</legend>
          </figure>
       
        </div>
        <div class="col-sm-10 col-md-8  rounded">
          <ul class="d-flex flex-row">
            <li class="profiles_link actif" id="status">

              <a href="#"><i class="fa fa-user"></i> Statut</a>
            </li>
            <li class="profiles_link" id="galerie">
              
              <a href="#"><i class="fa fa-picture-o"></i> Galerie</a>
            </li>
            <li class="profiles_link" id="article">
              <i class="fa fa-tags"></i>
              <a href="#">Articles</a>
            </li>            
        
          </ul>
          
        </div>
       
       
      </div>
      <div class="status_content p-3">
        <div class="card">
          <div class="card-header bg-white">
            <h4><i class="fa fa-user"></i> Votre statut</h4>
        
          </div>
          <div class="card-body">

        <ul>
         <li>   Identifiant : {{ Auth::user()->name }} </li>   
        
       
        <li>Statut : {{ Auth::user()->statut }}</li>
        <li>Catégorie : {{ Auth::user()->categorie }}</li>
        <li>Activité : {{ Auth::user()->function }}</li>
        <li>Wilaya : {{ Auth::user()->wilaya }}</li>
        <li>Commune : {{ Auth::user()->commune }}</li>  
        </ul>
        </div>
      </div>
      <div>
        <div class="card-header">
          <h4><i class="fa fa-pie-chart"></i> Vos statistiques</h4>
        </div>
      <div class="d-flex flex-row justify-content-center">
        
        <script>
          $(document).ready(function(){
                      var ctx = document.getElementById('myChart').getContext('2d');
                      var tab=["Clic sur like","Aimés par ","commentaire postés","commentaire reçus","Nombre de visites"];
                      var tab2=["{{ Auth::user()->liked->count() }}","{{ Auth::user()->liked_by->count() }}","{{ Auth::user()->posts->count()}} ","{{ Auth::user()->comments->count()}}","{{ Auth::user()->nbr_visite }}"];

                  var myChart = new Chart(ctx, {
                          type: 'bar',
                      data: {
                          labels: tab,
                          datasets: [{
                              label: 'Valeur de productions',
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
            <thead class="">
              <tr>
                  <th>Option</th>
                  <th>Stats</th>
              </tr>
            </thead>
            <tbody>
            <tr>
              <td> Nombre de Clic sur like  </td>
              <td> {{ Auth::user()->liked->count() }} Clic</td>
            </tr>
            <tr>
              <td>Aimés par   </td>
              <td> {{ Auth::user()->liked_by->count() }} Personnes</td>
            </tr>
            <tr>
              <td>Nombre de commentaire postés   </td>
              <td> {{ Auth::user()->posts->count()}} Commentaires  </td>
              
            </tr>
            <tr>
              <td>Nombre de commentaire reçus   </td>
              <td> {{ Auth::user()->comments->count()}} Commentaires  </td>
              
            </tr>
            <tr>
              <td>Nombre de visites </td>
              <td> {{ Auth::user()->nbr_visite }} visites</td>
            </tr>
         
            <tr>
            <td>Nombre de messages envoyés</td>
            <td>{{ Auth::user()->sended->count() }}</td>
            </tr>
            <tr>
              <td>Nombre de messages reçus</td>
              <td>{{ Auth::user()->received->count() }}</td>
             
            </tr>
          </tbody>

          </table>
        </div>
    </div>
    <div class="galerie_content p-3 rounded" hidden="true">
      <div class="card">
        <div class="card-header  text-light">
              <h4 class="text-light"> <i class="fa fa-picture-o"></i> Modifier votre Galerie</h4>
        </div>



        <div class="card-body p-4">
          <div class="row flex-wrap align-items-end">

             <div class="col-md-4">

                @if (Auth::user()->galerie != NULL && Auth::user()->galerie->pic1 != NULL )                       
                <img src="{{ Storage::disk('s3')->url(Auth::user()->galerie->pic1) }}" width="300px" class="responsive"  height="300px" alt="Koudami">    
              <div class="d-flex flex-row">
                <div>

                <button class="btn btn-success m-2" onclick="enable_form('#pic1')"><i class="fa fa-edit"></i></button>  
              </div>
               
                <form action="/delete_pic/pic1"  enctype="multipart/form-data"  method="post">
                @csrf
                <button class="btn btn-danger m-2" onclick="return confirm('voulez vous vraiment supprimer cette photo')"><i class="fa fa-eraser"></i> </button>  
              </form>
              </div>
                
                @else
                <button class="btn btn-outline-dark p-5 m-2" onclick="enable_form('#pic1')">Ajouter une photo <i class="fa fa-picture-o"></i></button>  
                <p class="text-center">Image 1</p>
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
                  <button class="btn btn-outline-dark p-5 m-2" onclick="enable_form('#pic2')">Ajouter une photo <i class="fa fa-picture-o"></i></button>  
                  <p class="text-center">Image 2</p>
           
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
                  <button class="btn btn-outline-dark p-5 m-2" onclick="enable_form('#pic3')">Ajouter une photo <i class="fa fa-picture-o"></i></button>  
                  <p class="text-center">Image 3</p>
           
                  @endif
              </div>    

            
          </div>
          <img id="blah" src="#" height="200px" width="200px" class="responsive"  alt="your image" hidden/>
      
            <form class="p-4" action="/add_to_galerie" enctype="multipart/form-data" id="myform" method="post">
            @csrf
            <div class="form-group row" hidden>
              <label for="pic1">Premiére image  <i class="fa fa-picture-o"></i> :&nbsp;</label>
              <input type="file" name="pic1" class="photo"  id="pic1"   accept="image/*">
             
            </div>
           <div class="form-group row" hidden>
            <label for="pic2">Deuxiéme image <i class="fa fa-picture-o"></i> :&nbsp;</label>
            <input type="file" name="pic2" class="photo"  id="pic2"   accept="image/*">
           
           </div>
           <div class="form-group row" hidden>
            <label for="pic3">Troisième image <i class="fa fa-picture-o"></i> :&nbsp;</label>
            <input type="file" name="pic3" class="photo"  id="pic3"  accept="image/*">
           
           </div>
           <div>
          </div>
           <div id="submit" hidden>
            <input type="submit" value="Confirmer" class="btn btn-success">
      
           </div>
        </form>
         
        </div>
</div>

    </div>
    <div class="article_content"  hidden="true">
      <div class="card">
        <div class="card-header bg-dark p-3 text-light text-center">
            <h4><i class="fa fa-tags"></i> Mes articles</h4>
        </div>
        <div class="d-flex flex-row m-2">
            <a class="btn btn-success col-sm-3 m-2" href="/store/create_article">
                <i class="fa fa-plus"></i> article à la  boutique
            </a>

            <a class="btn btn-primary col-sm-3 m-2" href="/fr/store/show_articles">
                <i class="icofont-shopping-cart"></i>  Boutique
            </a>
            
        </div>
     

        <div class="card-body p-3 row justify-content-start">

           
            @foreach (Auth::user()->articles as $item)
            <div class="col-sm-4 column">
                <div class="card border my-2">
                  <img class="card-img-top" src="{{ Storage::disk('s3')->url($item->image) }}" alt="Card image cap" height="200">
                  <div class="card-body">
                    <ul class="p-0">

                   <li class="text-danger"> {{ $item->prix }} DA </li>
                 
                   
               <li>
                   Nom article :   {{ $item->nom_article }}
             
               </li>
               <li>
                   Catergorie :{{ $item->categorie }}
               </li>
               <li class="toggledText">
                Description  : {{ $item->description }} 

               </li>
            
               <form action="/store/delete_article/{{ $item->id }}" class="py-3" enctype="multipart/form-data" method="post">
                       @csrf
                       @method('delete')

                       <button  type="submit" class="btn btn-danger" onclick="return confirm('voulez vous vraiment supprimez cette article');"><i class="fa fa-eraser"></i></button>
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
    
   
  

  </div>
</div>


<script>

function change_lang()
{
    var auth= "{{{ (Auth::user()) ? Auth::user()->name : null }}}";
   
     
    
 
        

        
        var obj={
            "language":"ar",
            }
        localStorage.setItem('myJavaScriptObject', JSON.stringify(obj));
  
       

            
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
  left: 0;
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