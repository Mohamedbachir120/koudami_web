@extends('layouts.ar_client')

@section('content')

            <div class="card">
                <div class="card-header bg-dark text-light" style="text-align: center;"><h4>تغيير كلمة السر</h4></div>

                <div class="card-body">
                <form method="POST" action="/update_password/{{ Auth::user()->id }}">
                        @csrf
                        <div class="form-group row justify-content-end">
                      
                       
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required >

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <label for="password" class="col-md-2 col-form-label text-md-right">كلمة السر القديمة</label>

                        </div>
                        <div class="form-group row justify-content-end">
                      
                    
                        <div class="col-md-6">
                            <input id="confirmpassword" type="password" class="form-control @error('password') is-invalid @enderror" name="confirmpassword" required >

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <label for="password" class="col-md-2 col-form-label text-md-right">كلمة السر الجديدة</label>

                        </div>
                      
                        <div class="form-group row">
                      
                            <div class="form-group  row mx-5">
                                <div class="col-md-4 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                       تأكيد
                                    </button>
                                </div>
                            </div>
                        </div>          
                      
                    </div>
            </div>
        
@endsection
<script>

var v= "{{ session('msg') }}";
  if(v.length > 1 ){
    alert(v);
  }
  
    </script>