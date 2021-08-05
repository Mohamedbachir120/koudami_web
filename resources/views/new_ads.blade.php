@extends('layouts.moderator_admin')

@section('content')
            <div class="card">
                <div class="card-header bg-dark text-center text-light"><h4>L'ajout d'une publicitée</h4></div>
            
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h5>  
                 il est recommendé de joindre un lien avec la publicitée             
                    </h5>
               <form action="/store_ads" class="m-4" enctype="multipart/form-data"  method="POST">
            
                @csrf
                <div class="form-group row">
                       
                <label for="propr" > Propriétaire:  &nbsp;</label>
                <input type="text" name="propr" required>
                </div>
                <div class="form-group row">
                
                <label for="contenu">Votre fichier: &nbsp;</label>
                <input type="file"  name="contenu" id="file" placeholder="contenu" >
                </div>
                <div class="form-group row">
                <label for="link">Votre lien:  &nbsp; </label>
                <input name="link" type="text">    
                </div>
                <div class="form-group row">
                    <label for="width">Largeur:  &nbsp; </label>
                    <input name="width" type="number" min="0" step="10" max="1350">    
                    </div>            
                <div class="form-group row">
                        <label for="height">Hauteur:  &nbsp; </label>
                        <input name="height" type="number" step="10" min="0" max="570">    
                </div>
                <div class="form-group row">
                    <label for="type">type &nbsp;</label>
                    <input type="text" name="type" id="type"  readonly>
                </div>
                <div class="form-group row">
                <label for="debut">Date Début:&nbsp;</label>
                <input type="date" name="debut" id="debut">
                 
                </div>
                 <div class="form-group row">
                <label for="fin">Date fin:&nbsp;</label>
                <input type="date" name="fin" id="fin">
                </div>
                <div class="form-group row">
                    <label for="mode">Mode : &nbsp;</label>
                    <select name="mode" id="mode">
                        <option value="half">Demi journée</option>
                        <option value="full">Toute la journée</option>

                    </select>

                </div>
             
                <div class="errors">
                </div>
                <div class="form-group row">
                <button type="submit" class="btn btn-primary" id="submit"><i class="fa fa-plus"></i> Ajouter</button>
                 </div>
                        </form>
                    
                   
                </div>
            </div>
            </div>
        </div>
  
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
    var v= "{{ session('msg') }}";
  if(v.length > 1 ){
    alert(v);
  }
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
     li{
        list-style: none;
    }
    .elem{
        padding: 5px;
        background: rgb(243, 243, 243);
        border-radius: 10px;
        margin: 5px;
     
    }
  
  
  </style>





