<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('css/logo.png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('icofont/icofont.min.css')}}" rel="stylesheet">

    <title>{{ config('app.name', 'Koudami') }}</title>
    <!-- Scripts -->
    <meta name="author" content="koudami">

    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{ asset('js/language.js')}}" defer></script>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-xl navbar-light bg-white font-weight-bold shadow" id="navbar">
          
            <a class="navbar-brand"  href="/"  id="logo"> <img src="{{ asset('images/logo.png') }}" alt="Koudami" width="70px" height="70px" ></a>
    
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
           
    
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto row align-items-center ml-2">
                  <li class="nav-item active">
                    <a class="nav-link mr-1" href="#apropos">A propos <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item mr-1">
                    <a class="nav-link" href="#contact">Contact</a>
                  </li>
                  <li class="nav-item mr-1">
                    <a class="nav-link" href="/fr/our_clients">Services</a>
                  </li>
               
                  <li class="nav-item mr-1">
                    <a class="nav-link" href="/fr/store/show_articles">Boutique</a>
                  </li>
                 
            
            
                </ul>
                          
               
                <div class="row align-items-center justify-content-center">
    
               @guest
               <a href="/login" class="nav-link animated-border-button mr-2 col-xs-2"><i class="icofont-user-alt-7"></i> &nbsp;Connexion</a>
               <a href="/register/fr" class="nav-link animated-border-button col-xs-2"><i class="fa fa-user-plus"></i>  &nbsp;Inscription</a>
              @endguest
               @auth
                  <a href="/home" class="btn btn-primary mx-1"><i class="fa fa-home"></i>Acceuil</a>    
    
               @endauth
               <a class="btn  mx-2 rounded-fr"  id="lg" >عربية</a>
              </div>
              
              </div>
            </nav>
    

        </div>


<div class="container d-flex flex-column py-4">
 
  
<div class="col-sm-12">
   
