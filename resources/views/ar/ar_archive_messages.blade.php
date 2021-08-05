@extends('layouts.ar_client')

@section('content')

            <div class="card">
                <div class="card-header bg-dark text-center text-light">قائمة الايصالات </div>
            
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row justify-content-end m-3">

                    <a href="/envoyer_quittance" class="btn btn-success"><i class="fa fa-edit"></i> ارسال ايصال جديد</a>
                </div>
                   
                    <div class="table-responsive">
                           
                    <table class="table table-sm">
                        <thead class="thead-light">
                <tr>
                    @if( Auth::user()->type_compte=="admin")
                 <th>Traité par: </th>
                 <th>Date de traitement:</th>
                 <th>propriétaire</th>
                 <th> Mode d'inscription</th>
                 <th>N°compte</th> 
                 <th>Fichier</th>
                 <th>Date d'envoi</th>
                 @elseif(Auth::user()->type_compte == "simple")
                <th>عولجت من طرف  </th>
                <th>المرسل</th>
                <th>الملف</th>
                <th>تاريخ الارسال</th>
                <th>تغيير</th>  
                <th>حذف</th>
            
            
            
            
            
                @endif    
                </tr>
                <thead class="thead-light">
                    <tbody>
                        
                        @foreach($messages  as $item)
                    <tr>
                     @if($item->traiterPar == "non traitée")
                 
                 <td> لم تعالج بعد </td>
                 
                 <td> {{ $item->user->name }} </td>
                   
                    <td> <a target="blank" href="/storage/{{ $item->contenu }}" class="btn btn-primary"><i class="fa fa-eye"></i> consulter</a> </td> 
                   <td> {{ $item->created_at }}  </td> 
                   <td><a href="/edit_quittance/{{ $item->id }}" class="btn btn-success"><i class="fa fa-edit"></i> </a></td>
                  <td><form action="/delete_quittance/{{ $item->id }}" method="POST">@csrf  @method('delete') <button type="submit" class="btn btn-danger" onclick="return confirm('هل انت متأكد من عملية الحذف');"><i class="fa fa-eraser"></i></button> </form></td> 
                       @else 
                 
                       <td> {{ $item->traiterPar }} </td>
                       <td> {{ $item->user->name }} </td>
                       
                        <td> <a target="blank" href="/storage/{{ $item->contenu }}" class="btn btn-primary"><i class="fa fa-eye"></i> consulter</a> </td> 
                       <td> {{ $item->created_at }}  </td> 
                     
                       <td>-</td>
                      <td>-</td> 
                       @endif
               
                </tr>   
                    @endforeach
                    </tbody>
                 </table>
                 {{ $messages->links() }}
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



