@extends('layouts.moderator_admin')
@section('content')

<div class="card">
              <div class="card-header bg-dark text-center text-light"><h4>Messagerie</h4></div>

<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <ul>
      @if (count($rooms) == 0)
          
        <li> Vous n'avez reçu aucun message</li>

      @else
      @foreach ($rooms as $item => $value)
        <li class="elem">
      @if($value != NULL)      
      <img src="/css/avatar.png" alt="user" width="50px" height="50px">
        <a href="/room/{{ $item }}">    <strong>{{ $names[$item] }}</strong>       {{ $value->body }} - {{ $value->created_at }} </a> 

      @else 
      <img src="/css/avatar.png" alt="user" width="50px" height="50px">
      <a href="/room/{{ $item }}"> <strong>{{ $names[$item] }} </strong>  Démarrer une conversation 
      </a>
      @endif
    </li>
      @endforeach           
      @endif
 
    </ul>
      </div>
                </div>
                </div>
            </div>
        </div>
  
@endsection

<script>
    var v= "{{ session('msg') }}";
  if(v.length > 1 ){
    alert(v);
  }
  
</script>
 
<style>
     li{
        list-style: none;
    }
    .elem{
        padding: 5px;
        background: rgb(243, 243, 243);
        border-radius: 10px;
        margin: 5px;
     
    }
    
  
  #side_admin{
      border-radius:6px;
      padding: 0px;
      box-shadow:inset 0px 0px 2px 2px rgb(172, 225, 255) ;
  }
  @media screen and (max-width: 650px) {
  }
  
  </style>
