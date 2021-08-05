@extends('layouts.ar_client')

@section('content')
<div class="card-header bg-dark text-center text-light">
  <strong>تغيير صورة البروفايل </strong> 
  </div>
            <div class="card d-flex flex-column align-items-end">
              
                <div class="p-4">
                  <h5 class="text-right">الصورة الحالية </h5>
                  @if (Auth::user()->photo != NULL)
                  <img src="{{ Storage::disk('s3')->url(Auth::user()->photo) }}" width="300px" height="300px" class="m-3 responsive" alt="">
                      
                  @else
                 <img src="/css/avatar.png" width="300px" height="300px" class="m-3 responsive" alt="">
                  @endif
                </div>
        
                <div class="card-body">
                    <form action="/save_pic" enctype="multipart/form-data" method="post">
                    @csrf
                    <input type="file" name="image" id="photo" accept="image/*" required>
                    <label for="photo">الصورة</label>
                  
                    <input type="submit" class="btn btn-success" value="تاكيد">
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
  



</script>
<style>
 
.card-header{
    text-align: center;
} 
.responsive{
  width: 100%;
  max-height: 300px;
  height: auto;    
  border-radius: 6px;
  
}
</style>