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
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{ asset('js/language.js')}}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" integrity="sha256-Uv9BNBucvCPipKQ2NS9wYpJmi8DTOEfTA/nH2aoJALw=" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">

</head>
<body>
    <div id="app">
        <div id="app">
            <nav class="navbar navbar-expand-xl navbar-light bg-white font-weight-bold shadow" id="navbar">
                
              <a class="navbar-brand"  href="/ar"  id="logo"> <img src="{{ asset('images/logo.png') }}" alt="Koudami" width="70px" height="70px" ></a>
      
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
             
      
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto row align-items-center ml-2">
                    <li class="nav-item active">
                      <a class="nav-link mr-1" href="#apropos">?????????????? <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item mr-1">
                      <a class="nav-link" href="#contact">???????? ??????</a>
                    </li>
                    <li class="nav-item mr-1">
                      <a class="nav-link" href="/ar/our_clients">??????????</a>
                    </li>
                 
                    <li class="nav-item mr-1">
                      <a class="nav-link" href="/ar/store/show_articles">????????????</a>
                    </li>
                   
              
                  </ul>
                            
                 
                  <div class="row align-items-center justify-content-center">
      
                 @guest
                 <a href="/register/ar" class="nav-link animated-border-button col-xs-2"> ?????????????? &nbsp;  &nbsp;<i class="fa fa-user-plus"></i>  </a>
                 <a href="/login" class="nav-link animated-border-button mr-2 col-xs-2"> ???????????? &nbsp;  &nbsp;<i class="icofont-user-alt-7"></i> </a>
      
                 @endguest
                 @auth
                    <a href="/home" class="btn btn-primary mx-1"><i class="fa fa-home"></i>???????????? ????????????????</a>    
      
                 @endauth
                 <a class="btn  mx-2 rounded-fr"  id="lg" >Fr</a>
                </div>
                
                </div>
              </nav>

    </div>

<div class="container py-4">
      <div class="column">
       
  
<div class="col-sm-12">
   
