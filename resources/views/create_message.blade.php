@extends('layouts.client')

@section('content')
<div class="container">
            <div class="card">
                <div class="card-header bg-dark text-light text-center"> <h4> Quittance</h4></div>

                <div class="card-body p-4">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p> veuillez joindre votre quittance ci-dessous pour activer votre compte ,<br>la procédure peut prendre quelques
                        minutes    
                    </p>
                    <br>
                   
                  
       <form action="/store_quittance" enctype="multipart/form-data"  method="POST">
        
                @csrf
               <div>      
                <div><label for="contenu">Votre fichier:</label><input type="file"  name="contenu" id="file"  placeholder="contenu" required></div>
                <div class="errors">
                </div>
                <div class="d-flex flex-row justify-content-center m-3">
                    <button type="submit" class="btn btn-primary" id="submit">Envoyer</button>
                
                </div>
                
                </div> 
 
                        </form>
                        <p>
                            La taille de votre fichier ne doit pas dépasser 10mo <br>
                            Les extensions acceptées sont : jpeg , jpg , png , pdf , gif , docx , xls
                        </p> 
                   
                </div>
            </div>
        </div>
  
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
  $( document ).ready(function() {

    $('#file').change(function(){

        var extentions=['jpeg','jpg','png','pdf','gif','docx','xls'];
        var input = document.getElementById('file').files[0];
        var tab=input.name.split('.');
        if(input.size>10000000)
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