@extends('layouts.moderator_admin')

@section('content')
            <div class="card">
                <div class="card-header"><h4>  {{ $mod->name }} - {{ $mod->prenom }} </h4> </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                   
                    @endif
                 
                     
                    <ul>
                        <li>Nom: &nbsp; {{ $mod->name }}</li>
                        <li>Prénom: &nbsp;{{ $mod->prenom }}</li>
                        <li>Email:&nbsp;{{ $mod->email }} </li>
                        <li>Numéro de téléphone: &nbsp;{{ $mod->phone_number }}</li>
                        <li>A rejoint la plateforme le:&nbsp;   {{ $mod->created_at }} </li>
                       
                    </ul>

                        <div class="row justify-content-center">
                         <div>  <a href="/edit_moderator/{{ $mod->id }}" class="btn btn-success"><i class="fas fa-edit"></i> Modifier</a> &nbsp;
                         </div> 
                         <div>
                         <form action="{{ route('moderator.destroy',$mod->id) }}" method="POST">
                                @csrf 
                                @method('delete')
                                <button class="btn btn-danger"><i class="fas fa-eraser"></i> Supprimer </button>
                          
                              </form>
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