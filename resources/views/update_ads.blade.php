@extends('layouts.moderator_admin')

@section('content')
<div class="card">
                <div class="card-header bg-dark text-center text-light"><h4>Mise à jour d'une publicitée</h4></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                  
                <form action="/update_ads/{{ $id }}" enctype="multipart/form-data"  method="POST">

                @csrf
                <div class="form-group row">

                <label for="propr" > Propriétaire:  &nbsp;</label>
                <input type="text" name="propr" value="{{ $ele->propr }}" required>
                </div>
                <div class="form-group row">

                <label for="contenu">Votre fichier: &nbsp;</label>
                <input type="file"  name="contenu" id="file"  placeholder="contenu" >
                </div>
                <div class="form-group row">
                <label for="link">Votre lien:  &nbsp; </label>
                <textarea name="link" type="text" width="200"height="200">{{ $ele->link }}</textarea>
                </div>
                <div class="form-group row">
                    <label for="width">Largeur:  &nbsp; </label>
                <input name="width" type="number" min="0" step="10" max="1350" value="{{ $ele->width }}">    
                    </div>            
                <div class="form-group row">
                        <label for="height">Hauteur:  &nbsp; </label>
                <input name="height" type="number" step="10" min="0" max="570" value="{{ $ele->height }}">    
                </div>
             
                <div class="form-group row">
                    <label for="type">type &nbsp;</label>
                <input type="text" name="type" id="type" value="{{ $ele->type }}" readonly>
                </div>
                <div class="form-group row">
                <label for="debut">Date Début:&nbsp;</label>
                <input type="date" name="debut" id="debut" value="{{ $ele->debut }}">
                    
                </div>
                    <div class="form-group row">
                <label for="fin">Date fin:&nbsp;</label>
                    <input type="date" name="fin" id="fin" value="{{ $ele->fin }}">
                </div>
                <div class="form-group row">
                    <label for="mode">Mode : &nbsp;</label>
                    <select name="mode" id="mode">
                        @if( $ele->mode == "half")
                        <option value="half" selected>Demi journée</option>
                        <option value="full">Toute la journée</option>
                        @else
                        <option value="half">Demi journée</option>
                        <option value="full" selected>Toute la journée</option>
                        
                        @endif
                    </select>

                    </div>
                <div class="errors"></div>
                <div class="form-group row">
                <button type="submit" class="btn btn-primary" id="submit">Ajouter</button>
                 </div>

                        </form>


                </div>
            </div>
  
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
     $( document ).ready(function() {

$('#file').change(function(){

    var extentions=['jpeg','jpg','png','mp4','gif','flv','mov','avi','wmv'];
    var input = document.getElementById('file').files[0];
    var tab=input.name.split('.');
    if(input.size>50000000)
    {

        $(".errors").text('taille maximale  dépacée');
        $("#submit").prop('disabled',true);
    }
    else{

        var ext=tab[tab.length-1].toLowerCase();
        if(extentions.indexOf(ext)==-1){

            $(".errors").text('extension non acceptée');
            $("#submit").prop('disabled',true);


        }else{

            $('.errors').fadeOut(500);
            $("#submit").prop('disabled',false);
            if(ext=="jpeg" || ext=="jpg" || ext=="png" || ext=="gif")
            {
                $('#type').val('image');
            }
            else{
                $('#type').val('video');
                
            }

        }


    }
   

   


      });

});

</script>
<style>
    .errors{
        color: red;
    }
</style>