<div class="align-items-start bg-white border-left p-3">

    <div class="row  align-items-center px-4 pb-2 justify-content-start">
        @if($user->photo != NULL)
        <img src="{{ Storage::disk('s3')->url($user->photo) }}" alt="koudami user picture" class="user-img" height="70px" width="70px" loading="lazy">
            @else
            <img src="{{ asset('/css/avatar.png') }}" class="user-img" alt="koudami user picture" height="70px" width="70px" loading="lazy">
        
            @endif
        <div class=" column mx-2">
            <div class="font-weight-bold">
                {{ $user->name }} 

            </div>
            <div>
                {{ $user->type_inscription }}   

            </div>
        </div>
    </div>
    <ul class="text-left col-md-8 border p-4 rounded">        
    <li><i class="icofont-list"></i>&nbsp; Catégorie : {{ $user->categorie }}</li>
   <li><i class="icofont-worker"></i>&nbsp; Activité : {{ $user->function }} </li>
   <li><i class="icofont-phone"></i> &nbsp; Numéro de téléphone: {{ $user->phone_number }} </li>
   <li><i class="icofont-ui-email"></i>&nbsp;  Email : {{ $user->email }} </li>
   <li><i class="icofont-map-pins"></i>  &nbsp; Position initilae : {{ $user->wilaya }} - {{ $user->commune }}       </li>
    @auth
   <li><i class="icofont-search-map"></i> &nbsp; Position Actuelle : <a  href="/position/{{ $user->id }}" class="btn btn-primary" target="blank"><i class="fa fa-map-marker"></i></a></li>
    @endauth   
    <div>
        <a role="button" class="font-weight-bold" onclick="open_rapport()">Signaler</a>
    </div>
    @auth
    <div  id="myrapport_form" class="bg-white row justify-content-start align-items-center" hidden="true">
        <form  method="POST" id="rapport_form" action="/envoyer_rapport" class="rounded col-xs-12 col-sm-12 col-md-12 col-lg-6">
          @csrf
    
        <h4  class="text-center p-2">Envoyer un rapport</h4>
    
        <input type="text" name="id" value="{{ $user->id }}" hidden>
        <div class="form-group row p-2">
            <label for="envoyer_par" class="col-sm-12 col-md-3">Envoyé par : &nbsp; </label>
            <div class="col-sm-12 col-md-8">
                <input id="envoyer_par" class="form-control" type="text" name="envoyer_par" value="{{ Auth::user()->name }} - {{ Auth::user()->prenom }}" readonly>
    
            </div>
            
        </div>
        <div class="form-group row p-2">
            <label for="envoyer_par" class="col-sm-12 col-md-3">a propos de : &nbsp; </label>
            <div class="col-sm-12 col-md-8">
                <input id="personne" class="form-control" type="text" name="personne" value="{{ $user->name }} - {{ $user->prenom }}" readonly>
    
            </div>
            
        </div>
        <div class="form-group row p-2">
            <label for="motif" class="col-sm-12 col-md-3">La cause: &nbsp;</label>
            <select name="motif" id="motif" class="selectpicker col-sm-12 col-md-8">
                <option value="contenu inapproprié">Publication d'un contenu inapproprié</option>
                <option value="fausse identitée">Fausse identitée</option>
                <option value="comportement inapproprié">Comportement inapproprié</option>
                <option value="autres">Autres</option>
            </select>
        </div>
    
        <div class="form-group row p-2">
            <label for="rapport" class="col-sm-12 col-md-3">Rapport : &nbsp;</label>
            <textarea name="rapport" class="col-sm-12 col-md-8" id="" cols="30" rows="5" required>votre rapport ...
            </textarea>
    
    
    
        </div>
    
        <div class="form-group p-4 row justify-content-end">
    <a class="btn btn-danger mr-1" onclick="closerapport()" >Annuler</a>        
    <input type="submit" class="btn btn-primary" value="envoyer">
        </div>
    
    
            
    
    
    
        </form>
    
      </div>
      @endauth
    </ul>

    @if($user->galerie != NULL)

    <div id="carouselExampleControls" class="carousel slide  rounded-3 col-md-8" data-ride="carousel">
        <div class="carousel-inner bg-light p-1 rounded">

        @if($user->galerie->pic1 != NULL)
        <div class="carousel-item active">
            <img src="{{ Storage::disk('s3')->url($user->galerie->pic1) }}" class="responsive"  alt="koudami user galerie" loading="lazy">
    
        </div>
        @endif
        @if($user->galerie->pic2 != NULL)
        <div class="carousel-item">
            <img src="{{ Storage::disk('s3')->url($user->galerie->pic2)  }}" class="responsive" alt="koudami user galerie" loading="lazy">
        
            </div>
        
        @endif
        @if($user->galerie->pic3 != NULL)
        <div class="carousel-item">
            <img src="{{ Storage::disk('s3')->url($user->galerie->pic3) }}" class="responsive"  alt="koudami user galerie" loading="lazy">
    </div> 
        @endif

       

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
   
    @endif
   @auth
   <div class="rate d-flex flex-row  justify-content-start p-2 col-md-8 border-top border-bottom align-items-center">
    <button class="btn text-light" onclick="set_rate(1,{{ $user->id }})"><i class="fa fa-star"></i></button>
    <button class="btn text-light" onclick="set_rate(2,{{ $user->id }})"><i class="fa fa-star"></i></button>
    <button class="btn text-light" onclick="set_rate(3,{{ $user->id }})"><i class="fa fa-star"></i></button>
    <button class="btn text-light" onclick="set_rate(4,{{ $user->id }})"><i class="fa fa-star"></i></button>
    <button class="btn text-light" onclick="set_rate(5,{{ $user->id }})"><i class="fa fa-star"></i></button>
    @php
    echo('<li id="mark" hidden>'.str_replace(['[',']'],"",$user->rated_by()->where('rater_id',Auth::user()->id)->pluck('value')).'</li>');
        
    @endphp
 </div>
   <div class="d-flex flex-row  justify-content-start p-2 col-md-8 border-top border-bottom align-items-center">
    <div class="col-md-2 border-right py-2">      
      @if($user->is_liked(Auth::user()->id))
<a href="/likes/{{ $user->id }}"><i class="fa fa-heart" style="color:red;"></i></a> 
    @else
    <a href="/likes/{{ $user->id }}"><i class="fa fa-heart" style="color:black;"></i></a> 
    
    @endif
{{ $user->liked_by()->count() }}
 </div>

 <div class="col-md-2 border-right py-2 ">
    <button class="btn p-0" onclick="show_comments()" id=fade_comment><i class="icofont-speech-comments"></i>{{ $user->comments->count()}}</button>

</div>

 <div class="col-md-2 text-dark border-right  py-2 ">
    <i class="fa fa-eye"></i> {{$user->nbr_visite}}   

 </div>
 <div class="col-md-2 text-dark">
<i class="fa fa-star"></i><span id="avg">{{ $user->rated_by()->avg('value') }}</span> 
 </div>
</div>

