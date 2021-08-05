@extends('layouts.moderator_admin')

@section('content')
<div class="card">
                <div class="card-header bg-dark text-light text-center"><h4>Table des quittances </h4></div>

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
                 <th> Mode d'inscription</th>
                 <th>propriétaire</th>
                 <th>N°compte</th> 
                 <th>Fichier</th>
                 <th>Date d'envoi</th>
                
                </tr>
                <thead class="thead-light">
                    <tbody>
                        @foreach($messages  as $item)
                    <tr>
                    <td> {{ $item->id }} </td>
                    <td><form action="{{ route('activer',['iduser'=>$item->user->id,'idarticle'=>$item->id  ]) }}" method="post">    
                        @csrf
                        <button type="submit" class="btn btn-success">activer </button></form> </td>
                    <td> {{ $item->user->type_inscription }}</td>    
                  
                    <td> {{ $item->user->name }}</td>    
                    <td> {{ $item->user->Ncompte }}</td>    
                 
                    <td> <a target="blank" href="/storage/{{ $item->contenu }}" class="btn btn-primary"><i class="fas fa-eye"></i> consulter</a> </td> 
                   <td> {{ $item->created_at }}  </td> 
                  
                </tr>   
                    @endforeach
                    </tbody>
                 </table>
                </div>
                <div class="d-flex justify-content-center" >
                    {{ $messages->links() }}  
            
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
  @media screen and (max-width: 650px) {
  }
  
  </style>



{{--  --}}