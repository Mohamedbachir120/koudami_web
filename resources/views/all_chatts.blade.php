@extends('layouts.moderator_admin')
@section('content')
<div class="card">
    <div class="card-header bg-dark text-light text-center"><h4>Table des messages:</h4></div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="d-flex flex-row my-2 justify-content-center align-items-center">
                        <input type="search" class="form-control col-sm-3" name="search" id="search"> 
                        <div class="col-sm-3" style="font-size: 20px;"> <i class="fa fa-search"></i> </div>
                   </div>
   
                    <div class="table-responsive">
                

                    <table class="table table-sm">
                        <thead class="thead-light">
                            <button  onclick="delete_()" class="btn btn-danger mb-1" id="delete_selected">Supprimer la selection</button>

                <tr>
                 <th><input type="checkbox" id="chkall"> </th>
                 <th>N° d'article</th>
                 <th>le message</th>
                 <th>Envoyé par</th>
                 <th>Reçu par</th>
                 <th>Envoyé le</th>
                <th>Supprimer </th>
                </tr>
                <thead class="thead-light">
                    <tbody>
                    
                    @foreach($chatts  as $item)
                    <tr class="cmt" id="{{ $item->id }}">
                   
                    <td><input type="checkbox" class="checkboxClass"  name="ids" value="{{ $item->id }}"></td> 
                    <td> {{ $item->id }} </td>
                    <td> {{ $item->body }} </td>
                    <td> {{ $item->sender->name }} - {{ $item->sender->prenom }}  </td>
                    <td> {{ $item->receiver->name }} - {{ $item->receiver->prenom }}  </td>
                    <td> {{ $item->created_at }}</td>
                  <td>
                    <form action="/delete_chatt/{{$item->id}}" method="POST">
                        @csrf 
                        @method('delete')
                        <button class="btn btn-danger" onclick="return confirm('voulez vous vraiment supprimer ce message');"><i class="fa fa-eraser"></i>  </button>
                  
                      </form>
                </td>
              
                </tr>   
                    @endforeach
                    </tbody>
                 </table>
                 {{ $chatts->links() }}
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>




</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
    $(function(e){

        $("#chkall").click(function(){

            $('.checkboxClass').prop('checked',$(this).prop('checked'));
        });
    });

       function delete_(){

            var allids=[];
            
            $('input:checkbox[name=ids]:checked').each(function(){

                allids.push($(this).val());

            });
            $.ajax({
                url:"{{route('delete_selected_chatts')}}",
                type:'DELETE',
                data:{
                    _token:$("input[name=_token]").val(),
                    ids:allids,

                },
                success:function(response){
                   
                   location.reload();

                }

            });

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
    url:'/find_message',
    method:'GET',
    data:{
      search:v,
    
   
    },
    success:function(response){
    //
        response.forEach(element => {

$('tbody').append('<tr class="cdt"><td><input type="checkbox" class="checkboxClass"  name="ids" value="'+element.id+'"></td><td>'+element.id+'</td><td>'+element.body+'</td><td>'+element.sender_name+'-'+element.sender_prenom+'</td><td>'+element.receiver_name+' - '+element.receiver_prenom+'</td><td>'+element.created_at+'</td><td><form method="post" action="/delete_message/'+element.id+'">@csrf @method("delete")<input type="submit" class="btn btn-danger" value="supprimer"></form></td></tr>');


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

var v="{{ session('msg') }}";

if(v.length >0){
    alert(v);
}


</script>




{{--  --}}
