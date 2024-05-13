@extends('layouts.app')

@section('title','Crear Clientes')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
        </div>
    </section>
    @include('layouts.partial.msg')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-secondary">
                            <h3>@yield('title')</h3>
                        </div>
                        <form method="POST" action="{{ route('customer.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">FirstName <strong
                                                    style="color:red;">(*)</strong></label>
                                            <input type="text" class="form-control" name="firstname"
                                                placeholder=" Nombre del cliente " autocomplete="off"
                                                value="{{ old('firstname') }}">

                                            <label class="control-label">SecondName <strong
                                                    style="color:red;">(*)</strong></label>
                                            <input type="text" class="form-control" name="secondname"
                                                placeholder=" Segundo Nombre del cliente " autocomplete="off"
                                                value="{{ old('secondname') }}">

                                            <label class="control-label">LastName <strong
                                                    style="color:red;">(*)</strong></label>
                                            <input type="text" class="form-control" name="lastname"
                                                placeholder=" Apellido del cliente " autocomplete="off"
                                                value="{{ old('lastname') }}">

                                            <label class="control-label">SecondLastName <strong
                                                    style="color:red;">(*)</strong></label>
                                            <input type="text" class="form-control" name="secondlastname"
                                                placeholder=" Segundo Apellido del cliente " autocomplete="off"
                                                value="{{ old('secondlastname') }}">


                                            <label class="control-label">Age <strong
                                                    style="color:red;">(*)</strong></label>
                                            <input type="text" class="form-control" name="age" placeholder=" Edad "
                                                autocomplete="off" value="{{ old('age') }}">
                                            <label class="form-label" for="email">Email</label>
                                            <input type="email" id="email" name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                value="{{ old('email') }}" required placeholder="Email"
                                                autocomplete="email" />
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror




                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-lg-2 col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
                    </div>
                    <div class="col-lg-2 col-xs-4">
                        <a href="{{ route('customer.index') }}" class="btn btn-danger btn-block btn-flat">Atras</a>
                    </div>
                </div>
            </div>
            </form>

        </div>
</div>
</div>
</div>
</section>
</div>
@endsection