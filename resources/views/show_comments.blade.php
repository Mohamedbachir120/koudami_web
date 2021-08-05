@extends('layouts.moderator_admin')

@section('content')
<div class="card">
                <div class="card-header bg-dark text-light text-center"><h4>Table des commentaires</h4></div>
            
                <div class="d-flex flex-row my-2 justify-content-center align-items-center">
                     <input type="search" class="form-control col-sm-3" name="search" id="search"> 
                     <div class="col-sm-3" style="font-size: 20px;"> <i class="fa fa-search"></i> </div>
                </div>

                     <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                    <table class="table table-sm">
                        <thead class="thead-light">
                <tr>
                  <th>ID</th>  
                 <th>Action</th>
                 <th>Contenu</th>
                 <th>Publier par:</th>
                 <th>Profil de :</th> 
                 <th>Date d'envoi</th>
            
                </tr>
            </thead>
                    <tbody>
                        @foreach($comments  as $item)
                    <tr class="cmt" id="{{ $item->id }}">
                    <td>{{ $item->id }}</td>
                    <td><form action="/delete_comment/{{ $item->id }}" method="post">                           
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('voulez vous vraiment supprimer ce commentaire')">Supprimer </button></form> </td>
                    <td> {{ $item->contenu }}</td>    
                  
                    <td> {{ $item->poster->name }} - {{ $item->poster->prenom }} </td>    
                    <td> {{ $item->owner->name }} - {{ $item->owner->prenom }}</td>    
                 
                    
                   <td> {{ $item->created_at }}  </td> 
                  
                </tr>   
                    @endforeach
                    </tbody>
                 </table>
                    </div>
                    <div>
                        <div class="d-flex justify-content-center" >
                            {{ $comments->links() }}  
                    
                    </div>
                </div>
            </div> 
</div>    
  
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
    var v= "{{ session('msg') }}";
  if(v.length > 1 ){
    alert(v);
  }

  $( document ).ready(function() {


    $("#search").keyup(function(e){
    var v=$('#search').val();

    $('.cdt').each(function(){
            $(this).remove();
        });


        if(v[0]!=" " && v.length>0){
        

       $('.cmt').each(function(){
            $(this).fadeOut(100);
            
       });

       $.ajax({
        url:'/find_comment',
        method:'GET',
        data:{
          search:v,
        
       
        },
        success:function(response){
        //
            response.forEach(element => {

    $('tbody').append('<tr class="cdt"><td>'+element.id+'</td><td><form method="post" action="/delete_comment/'+element.id+'">@csrf @method("delete")<input type="submit" class="btn btn-danger" value="supprimer"></form></td><td>'+element.contenu+'</td><td>'+element.poster_name+'</td><td>'+element.owner_name+'</td><td>'+element.created_at+'</td></tr>');


            });
       
        },

       
    
    });
 
}
else if(v.length == 0){
    $('.cmt').each(function(){
        $(this).fadeIn(100);
               
            });                

}

});  
 


  });
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
     
  
  
  </style>




