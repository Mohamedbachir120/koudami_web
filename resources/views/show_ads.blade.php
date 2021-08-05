@extends('layouts.moderator_admin')
@section('content')
<div class="card">
    <div class="card-header bg-dark text-light text-center">Table des publicitées:</div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                

                    <table class="table table-sm">
                        <thead class="thead-light">
                            <button  onclick="delete_()" class="btn btn-danger mb-1" id="delete_selected">Supprimer la selection</button>

                <tr>
                 <th><input type="checkbox" id="chkall"> </th>
                 <th>N° d'article</th>
                 <th>propriétaire</th>
                 <th> fin de diffusion</th>
                 <th>mode de diffusion </th>
                 <th>Fichier</th> 
                 <th>Modifier </th>  
                <th>Supprimer </th>
                <th>Masquer/démasquer</th>
                </tr>
                <thead class="thead-light">
                    <tbody>
                    
                    @foreach($ads  as $item)
                    <tr>
                   
                       <td><input type="checkbox" class="checkboxClass"  name="ids" value="{{ $item->id }}"></td> 
                    <td> {{ $item->id }} </td>
                    <td> {{ $item->propr }} </td>
                    <td> {{ $item->fin }}  </td>
                   @if($item->mode =="full")
                    <td>Toute la journée</td>
                    @else
                    <td>Demi journée</td>
                    @endif 
                   
                <td>   
                     <a href="{{ Storage::disk('s3')->url($item->contenu) }}" target="blank" class="btn btn-primary">consulter</a>
             
                    </td> 
                    
                <td><a href="/edit_ads/{{ $item->id }}" class="btn btn-success"><i class="fa fa-edit"></i></a></td>
                  <td>
                    <form action="{{ route('ads.destroy',$item->id) }}" method="POST">
                        @csrf 
                        @method('delete')
                        <button class="btn btn-danger" onclick="return confirm('voulez vous vraiment supprimer cette publicitée');"><i class="fa fa-eraser"></i>  </button>
                  
                      </form>
                </td>
                <td>
                 @if($item->state == "visible")
                <a href="/masquer/{{ $item->id }}" class="btn btn-primary">Masquer</a>
                 @else
                <a href="/demasquer/{{ $item->id }}" class="btn btn-primary">Démasquer</a>
                 
                 @endif
                </td> 
                </tr>   
                    @endforeach
                    </tbody>
                 </table>
                 {{ $ads->links() }}
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
                url:"{{route('delete_selected')}}",
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


var v="{{ session('msg') }}";

if(v.length >0){
    alert(v);
}


</script>




{{--  --}}
