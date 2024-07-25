@extends('layouts.admin')
@section('content')
<div class="row">
    <h1><b>Bienvenido:</b> {{Auth::user()->name}}</h1>
</div>
<hr>
<div class="row">
    @can('admin.usuario.index')
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$total_usuarios}}</h3>
                <p>Usuarios</p>
            </div>
            <div class="icon">
                <i class="ion bi bi-file-earmark-person"></i>
            </div>
            <a href="{{url('admin/usuario')}}" class="small-box-footer">Mas Información</a>
        </div>
    </div>
    @endcan
    @can('admin.secretaria.index')
    <div class="col-lg-3 col-6">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{$total_secretarias}}</h3>
                <p>Secretarias</p>
            </div>
            <div class="icon">
                <i class="ion bi bi-tv"></i>
            </div>
            <a href="{{url('admin/secretaria')}}" class="small-box-footer">Mas Información</a>
        </div>
    </div>
    @endcan
    @can('admin.paciente.index')
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{$total_pacientes}}</h3>
                <p>Pacientes</p>
            </div>
            <div class="icon">
                <i class="ion bi bi-person-arms-up"></i>
            </div>
            <a href="{{url('admin/paciente')}}" class="small-box-footer">Mas Información</a>
        </div>
    </div>
    @endcan
    @can('admin.consultorio.index')
    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{$total_consultorios}}</h3>
                <p>Especialidades</p>
            </div>
            <div class="icon">
                <i class="ion bi bi-building-add"></i>
            </div>
            <a href="{{url('admin/consultorio')}}" class="small-box-footer">Mas Información</a>
        </div>
    </div>
    @endcan
    @can('admin.doctor.index')
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{$total_doctores}}</h3>
                <p>Doctores</p>
            </div>
            <div class="icon">
                <i class="ion bi bi-person-add"></i>
            </div>
            <a href="{{url('admin/doctor')}}" class="small-box-footer">Mas Información</a>
        </div>
    </div>
    @endcan
    @can('admin.horario.index')
    <div class="col-lg-3 col-6">
        <div class="small-box bg-secondary">
            <div class="inner">
                <h3>{{$total_horarios}}</h3>
                <p>Horarios</p>
            </div>
            <div class="icon">
                <i class="ion bi bi-calendar-range"></i>
            </div>
            <a href="{{url('admin/doctor')}}" class="small-box-footer">Mas Información</a>
        </div>
    </div>
    @endcan
    @can('admin.horario.index')
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$total_eventos}}</h3>
                <p>Reservas</p>
            </div>
            <div class="icon">
                <i class="ion bi bi-calendar-check"></i>
            </div>
            <a href="" class="small-box-footer"><i class="bi bi-calendar-fill"></i></a>
        </div>
    </div>
    @endcan
    @can('admin.configuracion.index')
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$total_configuraciones}}</h3>
                <p>Configuraciones</p>
            </div>
            <div class="icon">
                <i class="ion bi bi-gear-fill"></i>
            </div>
            <a href="{{url('admin/configuracion')}}" class="small-box-footer">Mas Informacion</a>
        </div>
    </div>
    @endcan
