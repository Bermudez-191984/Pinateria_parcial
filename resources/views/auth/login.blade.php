@extends('layouts.applogin')

@section('tittle','Login')

@section('content')

<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-danger border-danger mb-3 " style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(255, 0, 0, 0.5)), url('{{ asset('images/tu-imagen.jpg') }}'); background-size: cover; background-position: center;"  >
      <div class="card-header text-center text-light  border-danger ">
        <!-- Aquí agregamos la imagen -->
        <img src="{{ asset('logoimage.jpg') }}" alt="Imagen de inicio de sesión" class="img-fluid mx-auto d-block" style="max-width: 200px;">
        <p class="login-box-msg h1">Iniciar Sesion</p>
      </div>
      <div class="card-body bg-secondary">
        <p class="login-box-msg">Iniciar sesion</p>
  
        

            <form method="POST" action="{{ route('login') }}">
            @csrf


          <div class="input-group mb-3">
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror border border-primary" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            <div class="input-group-append border border-primary">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror border border-primary" name="password" required autocomplete="current-password">
            <div class="input-group-append border border-primary">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            
            <!-- /.col -->
          <div class="col-6">
            <button type="submit" class="btn btn-danger btn-block">ingresar</button>
          </div>
          
          <div class="col-6">
            <a href="{{route('register')}}" class="btn btn-danger btn-block">Registrar</a>
          </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <p class="mb-1">
                @if (Route::has('password.request'))
                    <a class="btn btn-link text-light" href="{{ route('password.request') }}">
                        {{ __('Olvide mi contraseña') }}
                    </a>
                @endif
                </p>
            </div>
        </div>
     


      </form>

    
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
  @endsection









