@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Historial</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Historiales Registrados</h3>
                        <div class="card-tools">
                            <a href="{{url('/admin/historial/create')}}" class="btn btn-primary">Registrar nuevo</a>
                        </div>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                            <thead style="background-color: #c0c0c0;">
                                <tr>
                                <th style="text-align: center;">Numero</th>
                                <th style="text-align: center;">Paciente:</th>
                                <th style="text-align: center;">Fecha de la cita:</th>
                                <th style="text-align: center;">Detalle:</th>
                                <th style="text-align: center;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $contador = 1;
                                ?>
                                @foreach($historiales as $historial)
                                    @if($historial->doctor_id == Auth::user()->doctor->id)
                                        <tr>
                                            <td style="text-align: center;">{{$contador++}}</td>
                                            <td>{{$historial->paciente->apellidos." ".$historial->paciente->nombres}}</td>
                                            <td>{{$historial->fecha_visita}}</td>
                                            <td>{!! \Illuminate\Support\Str::limit($historial->detalles, 100,"Pulse en 'Ver' para ver completo...") !!}</td>
                                            <td style="text-align: center;">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{url('/admin/historial/'.$historial->id)}}" type="button" class="btn btn-info btn-sm">Ver</a>
                                                    <a href="{{url('/admin/historial/'.$historial->id.'/edit')}}" type="button" class="btn btn-success btn-sm">Editar</a>
                                                    <a href="{{url('/admin/historial/'.$historial->id.'/confirm-delete')}}" type="button" class="btn btn-danger btn-sm">Borrar</a>
                                                    <a href="{{url('/admin/historial/pdf/'.$historial->id)}}" type="button" class="btn btn-warning btn-sm">Imprimir</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach   
                            </tbody>
                        </table>
                        <script>
                        $(function () {
                            $("#example1").DataTable({
                                "pageLength": 10,
                                "language": {
                                    "emptyTable": "No hay información",
                                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Historiales",
                                    "infoEmpty": "Mostrando 0 a 0 de 0 Historiales",
                                    "infoFiltered": "(Filtrado de _MAX_ total Historiales)",
                                    "infoPostFix": "",
                                    "thousands": ",",
                                    "lengthMenu": "Mostrar _MENU_ Historiales",
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