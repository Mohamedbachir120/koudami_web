@extends('layouts.moderator_admin')

@section('content')

            <div class="card">
                <div class="card-header bg-dark text-light text-center"><h4>Table des modérateurs </h4> </div>

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
                 <th>Action</th>
                 <th>Nom d'utilisateur</th>
                  <th>Email</th>
                  <th>N°Tél</th>
                  <th>Date de creattion de compte</th>

                </tr>
                <thead class="thead-light">
                    <tbody>
                        @foreach($moderators  as $item)
                    <tr>
                    <td><a class="btn btn-primary" href="/detail_moderator/{{ $item->id }}">+ Détails</a></td>
                   <td> {{ $item->name }}</td> 
                   <td> {{ $item->email }}</td> 
                   <td> {{ $item->phone_number }} </td> 
                   <td> {{ $item->created_at }}</td> 
                  
                </tr>   
                    @endforeach
                    </tbody>
                 </table>
                </div>
                </div>
            </div>
 
@endsection

<style>
</style>
<script>

var v="{{ session('msg') }}";

if(v.length >0){
    alert(v);
}
function hd(){
    alert("hello world");
}
</script>
