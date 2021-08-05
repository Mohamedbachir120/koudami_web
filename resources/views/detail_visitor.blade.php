@extends('layouts.moderator_admin')

@section('content')
<div class="card">
        <div class="card-header bg-dark text-center text-light"><h4> {{ $user->name }} - {{ $user->prenom }}</h4> </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                   
                    @endif
                 
                     
                    <ul>
                        <li>Nom: &nbsp; {{ $user->name }}</li>
                        <li>Prénom: &nbsp;{{ $user->prenom }}</li>
                        <li>Email:&nbsp;{{ $user->email }} </li>
                        <li>Numéro de téléphone: &nbsp;{{ $user->phone_number }}</li>
                        <li>A rejoint la plateforme le:&nbsp;   {{ $user->created_at }} </li>
                       
                    </ul>

                        <div class="row justify-content-center">
                         <div>  <a href="/edit_visitor/{{ $user->id }}" class="btn btn-success"><i class="fas fa-edit"></i> Modifier</a> &nbsp;
                         </div> 
                       
                            </div>
                      
                        </div>
                </div>
            </div>
 @endsection
<style> 
li{
    list-style: none;
    letter-spacing: 1px;
    font-weight:  bold;
    color: rgb(50,50,50);
}
</style>