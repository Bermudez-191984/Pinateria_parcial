
@extends('layouts.appregister')

@section('tittle','Register')

@section('content')

<div class="register-box">
    <div class="card card-outline card-danger border-danger "  style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(255, 0, 0, 0.5)), url('{{ asset('images/tu-imagen.jpg') }}'); background-size: cover; background-position: center;"  >
      <div class="card-header text-center text-light  border-danger">
         <!-- Aquí agregamos la imagen -->
         <img src="{{ asset('logoimage.jpg') }}" alt="Imagen de inicio de sesión" class="img-fluid mx-auto d-block" style="max-width: 200px;">
        <p class="login-box-msg h1">REGISTRARSE</p>
      </div>
      <div class="card-body bg-secondary">
        <p class="login-box-msg">REGISTRARSE</p>
  
        <form method="POST" action="{{ route('register') }}">
            @csrf
        
         <div class="input-group mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end ">{{ __('Name') }}</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror border border-primary" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div class="input-group-append border border-primary">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>

          
          <div class="input-group mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror border border-primary" name="email" value="{{ old('email') }}" required autocomplete="email">
           
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            
            <div class="input-group-append border border-primary">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>



          <div class="input-group mb-3">
            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label> 
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror border border-primary" name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="input-group-append border border-primary">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              

        </div>
    </div>



          <div class="input-group mb-4  ">
            <label for="password-confirm" class=" mt-1 pb-2 mb-1 d-flex     text-md-end">{{ __('Confirm Password') }}</label>
            <input id="password-confirm" type="password" class="form-control border border-primary" name="password_confirmation" required autocomplete="new-password">
            
            <div class="input-group-append border border-primary">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          
            <!-- /.col -->
            <div class="d-grid gap-2 col-6 mx-auto">
                <button type="submit" class="btn btn-danger btn-block text-center">Registrarse</button>  
             </div>

          
            <!-- /.col -->
          </div>
        </form>
  
       
      
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->
  
@endsection


