@extends('layouts.visitor_layout')

@section('content')
<div class="container">

            <div class="card">
                <div class="card-header bg-dark text-center text-light"><h4> <i class="fa fa-home"> Acceuil</i></h4></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h5> Voici la liste des catégories disponibles </h5>

                        <table class="table table-hover">
                          <thead class="thead-light">
                          <tr>
                              <th>Catégories</th>
                              <th>Nombre de Services</th>
                          </tr>
                          </thead>
                  <tbody>    
                  @foreach ($categories as $item)
                  <tr>
                  <td>{{ $item->categorie }} </td>  <td> {{ $item->total }} </td>
              </tr>
                  @endforeach
                  </tbody>
              </table>

                      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<style>
  .container{
    min-width: 100%;
  }
  li{
    list-style: none;
  }
  img{
    border-radius: 50%;
  }
</style>
<script>

    var v= "{{ session('msg') }}";
      if(v.length > 1 ){
        alert(v);
      }
      
    
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
     $.ajax({
            url: "/location",
            type:"GET",
            data:{
              att:tab[0],
              long:tab[1]  
           
            },
            success:function(response){
              console.log(response);
              if(response) {
                console.log("response");
              }
            },
           });
    
    }
    
    
    </script>