<div class="d-flex flex-column align-items-end bg-white  p-3">

    <div class="row  align-items-center px-4 pb-2 justify-content-end col-md-8">
        <div class=" column mx-2">
            <div class="font-weight-bold">
                {{ $user->name }} {{ $user->prenom }}  

            </div>
            <div class="text-right">
                @if ( $user->type_inscription =="particulier")
                    ??????
                @else
                    ??????????
                @endif

            </div>
        </div>
        @if($user->photo != NULL)
        <img src="{{ Storage::disk('s3')->url($user->photo) }}" alt="" class="user-img" height="70px" width="70px">
            @else
            <img src="{{ asset('/css/avatar.png') }}" class="user-img" alt="" height="70px" width="70px">
        
            @endif
    
    </div>
    <ul class="text-right col-md-8 border p-4 rounded">        
        <li>
             ??????????
           @php
           $to_arabic=[];
                   $to_arabic["Constructions et Travaux"]="?????????????????? ????????????????";
                   $to_arabic["Industrie et fabrication"]="?????????????? ????????????????";
                   $to_arabic["D??coration et Am??nagement"]="?????????????? ????????????????";
                   $to_arabic["Traiteurs et Gateaux"]="????????????";
                   $to_arabic["Nettoyage et jardinage"]="?????????????? ????????????????";
                   $to_arabic["Location de v??hicules"]="?????????? ????????????????";
                   $to_arabic["Securit?? et Alarme"]="?????????? ????????????";
                   $to_arabic["Menuiserie et Meubles"]="?????????????? ??????????????";
                   $to_arabic["H??tellerie"]="??????????";
                   $to_arabic["Esth??tique et Beaut??"]="??????????";
                   $to_arabic["Comptabilit?? et Economie"]="???????????????? ??????????????????";
                   $to_arabic["Maintenance et infromatique"]="?????????????? ?? ?????????? ??????";
                   $to_arabic["Paraboles et d??mos"]="?????????? ?????????? ??????????????????";
                   $to_arabic["R??paration Electromenager"]="?????????? ?????????????? ????????????????";
                   $to_arabic["Juridique"]="??????????";
                   $to_arabic["Ecoles et formations"]="?????????????? ?? ??????????????";
                   $to_arabic["Transport et d??m??nagement"]="?????? ?? ??????????????????";
                   $to_arabic["Publicit?? et communication"]="?????????? ?? ??????????????????";
                   $to_arabic["Froid et climatisation"]="?????????????? ????????????????";
                   $to_arabic["M??decine et sant??"]="???????? ????????????";
                   $to_arabic["R??paration auto et diagnostic"]="?????????? ???????????? ????????????????";
                   $to_arabic["Projet et ??tudes"]="???????? ?? ????????????";
                   $to_arabic["Bureautique et internet"]="?????????????? ?? ????????????";
                   $to_arabic["Impression et ??dition"]="?????????? ?? ??????";
                   $to_arabic["Image et son"]="???????? ????????";
                   $to_arabic["Couture et confection"]="?????????????? ????????????????";
                   $to_arabic["Ev??nement et Divertissement"]=" ?????????? ?? ????????????";
                   $to_arabic["R??paration Electronique"]="?????????? ?????????? ??????????????????";
                   $to_arabic["Voyage"]="??????";
                   $to_arabic["Jeux"]="?????????? ??????????????";
                   $to_arabic["Accessoires et Modes"]="?????????????????? ????????????";
                   $to_arabic["V??tement et chaussures"]="?????????? ?? ??????????";
                   $to_arabic["Sports et loisris"]="??????????";
                   $to_arabic["Divers"]="??????????????";

           
                   echo (': '.$to_arabic[$user->categorie]);   
          @endphp
          <i class="icofont-list"></i>
               </li>
        <li>{{ $user->function }}: ????????????  <i class="icofont-worker"></i></li>
        <li> {{ $user->phone_number }} : ?????? ????????????  <i class="icofont-phone"></i></li>
        <li>{{ $user->email }} : ???????????? ????????????????????  <i class="icofont-ui-email"></i></li>
        <li>  {{ $user->wilaya }} - {{ $user->commune }} :   ??????????????  <i class="icofont-map-pins"></i> </li>
        @auth
        <li>  <a  href="/position/{{ $user->id }}" class="btn btn-primary" target="blank"><i class="fa fa-map-marker"></i></a>         ???????????? ????????????
        </li>
        @endauth       
    </ul>

    @if($user->galerie != NULL)

    <div id="carouselExampleControls" class="carousel slide  rounded-3 col-md-8" data-ride="carousel">
        <div class="carousel-inner bg-light p-1 rounded">

        @if($user->galerie->pic1 != NULL)
        <div class="carousel-item active">
            <img src="{{ Storage::disk('s3')->url($user->galerie->pic1) }}" class="responsive" width="200px"  height="200px" alt="koudami">
    
        </div>
        @endif
        @if($user->galerie->pic2 != NULL)
        <div class="carousel-item">
            <img src="{{ Storage::disk('s3')->url($user->galerie->pic2) }}" class="responsive" width="200px"  height="200px" alt="koudami">
        
            </div>
        
        @endif
        @if($user->galerie->pic3 != NULL)
        <div class="carousel-item">
            <img src="{{ Storage::disk('s3')->url($user->galerie->pic3) }}" class="responsive" width="200px"  height="200px" alt="koudami">
    </div> 
        @endif

       

    </div>
    @if( $user->galerie->pic1 != NULL && $user->galerie->pic2 != NULL && $user->galerie->pic3 != NULL)
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon bg-dark  p-3 rounded-circle" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon bg-dark p-3 rounded-circle" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
     @endif 
    </div>
    @endif
   @auth
   <div class="rate d-flex flex-row  justify-content-end p-2 col-md-8 border-top border-bottom align-items-center">
    <button class="btn text-light" onclick="set_rate(1,{{ $user->id }})"><i class="fa fa-star"></i></button>
    <button class="btn text-light" onclick="set_rate(2,{{ $user->id }})"><i class="fa fa-star"></i></button>
    <button class="btn text-light" onclick="set_rate(3,{{ $user->id }})"><i class="fa fa-star"></i></button>
    <button class="btn text-light" onclick="set_rate(4,{{ $user->id }})"><i class="fa fa-star"></i></button>
    <button class="btn text-light" onclick="set_rate(5,{{ $user->id }})"><i class="fa fa-star"></i></button>
    @php
    echo('<li id="mark" hidden>'.str_replace(['[',']'],"",$user->rated_by()->where('rater_id',Auth::user()->id)->pluck('value')).'</li>');
        
    @endphp
 </div>
   <div class="d-flex flex-row  justify-content-end p-2 col-md-8 border-top border-bottom align-items-center">
    <div class="col-md-2 text-dark">
        <i class="fa fa-star"></i><span id="avg">{{ $user->rated_by()->avg('value') }}</span> 
    </div>
    <div class="col-md-2 text-dark border-left  py-2 ">
        <i class="fa fa-eye"></i> {{$user->nbr_visite}}   
    
     </div>

 <div class="col-md-2 border-left py-2 ">
    <button class="btn p-0" onclick="show_comments()" id=fade_comment><i class="icofont-speech-comments"></i>{{ $user->comments->count()}}</button>

