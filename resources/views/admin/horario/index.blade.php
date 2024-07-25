@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Listado de horarios</h1>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Horarios registrados:</h3>
                <div class="card-tools">
                    <a href="{{url('/admin/horario/create')}}" class="btn btn-primary">Registrar nuevo horario:</a>
                </div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                    <thead style="background-color: #c0c0c0;">
                        <tr>
                            <th style="text-align: center;">Numero</th>
                            <th style="text-align: center;">Nombre Doctor</th>
                            <th style="text-align: center;">Apellido Doctor</th>
                            <th style="text-align: center;">Especialidad</th>
                            <th style="text-align: center;">Consultorio</th>
                            <th style="text-align: center;">Día</th>
                            <th style="text-align: center;">Hora de Inicio</th>
                            <th style="text-align: center;">Hora Fin</th>
                            <th style="text-align: center;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $contador = 1;
                        ?>
                        @foreach($horarios as $horario)
                        <tr>
                            <td style="text-align: center;">{{$contador++}}</td>
                            <td>{{$horario->doctor->nombres}}</td>
                            <td>{{$horario->doctor->apellidos}}</td>
                            <td>{{$horario->doctor->especialidad}}</td>
                            <td>{{$horario->consultorio->nombre." - ".$horario->consultorio->ubicacion}}</td>

                            <td>{{$horario->dia}}</td>
                            <td>{{$horario->hora_inicio}}</td>
                            <td>{{$horario->hora_fin}}</td>
                            <td style="text-align: center;">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{url('/admin/horario/'.$horario->id)}}" type="button" class="btn btn-info btn-sm">Ver</a>
                                    <a href="{{url('/admin/horario/'.$horario->id.'/confirm-delete')}}" type="button" class="btn btn-danger btn-sm">Borrar</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <script>
                    $(function() {
                        $("#example1").DataTable({
                            "pageLength": 10,
                            "language": {
                                "emptyTable": "No hay información",
                                "info": "Mostrando _START_ a _END_ de _TOTAL_ Horarios",
                                "infoEmpty": "Mostrando 0 a 0 de 0 Horarios",
                                "infoFiltered": "(Filtrado de _MAX_ total Horarios)",
                                "infoPostFix": "",
                                "thousands": ",",
                                "lengthMenu": "Mostrar _MENU_ Horarios",
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
                            "responsive": true,
                            "lengthChange": true,
                            "autoWidth": false,
                            buttons: [{
                                    extend: 'collection',
                                    text: 'Reportes',
                                    orientation: 'landscape',
                                    buttons: [{
                                        text: 'Copiar',
                                        extend: 'copy',
                                    }, {
                                        extend: 'pdf'
                                    }, {
                                        extend: 'csv'
                                    }, {
                                        extend: 'excel'
                                    }, {
                                        text: 'Imprimir',
                                        extend: 'print'
                                    }]
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
<br>
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Horarios registrados:</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form group">
                        <label for="">Consultores:</label>
                        <select name="consultorio_id" id="consultorio_select" class="form-control">
                            <option value="">Seleccione un consultorio:</option>
                            @foreach($consultorios as $consultorio)
                            <option value="{{$consultorio->id}}">{{$consultorio->nombre." - ".$consultorio->ubicacion}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <script>
                    $('#consultorio_select').on('change', function() {
                        var consultorio_id = $('#consultorio_select').val();
                        var ruta = "{{route('admin.horario.cargarConsultorios',':id')}}";
                        ruta = ruta.replace(':id', consultorio_id);
                        if (consultorio_id) {
                            $.ajax({
                                url: ruta,
                                type: 'GET',
                                success: function(data) {
                                    $('#consultorio_info').html(data);
                                },
                                error: function() {
                                    alert('Error al obtener los datos del consultorio')
                                }
                            });
                        } else {
                            $('#consultorio_info').html('');
                        }
                    });
                </script>
                <hr>
                <div id="consultorio_info">
                </div>

            </div>
        </div>
    </div>
</div>

</div>
@endsection