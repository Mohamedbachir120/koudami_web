@extends('layouts.client')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" integrity="sha256-Uv9BNBucvCPipKQ2NS9wYpJmi8DTOEfTA/nH2aoJALw=" crossorigin="anonymous"></script>


<div class="card">
                <div class="card-header text-center bg-dark text-light">  
                  
                    <h4> Détail de l'article N° {{ $emploi->id }}</h4>

                </div>
                <div class="card-body d-flex flex-column align-items-left">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                           <ul >
                            <li>Emploi  : &nbsp; &nbsp; {{ $emploi->emploi}}</li>
                            <li>Catégorie : &nbsp; &nbsp; {{ $emploi->categorie_emploi}}</li>
                            <li>Salaire : &nbsp; &nbsp; {{ $emploi->salaire }} DA</li>
                            <li>Date de publication : &nbsp; &nbsp; {{ $emploi->created_at }}</li>
                            <li>Date de la derniére modification :&nbsp; &nbsp; {{ $emploi->updated_at }} </li>
                            <li>Contact : &nbsp;&nbsp;{{ $emploi->contact}}</li>
                            <li>Description :&nbsp;&nbsp; {{ $emploi->description }} </li>                            
                            <div class="row m-3">
                                <div>
                                <a href="{{ route('edit_job',$emploi) }}" class="btn btn-success mx-2"><i class="fa fa-edit"></i>Modifier</a>
                                
                                </div>
                                
                            <form action="{{ route('delete_emploi',$emploi) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" onclick="return confirm('voulez vous vraiment supprimer cet article')"><i class="fa fa-eraser"></i> Supprimer</button>
                            </form>
                                
                            </div>
                             
                        </ul> 
                    
                   
                     

                    
                        
                </div>
            </div>
          <span  id="msg" hidden></span>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>

function alertSpecial(msg) {
  $('#msg').html(msg);
  alert($('#msg').text());
  }



  


$(document).ready(function(){

var tab=$('body').children();

  
var v= "{{ session('msg') }}";

if(v.length > 1 ){

alertSpecial(v);
}


});

function myfunction(){
$(".ads").remove();
$('.row').show();
$('#header').show();

}


</script>
<style>
  img {
    border-radius: 50%;
  }
  li{
      list-style: none;
  }


</style>