</div>
<div class="col-md-2 border-left py-2">      
    @if($user->is_liked(Auth::user()->id))
<a href="/likes/{{ $user->id }}"><i class="fa fa-heart" style="color:red;"></i></a> 
  @else
  <a href="/likes/{{ $user->id }}"><i class="fa fa-heart" style="color:black;"></i></a> 
  
  @endif
{{ $user->liked_by()->count() }}
</div>

</div>
<div class="col-md-8 d-flex flex-column align-items-end">
<form action="/store_comment/{{ $user->id }}" method="POST" class="col-md-8">
    <div class="form-group d-flex flex-row  align-items-center">

    @csrf
    <button type="submit" class="btn btn-success"><i class="icofont-location-arrow"></i></button>
    
    <input type="text"  name="contenu" class="text-right form-control mx-1" placeholder="???? ????????????" required>
    @if( Auth::user()->photo != NULL)
    <img src="{{ Storage::disk('s3')->url(Auth::user()->photo) }}" class="rounded-circle" width="40px" height="40px" alt="">
    @else
    <img src="{{ asset('css/avatar.png') }}" class="rounded-circle" width="40px" height="40px" alt="">

    @endif
  
    </div>
</form>
</div>
   <div class="comments col-md-8">
   
    <div id="cts" class="column">
    @foreach ($user->comments as $item)
    <div class="col-md-12">  
        <div class="comment d-flex flex-row  justify-content-end my-1">
        
         
         <div  class="text-right col-sm-10 border rounded">
             <div class="name"> {{ $item->poster->name }} {{ $item->poster->prenom }} </div>
     
             <div>     {{ $item->contenu }}     </div>    
         <div class="text-left font-weight-bold text-secondary"> {{ $item->created_at }}</div>           
         </div>  
         @if($item->poster->photo != NUll)
         <img src="{{ Storage::disk('s3')->url($item->poster->photo) }}" class="rounded-circle ml-1" width="40px"  height="40px" alt=""> 
            @else
         <img src="{{ asset('css/avatar.png') }}" class="rounded-circle ml-1" width="40px" height="40px" alt=""> 
         @endif
            
         
         </div>
             
    
         @if(Auth::user()->type_compte=="admin" || Auth::user()->type_compte=="moderator"  || Auth::user()->id == $item->poster->id )
     <form action="/delete_comment/{{ $item->id }}" method="post" class="col-md-8 d-flex flex-row justify-content-center">
    @csrf
    @method('delete')
        <a role="button" class="text-secondary font-weight-bold" onclick="return confirm('???? ???????? ?????? ??????????????');">??????</a>
    </form>
        @endif
    </div>
@endforeach
</ul>
</div>

@endauth

