@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-light text-center">
                    <h4>تحديث المعلومات الشخصية</h4> </div>

                <div class="card-body">
                    <form method="POST" action="/update_visitor/{{ $user->id }}">
                        @csrf
                        <div class="form-group row justify-content-end">

                            <div class="col-md-4">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label for="name" class="col-md-3 col-form-label text-md-right">اللقب</label>

                        </div>
                        <div class="form-group row justify-content-end">
                      
                            <div class="col-md-4">
                            <input id="prenom" type="text" class="form-control" name="prenom"  value="{{ $user->prenom }}" required >
                            </div>

                            <label for="prenom" class="col-md-3 col-form-label text-md-right">الاسم</label>

                        </div>
                     
                        <div class="form-group row justify-content-end">

                            <div class="col-md-4">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label for="email" class="col-md-3 col-form-label text-md-right">البريد الالكتروني</label>

                        </div>
                        <div class="form-group row justify-content-end">

                            <div class="col-md-4">
                                <input id="phone_number" type="tel" pattern="[0-9]{10,}" class="form-control" name="phone_number" value="{{ $user->phone_number }}" required >
                            </div>
                            <label for="phone_number" class="col-md-3 col-form-label text-md-right">رقم الهاتف</label>

                        </div>
                     
                    <div class="form-group row justify-content-start mx-5">
                            <button type="submit" class="btn btn-primary">
تأكيد
                            </button>
                        </div>
                    </form>   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
