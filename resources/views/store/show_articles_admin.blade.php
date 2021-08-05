@extends('layouts.moderator_admin')

@section('content')
<div class="card">
    
                <div class="card-header bg-dark text-light text-center"><h4>Table des articles</h4></div>
            
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
                  <th>Détail</th>  
                 <th>Suppression</th>
                 <th>Nom d'article</th>
                 <th>Catégorie</th>
                 <th>Publier par:</th>
                 <th>Date d'envoi</th>
            
                </tr>
            </thead>
                    <tbody>
                        @foreach($articles  as $item)
                    <tr class="cmt" id="{{ $item->id }}">
                    <td>{{ $item->id }}</td>
                    <td><a class="btn btn-primary" href="/store/article_detail/{{ $item->id }}">Détail</a></td>
                    <td><form action="/store/delete_article/{{ $item->id }}" method="post">                           
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('voulez vous vraiment supprimer cet article')">Supprimer </button></form> </td>
                    <td> {{ $item->nom_article }}</td>    
                  
                    <td>{{ $item->categorie }}</td>
                    <td> {{ $item->publicateur->name }} - {{ $item->publicateur->prenom }} </td>    
                    
                    
                   <td> {{ $item->created_at }}  </td> 
                  
                </tr>   
                    @endforeach
                    </tbody>
                 </table>
                    </div>
                    <div>
                        <div class="d-flex justify-content-center" >
                            {{ $articles->links() }}  
                    
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
        url:'/find_article_admin',
        method:'GET',
        data:{
          search:v,
        
       
        },
        success:function(response){
        //
            response.forEach(element => {

    $('tbody').append('<tr class="cdt"><td>'+element.id+'</td><td><a href="/store/article_detail/'+element.id+'" class="btn btn-primary">Détail</a></td><td><form action="/store/delete_article/'+element.id+'" method="post">@csrf @method("delete") <button type="submit" class="btn btn-danger" onclick="return confirm(\'voulez vous vraiment supprimer cet article\')">Supprimer </button></form> </td><td>'+element.nom_article+'</td><td>'+element.categorie+'</td><td>'+element.owner_name+'</td><td>'+element.created_at+'</td></tr>');



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




