@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Configuraciones</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Configuraciones Registradas</h3>
                        <div class="card-tools">
                            <a href="{{url('/admin/configuracion/create')}}" class="btn btn-primary">Registrar nueva Configuracion</a>
                        </div>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                            <thead style="background-color: #c0c0c0;">
                                <tr>
                                <th style="text-align: center;">Numero</th>
                                <th style="text-align: center;">Nombre de la clinica:</th>
                                <th style="text-align: center;">Direccion</th>
                                <th style="text-align: center;">Telefono</th>
                                <th style="text-align: center;">Correo</th>
                                <th style="text-align: center;">Logo</th>
                                <th style="text-align: center;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $contador = 1;
                                ?>
                                @foreach($configuraciones as $configuracion)
                                    <tr>
                                        <td style="text-align: center;">{{$contador++}}</td>
                                        <td>{{$configuracion->nombre}}</td>
                                        <td>{{$configuracion->direccion}}</td>
                                        <td>{{$configuracion->fono}}</td>
                                        <td>{{$configuracion->correo}}</td>
                                        <td>
                                            <img src="{{url('storage/'.$configuracion->logo)}}" alt="logo" width="100px">
                                        </td>
                                        <td style="text-align: center;">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{url('/admin/configuracion/'.$configuracion->id)}}" type="button" class="btn btn-info btn-sm">Ver</a>
                                                <a href="{{url('/admin/configuracion/'.$configuracion->id.'/edit')}}" type="button" class="btn btn-success btn-sm">Editar</a>
                                                <a href="{{url('/admin/configuracion/'.$configuracion->id.'/confirm-delete')}}" type="button" class="btn btn-danger btn-sm">Borrar</a>
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
                                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Configuraciones",
                                    "infoEmpty": "Mostrando 0 a 0 de 0 Configuraciones",
                                    "infoFiltered": "(Filtrado de _MAX_ total Configuraciones)",
                                    "infoPostFix": "",
                                    "thousands": ",",
                                    "lengthMenu": "Mostrar _MENU_ Configuraciones",
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