@guest
<div class="d-flex flex-row justify-content-end p-2 my-2 border-top border-bottom align-items-center col-md-7">
    <div class="col-md-2 text-dark">
        <i class="fa fa-star"></i><span id="avg">{{ $user->rated_by()->avg('value') }}</span> 
    </div>
    <div class="col-md-2 text-dark border-left  py-2">
        <i class="fa fa-eye"></i> {{$user->nbr_visite}}   

     </div>
    
    <div class="col-md-2 border-left py-2">
        <button class="btn p-0" onclick="show_comments()" id=fade_comment><i class="icofont-speech-comments"></i>{{ $user->comments->count()}}</button>
 
    </div>
    
     
     <div class="col-md-2 border-left py-2">
        <a role="button" class="text-dark"><i class="fa fa-heart" ></i>{{ $user->liked_by()->count() }}  </a> 

    </div>   
  
</div>
<div class="comments col-md-8">

  
 <div id="cts" class="d-flex flex-column">


    @foreach ($user->comments as $item)
 

  <div class="col-md-12">  
 
    <div class="comment d-flex flex-row  justify-content-end my-1">
   
       
    
    <div  class="text-right col-sm-11 border rounded">
        <div class="name"> {{ $item->poster->name }} {{ $item->poster->prenom }} </div>

        <div>     {{ $item->contenu }}     </div>    
    <div class="text-left font-weight-bold text-secondary"> {{ $item->created_at }}</div>           
    </div>  
    @if($item->poster->photo != NUll)
    <img src="{{ Storage::disk('s3')->url($item->poster->photo) }}" class="rounded-circle ml-1" width="40px"  height="40px" alt=""> 
       @else
    <img src="{{ asset('css/avatar.png') }}" class="rounded-circle ml-1" width="40px" height="40px" alt=""> 
    @endif
    
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

</div>

<footer class="bg-dark border  text-lg-start shadow-lg">
    <div class="container p-4">
      <div class="row text-right justify-content-end">
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase text-light">?????????? ????????</h5>
  
          <ul class="list-unstyled mb-0">
            <li>
              <a href="/" class="text-light text-decoration-none">  ???????????? ???????????????? <i class="fa fa-home"></i></a>
            </li>
            <li>
                <a href="/fr/our_clients" class="text-light text-decoration-none"> ??????????????&nbsp;<i class="fa fa-tasks" aria-hidden="true"></i></a>
              </li>
             
            <li>
              <a href="#apropos" class="text-light text-decoration-none">  ??????????????&nbsp;<i class="fa fa-newspaper-o"></i></a>
            </li>
            <li>
              <a href="#contact" class="text-light text-decoration-none"> ???????? ??????&nbsp;<i class="fa fa-archive"></i></a>
            </li>
            <li>
              <a href="#apropos" class="text-light text-decoration-none"> ???????? ??????????????????&nbsp;<i class="fa fa-archive"></i></a>
            </li>
          
          </ul>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase mb-0 text-light" id="contact">???????? ??????</h5>

          <ul class="list-unstyled">
            <li>
                <a class="text-light text-decoration-none" href="#"><i class="fa fa-map-marker  ms-5 me-2 my-2"></i>&nbsp; &nbsp; ?????? 03 ?????????? ?????????? ???????? ?????????? ???????????? ??????????????</a>
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
      ?? 2020 Copyright:
      <a class="text-white" href="#">Koudami.com</a>
      <p>???????? ???????????? ????????????
    </p>
    </div>
  </footer>
         
</body>
</html>

<style>
   .user-img{
       border-radius: 50%;
   }
 
    .name{
        font-weight: bolder;

    }
    .rate .btn{
    
    text-shadow: 0 0 3px #00ac33, 0 0 5px #00ac33 !important;
        font-size:25px; 
  }
  
    .comment{
        border-radius:5px;
        color:rgb(41, 41, 41);
        
       }
  .comments{
     
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
  language:'fr'
};

localStorage.setItem('myJavaScriptObject', JSON.stringify(obj));
var auth="{{ Auth::user() }}";

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
location.replace('/fr/contact_client/'+id[id.length-1]);
});






      function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}



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
function show_comments()
{

$('#cts').children().toggle(500);
  

}


var v= "{{ session('msg') }}";
  if(v.length > 1 ){
    alert(v);
  }


 </script>   
