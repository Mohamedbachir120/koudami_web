@extends('layouts.moderator_admin')

@section('content')
<div class="card">
                <div class="card-header bg-dark text-light text-center"><h4>Suivie des modérateurs</h4></div>
            
                <div class="d-flex flex-row my-2 justify-content-center align-items-center">
                     <input type="search" class="form-control col-sm-3" name="search" id="search"> 
                     <div class="mx-1"  style="font-size: 20px;"> <i class="fa fa-search"></i> </div>
                    <div> <a href="/show_operations" class="btn btn-primary"><i class="fa fa-refresh"></i></a></div>                
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
                  <th>Objet d'opération</th>  
                 <th>Faite par</th>
                 <th>Date d'opération</th>
                 <th>Action</th>
            
                </tr>
            </thead>
                    <tbody>
                        @foreach($operations  as $item)
                    <tr class="cmt" id="{{ $item->id }}">
                    <td>{{ $item->id }}</td>
                
                    <td> {{ $item->object }} </td>
                    
                    <td> {{ $item->user->name }} - {{ $item->user->prenom }} </td>
                   <td> {{ $item->created_at }}  </td> 
                   <td>
                   <form action="/delete_operation/{{ $item->id }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('voulez vous vraiment supprimer cette opération')">Supprimer </button></form> </td>
                  
                </tr>   
                    @endforeach
                    </tbody>
                 </table>
                    </div>
                    <div>
                        <div class="d-flex justify-content-center" >
                            {{ $operations->links() }}  
                    
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
        url:'/find_operations',
        method:'GET',
        data:{
          search:v,
        
       
        },
        success:function(response){
        //
            response.forEach(element => {

                $('tbody').append('<tr class="cdt"><td>'+element.id+'</td><td>'+element.object+'</td><td>'+element.name+' - '+element.prenom+'</td><td>'+element.created_at+'</td><td><form method="post" action="/delete_operation/'+element.id+'">@csrf @method("delete")<input type="submit" class="btn btn-danger" value="delete"></form>'+'</td></tr>');

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




