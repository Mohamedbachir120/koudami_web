@extends('layouts.client')

@section('content')

<div class="card">
                <div class="card-header bg-dark text-center text-light"><h4>Table d'archive des quittances</h4></div>
            
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/envoyer_quittance" class="btn btn-success m-3"><i class="fa fa-edit"></i> &nbsp; Nouvelle quittance </a>
                         <div class="table-responsive">
                           
                    <table class="table table-sm">
                        <thead class="thead-light">
                   
                <tr>
                <th>Traité par: </th>
                <th>propriétaire</th>
                <th>Fichier</th>
                <th>Date d'envoi</th>
                <th>Action 1</th>  
                <th>Action 2</th>
            
            
            
            
            
                </tr>
                  
                <thead class="thead-light">
                    <tbody>
                     @foreach($messages  as $item)
                    <tr>
                   <td> {{ $item->traiterPar }} </td>
                   <td><a target="_blank"  href="/home/show_users/detail_user/{{ $item->user->id }}"> {{ $item->user->name }} </a> </td>
                   
                    <td> <a target="blank" href="/storage/{{ $item->contenu }}" class="btn btn-primary"><i class="fa fa-eye"></i> consulter</a> </td> 
                   <td> {{ $item->created_at }}  </td> 
                  
                   @if($item->traiterPar == "non traitée")
                   <td><a href="/edit_quittance/{{ $item->id }}" class="btn btn-success">Modifier </a></td>
                  <td><form action="/delete_quittance/{{ $item->id }}" method="POST">@csrf  @method('delete') <button type="submit" onclick="return confirm('voulez vous vraiment supprimer cette quittance');" class="btn btn-danger">Supprimer</button> </form></td> 
                       @else 
                      <td>-</td>
                      <td>-</td> 
                    @endif
              
                </tr>   
                 @endforeach
                    </tbody>
                 </table>
                 @if($messages->count() == 0)
                 <tr >
                     <h4 class="text-center">La table est vide </h4>
                 </tr>
                   @endif     
   
                 <div class="d-flex justify-content-center" >
                    {{ $messages->links() }}  
            
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