<div class="col-md-8">
<form action="/store_comment/{{ $user->id }}" method="POST" class="col-md-8">
    <div class="form-group d-flex flex-row align-items-end">

    @csrf
    @if( Auth::user()->photo != NULL)
    <img src="{{ Storage::disk('s3')->url(Auth::user()->photo) }}" class="rounded-circle" width="40px" height="40px" alt="koudami user picture" loading="lazy">
    @else
    <img src="{{ asset('css/avatar.png') }}" class="rounded-circle" width="40px" height="40px" alt="koudami user picture" loading="lazy">

    @endif
        <input type="text" name="contenu" class="form-control mx-1" placeholder="laissez un commentaire" required>
        <button type="submit" class="btn btn-success"><i class="icofont-location-arrow"></i></button>

    </div>
</form>
</div>
   <div class="comments col-md-8">
   
    <div id="cts" class="column">
    @foreach ($user->comments as $item)
    <div class="col-md-12">  
        <div class="comment d-flex flex-row  justify-content-start my-1">
            @if($item->poster->photo != NUll)
         <img src="{{ Storage::disk('s3')->url($item->poster->photo) }}" class="rounded-circle mr-1" width="40px"  height="40px" alt="koudami user picture" loading="lazy"> 
            @else
         <img src="{{ asset('css/avatar.png') }}" class="rounded-circle mr-1" width="40px" height="40px" alt="koudami user picture" loading="lazy"> 
         @endif
            
         
         <div  class="text-left col-sm-10 border rounded">
             <div class="name"> {{ $item->poster->name }}  </div>
     
             <div>     {{ $item->contenu }}     </div>    
         <div class="text-right font-weight-bold text-secondary"> {{ $item->created_at }}</div>           
         </div>  
         
         </div>
             
    
         @if(Auth::user()->type_compte=="admin" || Auth::user()->type_compte=="moderator"  || Auth::user()->id == $item->poster->id )
     <form action="/delete_comment/{{ $item->id }}" method="post" class="col-md-11 d-flex flex-row justify-content-end">
    @csrf
    @method('delete')
        <a role="button" class="text-secondary font-weight-bold" onclick="return confirm('voulez vous supprimer ce commentaire?');">supprimer</a>
    </form>
        @endif
    </div>
@endforeach
</ul>
</div>

@endauth

@guest
<div class="d-flex flex-row p-2 my-2 border-top border-bottom align-items-center col-md-7">
     
    <div class="col-md-2 border-right py-2">
        <a role="button" class="text-dark"><i class="fa fa-heart" ></i>{{ $user->liked_by()->count() }}  </a> 

    </div>
    
    <div class="col-md-2 border-right py-2">
        <button class="btn p-0" onclick="show_comments()" id=fade_comment><i class="icofont-speech-comments"></i>{{ $user->comments->count()}}</button>
 
    </div>
    
     <div class="col-md-2 text-dark border-right  py-2">
        <i class="fa fa-eye"></i> {{$user->nbr_visite}}   

     </div>
     <div class="col-md-2 text-dark">
        <i class="fa fa-star"></i><span id="avg">{{ $user->rated_by()->avg('value') }}</span> 
    </div>
   
</div>
<div class="comments col-md-8">

  
 <div id="cts" class="d-flex flex-column">


    @foreach ($user->comments as $item)
 

  <div class="col-md-12">  
 
    <div class="comment d-flex flex-row  justify-content-start my-1">
       @if($item->poster->photo != NUll)
    <img src="{{ Storage::disk('s3')->url($item->poster->photo) }}" class="rounded-circle mx-1" width="40px"  height="40px" alt="koudami user picture"> 
       @else
    <img src="{{ asset('css/avatar.png') }}" class="rounded-circle mx-1" width="40px" height="40px" alt="koudami user picture"> 
    @endif
       
    
    <div  class="text-left col-sm-11 border rounded">
        <div class="name"> {{ $item->poster->name }}  </div>

        <div>     {{ $item->contenu }}     </div>    
    <div class="text-right font-weight-bold text-secondary"> {{ $item->created_at }}</div>           
    </div>  
    
    </div>
        
</div>
    @endforeach


</div>
</div>


@endguest
</div>
</div>


</div>

</div>
</body>


 

