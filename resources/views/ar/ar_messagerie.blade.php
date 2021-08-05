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
            <button type="submit" class="btn text-light">الخروج</button>
            
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
        <div class="card-header bg-dark text-light text-center"><strong>الرسائل</strong></div>

      <div class="card-body">
      @if (session('status'))
      <div class="alert alert-success" role="alert">
      {{ session('status') }}
      </div>
      @endif
      <ul>
      @foreach ($rooms as $item => $value)
      <li class="elem">
      @if($value != NULL)      
      <img src="/css/avatar.png" alt="user" width="50px" height="50px">
      <a href="/room/{{ $item }}">    <strong>{{ $names[$item] }}</strong>       {{ $value->body }} - {{ $value->created_at }} </a> 

      @else 
      <img src="/css/avatar.png" alt="user" width="50px" height="50px">
      <a href="/room/{{ $item }}"> محادثة جديدة <strong>{{ $names[$item] }} </strong> 
      </a>
      @endif
      </li>
      @endforeach  
      </ul>
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
  
 
<style>
     li{
        list-style: none;
    }
    .elem{
        padding: 5px;
        background: rgb(243, 243, 243);
        border-radius: 10px;
        margin: 5px;
        display: flex;
        flex-direction: row-reverse;
        align-items: center;

    }
  
  #side_admin{
      border-radius:6px;
      padding: 0px;
      box-shadow:inset 0px 0px 2px 2px rgb(172, 225, 255) ;
  }
  @media screen and (max-width: 650px) {
  }
  
  </style>