</div>
@can('verReservas')
<a href="{{url('/admin/verReservas')}}" class="btn btn-success">Ver las reservas</a>
@endcan
<br><br>
@can('cargarDatosConsultorios')
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <div class="row">
                    <h3 class="card-title"><b>Calendario de reserva de citas:</b></h3>
                </div>
                <br>
                <div class="form group">
                    <label for="">Especialidades:</label>
                    <select name="consultorio_id" id="consultorio_select" class="form-control">
                        <option value="">Seleccione una especialidad:</option>
                        @foreach($consultorios as $consultorio)
                        <option value="{{$consultorio->id}}">{{$consultorio->nombre." - ".$consultorio->ubicacion}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="card-body">
                <script>
                    $('#consultorio_select').on('change', function() {
                        var consultorio_id = $('#consultorio_select').val();
                        if (consultorio_id) {
                            $.ajax({
                                url: "{{url('/consultorio')}}" + "/" + consultorio_id,
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
                <div id="consultorio_info">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-warning">
            <div class="card-header">
                <div class="form group">
                    <label for="">Doctores:</label>
                    <select name="doctor_id" id="doctor_select" class="form-control">
                        <option value="">Seleccione un doctor:</option>
                        @foreach($doctores as $doctor)
                        <option value="{{$doctor->id}}">{{$doctor->nombres." ".$doctor->apellidos." - ".$doctor->especialidad}}</option>
                        @endforeach
                        <script>
                            $('#doctor_select').on('change', function() {
                                var doctor_id = $('#doctor_select').val();
                                var calendarEl = document.getElementById('calendar');
                                var calendar = new FullCalendar.Calendar(calendarEl, {
                                    initialView: 'dayGridMonth',
                                    locale: 'es',
                                    events: [],
                                });

                                if (doctor_id) {
                                    $.ajax({
                                        url: "{{url('/cargarReservaDoctores')}}" + "/" + doctor_id,
                                        type: 'GET',
                                        dataType: 'json',
                                        success: function(data) {
                                            calendar.addEventSource(data);
                                        },
                                        error: function() {
                                            alert('Error al obtener los datos del consultorio')
                                        }
                                    });
                                } else {
                                    $('#consultorio_info').html('');
                                }
                                calendar.render();
                            });
                        </script>
                    </select>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Registrar cita medica:
                    </button>
                    <!-- Modal -->
                    <form action="{{url('/admin/evento/create')}}" method="post">
                        @csrf
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Reserva de horario</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Doctor</label>
                                                    <select name="doctor_id" id="" class="form-control">
                                                        @foreach($doctores as $doctor)
                                                        <option value="{{$doctor->id}}">{{$doctor->nombres." ".$doctor->apellidos." - ".$doctor->especialidad}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Fecha de reserva:</label>
                                                    <input name="fecha_reserva" type="date" id="fecha_reserva" value="<?php echo date('Y-m-d') ?>" class="form-control">
                                                    <script>
                                                        document.addEventListener('DOMContentLoaded', function() {
                                                            const fechaReservaInput = document.getElementById('fecha_reserva');
                                                            fechaReservaInput.addEventListener('change', function() {
                                                                let selectedDate = this.value;
                                                                let today = new Date().toISOString().slice(0, 10);
                                                                if (selectedDate < today) {
                                                                    this.value = null;
                                                                    alert('No se puede reservar en una fecha pasada.');
                                                                }
                                                            });
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Hora de reserva:</label>
                                                    <input name="hora_reserva" id="hora_reserva" type="time" class="form-control">
                                                    @error('hora_reserva')
                                                    <small style="color:red">{{$message}}</small>
                                                    @enderror
                                                    @if(($message = Session::get('hora_reserva')))
                                                    <script>
                                                        document.addEventListener('DOMContentLoaded', function() {
                                                            $('#exampleModal').modal('show');
                                                        });
                                                    </script>
                                                    <small style="color:red">{{$message}}</small>
                                                    @endif
                                                    <script>
                                                        document.addEventListener('DOMContentLoaded', function() {
                                                            const horaReservaInput = document.getElementById('hora_reserva');
                                                            horaReservaInput.addEventListener('change', function() {
                                                                let seletedTime = this.value;
                                                                if (seletedTime) {
                                                                    seletedTime = seletedTime.split(':');
                                                                    seletedTime = seletedTime[0] + ':00';
                                                                    this.value = seletedTime;
                                                                }
                                                                if (seletedTime < '08:00' || seletedTime > '20:00') {
                                                                    this.value = null;
                                                                    alert('Porfavor ingrese un horario entre las 08:00 de la mañana y 20:00 de la tarde');
                                                                };
                                                            });
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Guardar cita</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div id='calendar'></div>
            </div>
        </div>
    </div>
</div>
@endcan

@if(Auth::check() && Auth::user()->doctor)
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <div class="row">
                    <h3 class="card-title"><b>Calendario de reservas:</b></h3>
                </div>
                <br>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                    <thead style="background-color: #c0c0c0;">
                        <tr>
                            <th style="text-align: center;">Numero</th>
                            <th style="text-align: center;">Usuario</th>
                            <th style="text-align: center;">Fecha de la reserva</th>
                            <th style="text-align: center;">Hora de la reserva</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $contador = 1;
                        ?>
                        @foreach($eventos as $evento)
                        @if(Auth::user()->doctor->id == $evento->doctor_id)
                        <tr>
                            <td style="text-align: center;">{{$contador++}}</td>
                            <td style="text-align: center;">{{$evento->user->name}}</td>
                            <td style="text-align: center;">{{\Carbon\Carbon::parse($evento->start)->format('Y-m-d')}}</td>
                            <td style="text-align: center;">{{\Carbon\Carbon::parse($evento->start)->format('H:i')}}</td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
                <script>
                    $(function() {
                        $("#example1").DataTable({
                            "pageLength": 10,
                            "language": {
                                "emptyTable": "No hay información",
                                "info": "Mostrando _START_ a _END_ de _TOTAL_ Reservas",
                                "infoEmpty": "Mostrando 0 a 0 de 0 Reservas",
                                "infoFiltered": "(Filtrado de _MAX_ total Reservas)",
                                "infoPostFix": "",
                                "thousands": ",",
                                "lengthMenu": "Mostrar _MENU_ Reservas",
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
@endif

@endsection