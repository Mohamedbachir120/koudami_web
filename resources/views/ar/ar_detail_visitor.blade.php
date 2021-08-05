@extends('layouts.ar_visitor_layout')

@section('content')
<div class="card">
        <div class="card-header bg-dark text-center text-light"><h4> {{ $user->name }} - {{ $user->prenom }}</h4> </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                   
                    @endif
                 
                     
                    <ul class="text-right">
                        <li> {{ $user->name }}&nbsp; : الاسم </li>
                        <li> {{ $user->prenom }} &nbsp;:اللقب </li>
                        <li>{{ $user->email }}:&nbsp; البريد الالكتروني  </li>
                        <li>{{ $user->phone_number }} &nbsp; : رقم الهاتف</li>
                        <li> {{ $user->created_at }}:&nbsp; تاريخ  الالتحاق بالمنصة </li>
                        
                    </ul>

                        <div class="row justify-content-center">
                         <div>  <a href="/edit_visitor/{{ $user->id }}" class="btn btn-success"><i class="fa fa-edit"></i></a> &nbsp;
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