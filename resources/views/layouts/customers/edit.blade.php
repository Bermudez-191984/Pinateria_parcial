@extends('layouts.app')

@section('title','Editar Cliente')

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
                        <form method="POST" action="{{ route('customer.update',$customer) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">FirstName <strong
                                                    style="color:red;">(*)</strong></label>
                                            <input type="text" class="form-control" name="firstname"
                                                placeholder=" Nombre del cliente " autocomplete="off"
                                                value="{{ $customer->firstname }}">

                                            <label class="control-label">SecondName <strong
                                                    style="color:red;">(*)</strong></label>
                                            <input type="text" class="form-control" name="secondname"
                                                placeholder=" Segundo Nombre del cliente " autocomplete="off"
                                                value="{{ $customer->secondname }}">

                                            <label class="control-label">LastName <strong
                                                    style="color:red;">(*)</strong></label>
                                            <input type="text" class="form-control" name="lastname"
                                                placeholder=" Apellido del cliente " autocomplete="off"
                                                value="{{ $customer->lastname }}">

                                            <label class="control-label">SecondLastName <strong
                                                    style="color:red;">(*)</strong></label>
                                            <input type="text" class="form-control" name="secondlastname"
                                                placeholder=" Segundo Apellido del cliente " autocomplete="off"
                                                value="{{ $customer->secondlastname }}">


                                            <label class="control-label">Age <strong
                                                    style="color:red;">(*)</strong></label>
                                            <input type="text" class="form-control" name="age" placeholder=" Edad "
                                                autocomplete="off" value="{{ $customer->age }}">
                                            <label class="control-label">Email <strong
                                                    style="color:red;">(*)</strong></label>
                                            <input type="text" class="form-control" name="email" placeholder=" email "
                                                autocomplete="off" value="{{ $customer->email }}">

                                            <!-- <label class="control-label">Img <strong
                                                    style="color:red;"></strong></label>
                                            <div> @if($customer->image!=null)
                                                <p><img class="img-responsive img-thumbnail"
                                                        src="{{ asset('uploads/customers/'.$customer->image) }}"
                                                        style="height: 70px; width: 70px;" alt=""></p>
                                                @elseif ($customer->image==null)
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                                        <div class="form-group label-floating">
                                                            <input type="file" class="form-control-file" name="image"
                                                                id="image">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div> -->
                                        </div>
                                    </div>
                                    <input type="hidden" class="form-control" name="registradopor"
                                        value="{{ Auth::user()->id }}">
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-2 col-xs-4">
                                            <button type="submit"
                                                class="btn btn-primary btn-block btn-flat">Registrar</button>
                                        </div>
                                        <div class="col-lg-2 col-xs-4">
                                            <a href="{{ route('customer.index') }}"
                                                class="btn btn-danger btn-block btn-flat">Atras</a>
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