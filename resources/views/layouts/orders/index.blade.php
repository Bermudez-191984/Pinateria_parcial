@extends('layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Orden</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Orden</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    @include('layouts.partial.msg')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tabla de Orden</h3>
                            {{-- @can('product.create')--}}
                            <a href="{{ route('order.create') }}" class="btn btn-primary float-right" title="Nuevo"><i
                                    class="fas fa-plus nav-icon"></i></a>
                            {{--@endcan--}}
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="products-table" class="table table-bordered table-hover">

                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>customer firtsname</th>
                                        <th>customer document</th>
                                        <th>Date Order</th>
                                        <th>total</th>
                                        <th>estado</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)

                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td>{{$order->firstname}}</td>
                                        <td>{{$order->document}}</td>
                                        <td>{{$order->dateorder}}</td>
                                        <td>{{$order->total}}</td>
                                        <td>
                                            <input data-id="{{$order->id}}" class="toggle-class" type="checkbox"
                                                data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                                data-on="Activo" data-off="Inactivo"
                                                {{ $order->status ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <a href="{{ route('order.show', $order) }}" class="btn btn-primary btn-sm"
                                                title="View bill">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <form class="d-inline delete-form"
                                                action="{{ route('order.destroy',$order)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class=" btn btn-danger btn-sm" title="Delete">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>

                @endsection

                @push('scripts')
                <script>
                $(document).ready(function() {
                    $("products-table").DataTable()
                });
                $(function() {
                    $('.toggle-class').change(function() {
                        var status = $(this).prop('checked') == true ? 1 : 0;
                        var order_id = $(this).data('id');
                        $.ajax({
                            type: "GET",
                            dataType: "json",
                            url: 'cambioestadoorder',
                            data: {
                                'status': status,
                                'order_id': order_id
                            },
                            success: function(data) {
                                console.log(data.success)
                            }
                        });
                    })
                })
                </script>
                <script>
                $('.delete-form').submit(function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Estas seguro?',
                        text: "Este registro se eliminara definitivamente",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Aceptar',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.submit();
                        }
                    })
                });
                </script>
                @if(session('eliminar') == 'ok')
                <script>
                Swal.fire(
                    'Eliminado',
                    'El registro ha sido eliminado exitosamente',
                    'success'
                )
                </script>
                @endif
                <script type="text/javascript">
                $(function() {
                    $("#products-table").DataTable({
                        "responsive": true,
                        "lengthChange": true,
                        "autoWidth": false,
                        //"buttons": ["excel", "pdf", "print", "colvis"],
                        "language": {
                            "sLengthMenu": "Mostrar _MENU_ entradas",
                            "sEmptyTable": "No hay datos disponibles en la tabla",
                            "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                            "sInfoEmpty": "Mostrando 0 a 0 de 0 entradas",
                            "sSearch": "Buscar:",
                            "sZeroRecords": "No se encontraron registros coincidentes en la tabla",
                            "sInfoFiltered": "(Filtrado de _MAX_ entradas totales)",
                            "oPaginate": {
                                "sFirst": "Primero",
                                "sPrevious": "Anterior",
                                "sNext": "Siguiente",
                                "sLast": "Ultimo"
                            },
                            /*"buttons": {
                                "print": "Imprimir",
                                "colvis": "Visibilidad Columnas"
                                /*"create": "Nuevo",
                                "edit": "Cambiar",
                                "remove": "Borrar",
                                "copy": "Copiar",
                                "csv": "fichero CSV",
                                "excel": "tabla Excel",
                                "pdf": "documento PDF",
                                "collection": "Colección",
                                "upload": "Seleccione fichero...."
                            }*/
                        }
                    }); //.buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                });
                </script>
                @endpush