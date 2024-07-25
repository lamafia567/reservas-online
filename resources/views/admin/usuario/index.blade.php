@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Listado de usuarios</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Usuarios del sistema</h3>
                        <div class="card-tools">
                            <a href="{{url('/admin/usuario/create')}}" class="btn btn-primary">Registrar nuevo usuario</a>
                        </div>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                            <thead style="background-color: #c0c0c0;">
                                <tr>
                                <th style="text-align: center;">Numero del usuario</th>
                                <th style="text-align: center;">Nombre del usuario</th>
                                <th style="text-align: center;">Email del usuario</th>
                                <th style="text-align: center;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $contador = 1;
                                ?>
                                @foreach($usuarios as $usuario)
                                    <tr>
                                        <td style="text-align: center;">{{$contador++}}</td>
                                        <td>{{$usuario->name}}</td>
                                        <td>{{$usuario->email}}</td>
                                        <td style="text-align: center;">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{url('/admin/usuario/'.$usuario->id)}}" type="button" class="btn btn-info btn-sm">Ver</a>
                                                <a href="{{url('/admin/usuario/'.$usuario->id.'/edit')}}" type="button" class="btn btn-success btn-sm">Editar</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach   
                            </tbody>
                        </table>
                        <script>
                        $(function () {
                            $("#example1").DataTable({
                                "pageLength": 10,
                                "language": {
                                    "emptyTable": "No hay información",
                                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Usuarios",
                                    "infoEmpty": "Mostrando 0 a 0 de 0 Usuarios",
                                    "infoFiltered": "(Filtrado de _MAX_ total Usuarios)",
                                    "infoPostFix": "",
                                    "thousands": ",",
                                    "lengthMenu": "Mostrar _MENU_ Usuarios",
                                    "loadingRecords": "Cargando...",
                                    "processing": "Procesando...",
                                    "search": "Buscador:",
                                    "zeroRecords": "Sin resultados encontrados",
                                    "paginate": {
                                        "first": "Primero",
                                        "last": "Ultimo",
                                        "next": "Siguiente",
                                        "previous": "Anterior"
                                    }
                                },
                                "responsive": true, "lengthChange": true, "autoWidth": false,
                                buttons: [{
                                    extend: 'collection',
                                    text: 'Reportes',
                                    orientation: 'landscape',
                                    buttons: [{
                                        text: 'Copiar',
                                        extend: 'copy',
                                    }, {
                                        extend: 'pdf'
                                    },{
                                        extend: 'csv'
                                    },{
                                        extend: 'excel'
                                    },{
                                        text: 'Imprimir',
                                        extend: 'print'
                                    }
                                    ]
                                },
                                    {
                                        extend: 'colvis',
                                        text: 'Visor de columnas',
                                        collectionLayout: 'fixed three-column'
                                    }
                                ],
                            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection