@extends('layouts.client')

@section('content')
 <div class="card">
                <div class="card-header bg-dark text-light">
                      <h4>Modifier votre Galerie</h4>
                </div>



                <div class="card-body p-4">
                  <div class="row flex-wrap align-items-end">

                     <div class="col-md-4">

                        @if (Auth::user()->galerie != NULL && Auth::user()->galerie->pic1 != NULL )                       
                        <img src="{{ Storage::disk('s3')->url(Auth::user()->galerie->pic1) }}" width="300px" class="responsive"  height="300px" alt="Koudami">    
                      <div class="d-flex flex-row">
                        <div>

                        <button class="btn btn-success m-2" onclick="enable_form('#pic1')"><i class="fa fa-edit"></i></button>  
                      </div>
                       
                        <form action="/delete_pic/pic1"  enctype="multipart/form-data"  method="post">
                        @csrf
                        <button class="btn btn-danger m-2" onclick="return confirm('voulez vous vraiment supprimer cette photo')"><i class="fa fa-eraser"></i> </button>  
                      </form>
                      </div>
                        
                        @else
                        <button class="btn btn-outline-dark p-5 m-2" onclick="enable_form('#pic1')">Ajouter une photo <i class="fa fa-picture-o"></i></button>  
                        <p class="text-center">Image 1</p>
                        @endif
                      </div> 
                      <div class="col-md-4">
                          @if (Auth::user()->galerie != NULL && Auth::user()->galerie->pic2 != NULL)
                          <img src="{{ Storage::disk('s3')->url(Auth::user()->galerie->pic2) }}" width="300px" class="responsive"   height="300px" alt="Koudami">    
                          <div class="d-flex flex-row">
                            <div>
                            <button class="btn btn-success m-2" onclick="enable_form('#pic2')"><i class="fa fa-edit"></i></button>  
                          </div>
                            <form action="/delete_pic/pic2"  enctype="multipart/form-data"  method="post">
                              @csrf
                              <button class="btn btn-danger m-2" onclick="return confirm('voulez vous vraiment supprimer cette photo')"><i class="fa fa-eraser"></i> </button>  
                            </form>
                            
                          </div>
                       
                         
                          @else
                          <button class="btn btn-outline-dark p-5 m-2" onclick="enable_form('#pic2')">Ajouter une photo <i class="fa fa-picture-o"></i></button>  
                          <p class="text-center">Image 2</p>
                   
                          @endif
                      </div>
                      <div class="col-md-4"> 
                          @if (Auth::user()->galerie != NULL && Auth::user()->galerie->pic3 != NULL)
                          <img src="{{ Storage::disk('s3')->url(Auth::user()->galerie->pic3) }}" width="300px" class="responsive"   height="300px" alt="Koudami">    
                          <div class="d-flex flex-row">
                            <div>
                            <button class="btn btn-success m-2" onclick="enable_form('#pic3')"><i class="fa fa-edit"></i></button>  
                          </div>
                           
                            <form action="/delete_pic/pic3"  enctype="multipart/form-data"  method="post">
                              @csrf
                              <button class="btn btn-danger m-2" onclick="return confirm('voulez vous vraiment supprimer cette photo')"><i class="fa fa-eraser"></i> </button>  
                            </form>
                            
                          </div>
                       
                          @else
                          <button class="btn btn-outline-dark p-5 m-2" onclick="enable_form('#pic3')">Ajouter une photo <i class="fa fa-picture-o"></i></button>  
                          <p class="text-center">Image 3</p>
                   
                          @endif
                      </div>    

                    
                  </div>
                  <img id="blah" src="#" height="200px" width="200px" class="responsive"  alt="your image" hidden/>
              
                    <form class="p-4" action="/add_to_galerie" enctype="multipart/form-data" id="myform" method="post">
                    @csrf
                    <div class="form-group row" hidden>
                      <label for="pic1">Premiére image  <i class="fa fa-picture-o"></i> :&nbsp;</label>
                      <input type="file" name="pic1" class="photo"  id="pic1"   accept="image/*">
                     
                    </div>
                   <div class="form-group row" hidden>
                    <label for="pic2">Deuxiéme image <i class="fa fa-picture-o"></i> :&nbsp;</label>
                    <input type="file" name="pic2" class="photo"  id="pic2"   accept="image/*">
                   
                   </div>
                   <div class="form-group row" hidden>
                    <label for="pic3">Troisième image <i class="fa fa-picture-o"></i> :&nbsp;</label>
                    <input type="file" name="pic3" class="photo"  id="pic3"  accept="image/*">
                   
                   </div>
                   <div>
                  </div>
                   <div id="submit" hidden>
                    <input type="submit" value="Confirmer" class="btn btn-success">
              
                   </div>
                </form>
                 
                </div>
  </div>
        
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>

var v= "{{ session('msg') }}";
  if(v.length > 1 ){
    alert(v);
  }

 

  function enable_form(param){
    var ele=$(param);
    var parent=ele.parent();

    $('#myform')[0].reset();

    parent.siblings().attr('hidden',true);
    parent.siblings().children().attr('required',false);

    ele.attr('required',true);
    $('#blah').attr('hidden',true);
    ele.parent().removeAttr('hidden');
   
    
    $('#submit').removeAttr('hidden');
    


  } 

  function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }

    
    reader.readAsDataURL(input.files[0]);// convert to base64 string
    $('#blah').removeAttr('hidden');
  }
}
$( document ).ready(function() {


$("#pic1").change(function() {

  readURL(this);
});

$("#pic2").change(function() {

  readURL(this);
});
$("#pic3").change(function() {

  readURL(this);
});
});




</script>
 

<style>
 
.card-header{
    text-align: center;
} 
.responsive{
    width: 100%;
    max-height: 200px;
    height: auto;    
    }

</style>