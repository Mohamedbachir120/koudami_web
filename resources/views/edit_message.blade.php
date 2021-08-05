@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p> veuillez joindre votre quittance ci-dessous pour activer votre compte ,<br>la procédure peut prendre quelques
                        minutes    
                    </p>
                    <div>
                      <label for=""> Contenu Actuel</label>  
                <iframe src="/storage/{{ $message->contenu }}" frameborder="0"></iframe>
                    </div>
       <form action="/update_quittance/{{ $message->id }}" enctype="multipart/form-data"  method="POST">
        
                @csrf
        <label for="contenu">Votre fichier:</label>
                <input type="file"  name="contenu"  placeholder="contenu" required>
                <button type="submit" class="btn btn-primary">Envoyer</button>
                
                        </form>
                    
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
