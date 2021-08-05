@extends('layouts.client')

@section('content')
 <div class="card">
                <div class="card-header bg-dark text-light">
                      <strong>Modifier votre photo de profile </strong>
                </div>

                <div class="p-4">
                  <h5>Votre photo de profil actuelle </h5>
                  @if (Auth::user()->photo != NULL)
                  <img src="{{ Storage::disk('s3')->url(Auth::user()->photo) }}" width="300px" height="300px" class="m-3 responsive" alt="">
                      
                  @else
                 <img src="/css/avatar.png" width="300px" height="300px" class="m-3 responsive" alt="">
                  @endif
                </div>

                <div class="card-body">
                    <form action="/save_pic" enctype="multipart/form-data"  method="post">
                    @csrf
                    <label for="photo">L'image</label>
                    <input type="file" name="image" id="photo" required>
                
                    <input type="submit" class="btn btn-success"  value="Confirmer">
                </form>
                </div>
  </div>
        
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
.card-header{
    text-align: center;
} 
.responsive{
  width: 100%;
  max-height: 300px;
  height: auto;    
  
}
</style>
<script>

var v= "{{ session('msg') }}";
  if(v.length > 1 ){
    alert(v);
  }

  
</script>
