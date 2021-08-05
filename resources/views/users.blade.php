@extends('layouts.moderator_admin')

@section('content')

<div class="card">
                <div class="card-header bg-dark text-center text-light"><h4>Table des utilisateurs</h4></div>
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
                 
                <table class="table table-striped table-sm">
                    <thead class="thead-light">
            <tr>
             <th>Action</th>
             <th>Nom d'utilisateur</th>
              <th>Email</th>
              <th> Catégorie</th>
              <th>Localisation</th>
              <th>Vérification Email</th>
        
            </tr>
            <thead class="thead-light">
                <tbody>
                    @foreach($users  as $item)
                <tr class="cmt" id="{{ $item->id }}">
                <td><a class="btn btn-primary" target="_blank" href="/home/show_users/detail_user/{{ $item->id }}">+ Détails</a></td>
               <td> {{ $item->name }}</td> 
               <td> {{ $item->email }}</td> 
                <td> {{ $item->categorie }}</td>
               <td> {{ $item->wilaya }} - {{ $item->commune }} </td> 
               <td> @if ($item->email_verified_at != NULL)
                   Email Vérifié
                   @else
                   <button class="btn btn-success" onclick="send_confirm({{ $item->id }})" >Confirmer</button>
               @endif </td> 
              
            </tr>   
                @endforeach
                </tbody>
             </table>

            </div>
            <div class="row" style="overflow-x:scroll;" >
                {!! $users->onEachSide(2)->links() !!}
            </div>
          
                    </div>
 </div>
   
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<script>

function send_confirm(id){

   $.ajax({
    url:'/confirm_email',
    method:'GET',
    data:{
      id:id,
    
   
    },
    success:function(response){
        $("#"+id+" td:nth-child(6)").html("Email Vérifié");   
    }
   });

}
var v="{{ session('msg') }}";

if(v.length >0){
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
    url:'/find_user',
    method:'GET',
    data:{
      search:v,
    
   
    },
    success:function(response){
    //
        response.forEach(element => {

           
            $('.cmt').each(function(){
            if(element.id == $(this).attr('id')){
             
    $('tbody').append('<tr class="cdt"><td><a href="/home/show_users/detail_user/'+element.id+'" class="btn btn-success">+ details</a></td><td>'+element.name+'</td><td>'+element.email+'</td><td>'+element.categorie+'</td><td>'+element.wilaya+' - '+element.commune+'</td><td>'+element.Ncompte+'</td><td>');
            }
        });

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