<footer class="bg-dark border  text-lg-start shadow-lg">
    <div class="container p-4">
      <div class="row">
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase text-light">Liens utiles</h5>
  
          <ul class="list-unstyled mb-0">
            <li>
              <a href="/" class="text-light text-decoration-none"><i class="fa fa-home"></i> &nbsp; &nbsp; Acceuil</a>
            </li>
            <li>
                <a href="/fr/our_clients" class="text-light text-decoration-none"><i class="fa fa-tasks" aria-hidden="true"></i>&nbsp; &nbsp; Services</a>
              </li>
             
            <li>
              <a href="#apropos" class="text-light text-decoration-none"><i class="fa fa-newspaper-o"></i> &nbsp; &nbsp;A propos</a>
            </li>
            <li>
              <a href="#contact" class="text-light text-decoration-none"><i class="fa fa-archive"></i>&nbsp; &nbsp; Contact</a>
            </li>
            <li>
              <a href="#apropos" class="text-light text-decoration-none"><i class="fa fa-archive"></i>&nbsp; &nbsp; Conditions d'utilisation</a>
            </li>
          
          </ul>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase mb-0 text-light" id="contact">Contact</h5>
  
          <ul class="list-unstyled">
            <li>
                <a class="text-light text-decoration-none" href="#"><i class="fa fa-map-marker  ms-5 me-2 my-2"></i>&nbsp; &nbsp; Rue n 03 lot zemmouri chemin  des crêtes Draria - Alger</a>
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
      <p>Tous droits résérvés</p>
    </div>
  </footer>
         
</html>
<style>
     .closebtn {
  position: absolute;
  top: 0px;
  right: 0px;
  font-size: 60px;
}

  
   .user-img{
       border-radius: 50%;
   }
 
    .name{
        font-weight: bolder;

    }
   
    .comment{
        border-radius:5px;
        color:rgb(41, 41, 41);
        
       }
  .comments{
     
  }
  .rate .btn{
    
    text-shadow: 0 0 3px #00ac33, 0 0 5px #00ac33 !important;
        font-size:25px; 
  }
  
  
  

  li{
      list-style: none;
  }
  a{
      text-decoration: none;
  }
  #cts{
    word-break: break-word;  

  }
  form{
      margin-top:10px;
  }
  body{
      background: none !important;
  }
  #side_admin{
      border-radius:6px;
      padding: 0px;
  }
  .date{
      font-size:10px ;
  }
  .container{
      min-width: 99%;
  }
  .responsive{
    width: 100%;
    height: auto;  
    border-radius:5px;   
    }

    </style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
    function open_rapport(){

        $('#myrapport_form').removeAttr("hidden");
    }
    function closerapport(){
        $('#myrapport_form').attr("hidden","true");
  
  }
      function reset(){
        var mark=$('#mark').text();
    $('.rate').children().each(element => {
        if(element+1<=mark){
            $('.rate').children().eq(element).removeClass('text-light');

            $('.rate').children().eq(element).addClass('text-success');

        }else{
            $('.rate').children().eq(element).addClass('text-light');
            $('.rate').children().eq(element).removeClass('text-success');

        }

    });
    }
  
$('#lg').click(function(){

event.preventDefault();

id=location.pathname.split('/');


var obj={
  language:'ar'
};

localStorage.setItem('myJavaScriptObject', JSON.stringify(obj));
var auth="{{ Auth::user() }}";

if(auth!=""){

$.ajax({
    url: "/language",
    type:"GET",
    data:{
      language:'ar',
        
   
    },
    success:function(response){
    
    },
   });

}
location.replace('/ar/contact_client/'+id[id.length-1]);
});

$(document).ready(function(){
  
     reset();
   

    $('.rate').children().hover(function(){
        var nb=$(this).index();
        $('.rate').children().each(element => {

            if(element<=nb){
                $('.rate').children().eq(element).removeClass('text-light');


                $('.rate').children().eq(element).addClass('text-success');
            }


        });

    });
    $('.rate').children().on('mouseleave',function(){
        var nb=$(this).index();
        $('.rate').children().each(element => {
            if(element<=nb){
              reset();
            }
            

        });

    });

    $("#rapport_form").on("submit", function(event){
        event.preventDefault();
 
        var formValues= $(this).serialize();
 
        $.post("/envoyer_rapport", formValues, function(data){
            // Display the returned data in browser
            alert(data.success);
            closerapport();
            $("#rapport_form").reset();

        });
    });


});
function set_rate(val,id){
  
    $.ajax({
        url: "/set_rate/"+id,
        type:"POST",
        data:{
        _token:$("input[name=_token]").val(),
          value: val,
            
       
        },
        success:function(response){

            $('#mark').text(response.mark);
            reset();
            $('#avg').text(response.avg);

        },
       });
    

}



      function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}



function show_comments()
{

$('#cts').children().toggle(500);
  

}


var v= "{{ session('msg') }}";
  if(v.length > 1 ){
    alert(v);
  }


 </script>   