@extends('layouts.moderator_admin')

@section('content')
<div class="card">
<div class="card-header bg-dark text-light text-center"><h4>Article N {{ $article->id }} </h4></div>
            
       
                     <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
           
             <ul class="p-4 border rounded">
     
                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <img src="{{ Storage::disk('s3')->url($article->image) }}" class="responsive rounded" width="250px"  height="200px" alt="koudami">

                    </div>
                     <div class="col-sm-12 col-md-4">
                        <img src="{{ Storage::disk('s3')->url($article->image2) }}" class="responsive rounded" width="250px"  height="200px" alt="koudami">
     
                    </div>                       
                    <div class="col-sm-12 col-md-4">
                        <img src="{{ Storage::disk('s3')->url($article->image3) }}" class="responsive rounded" width="250px"  height="200px" alt="koudami">

                    </div>
                </div>

                <li>ID : {{ $article->id }}</li>

                 <li>Nom d'article : {{ $article->nom_article }}</li>
                 <li>Catégorie: {{ $article->categorie }}</li>

                <li>Description : {{ $article->description }}</li>  
                <li>Publier par: {{ $article->publicateur->name }} - {{ $article->publicateur->prenom }}</li>
                <li> N°TEl : {{ $article->publicateur->phone_number }}</li> 
               <li>Date de publication : {{  $article->created_at }}</li>
            
               <a href="/store/edit_article/{{ $article->id}}" class="btn btn-success mx-2"><i class="fa fa-edit"> </i> </a>


            </ul>  
          
                    </div>
                  
            </div> 
  
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

 
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

    .responsive{
    width: 100%;
    max-height: 200px;
    height: auto;    
    }

     
  
  
  </style>




