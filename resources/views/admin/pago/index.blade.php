@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Listado de pagos</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Pagos Registrados</h3>
                        <div class="card-tools">
                            <a href="{{url('/admin/pago/create')}}" class="btn btn-primary">Registrar un nuevo pago</a>
                        </div>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                            <thead style="background-color: #c0c0c0;">
                                <tr>
                                <th style="text-align: center;">Numero</th>
                                <th style="text-align: center;">Paciente:</th>
                                <th style="text-align: center;">Doctor</th>
                                <th style="text-align: center;">Fecha de pago:</th>
                                <th style="text-align: center;">Monto:</th>
                                <th style="text-align: center;">Descripcion:</th>
                                <th style="text-align: center;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $contador = 1;

                                ?>
                                @foreach($pagos as $pago)
                                    <tr>
                                        <td style="text-align: center;">{{$contador++}}</td>
                                        <td>{{$pago->paciente->apellidos." ".$pago->paciente->nombres}}</td>
                                        <td>{{$pago->doctor->apellidos." ".$pago->doctor->nombres}}</td>
                                        <td>{{$pago->fecha_pago}}</td>
                                        <td>{{$pago->monto}}</td>
                                        <td>{{$pago->descripcion}}</td>
                                        <td style="text-align: center;">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{url('/admin/pago/'.$pago->id)}}" type="button" class="btn btn-info btn-sm">Ver</a>
                                                <a href="{{url('/admin/pago/'.$pago->id.'/edit')}}" type="button" class="btn btn-success btn-sm">Editar</a>
                                                <a href="{{url('/admin/pago/'.$pago->id.'/confirm-delete')}}" type="button" class="btn btn-danger btn-sm">Borrar</a>
                                                <a href="{{url('/admin/pago/pdf/'.$pago->id)}}" type="button" class="btn btn-warning btn-sm">Imprimir Comprobante</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach   
                            </tbody>
                        </table>
                        <hr>
                        <p><h4>Resumen total de monto de pagos: {{$total_monto}}</h4></p>
                        <script>
                        $(function () {
                            $("#example1").DataTable({
                                "pageLength": 10,
                                "language": {
                                    "emptyTable": "No hay información",
                                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Pagos",
                                    "infoEmpty": "Mostrando 0 a 0 de 0 Pagos",
                                    "infoFiltered": "(Filtrado de _MAX_ total Pagos)",
                                    "infoPostFix": "",
                                    "thousands": ",",
                                    "lengthMenu": "Mostrar _MENU_ Pagos",
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