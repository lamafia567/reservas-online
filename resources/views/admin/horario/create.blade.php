@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Registro de Horarios</h1>
    <hr>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Formulario de registro de Horarios</h3>
            </div>
            <div class="card-body row">
                <div class="col-md-3">
                    <form action="{{url('admin/horario/create')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Consultores:</label><b>*</b>
                                    <select name="consultorio_id" id="consultorio_select" class="form-control">
                                        <option value="">Seleccione un Consultorio:</option>
                                        @foreach($consultorios as $consultorio)
                                        <option value="{{$consultorio->id}}">{{$consultorio->nombre." - ".$consultorio->ubicacion}}</option>
                                        @endforeach
                                    </select>
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
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Doctores:</label><b>*</b>
                                    <select name="doctor_id" id="" class="form-control">
                                        @foreach($doctores as $doctor)
                                        <option value="{{$doctor->id}}">{{$doctor->nombres." ".$doctor->apellidos." - ".$doctor->especialidad}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Dia:</label><b>*</b>
                                    <select name="dia" id="" class="form-control">
                                        <option value="LUNES">Lunes</option>
                                        <option value="MARTES">Martes</option>
                                        <option value="MIERCOLES">Miercoles</option>
                                        <option value="JUEVES">Jueves</option>
                                        <option value="VIERNES">Viernes</option>
                                        <option value="SABADO">Sábado</option>
                                        <option value="DOMINGO">Domingo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Hora Inicio:</label><b>*</b>
                                    <input type="time" value="{{old('hora_inicio')}}" name="hora_inicio" class="form-control" required>
                                    @error('hora_inicio')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Hora Fin:</label><b>*</b>
                                    <input type="time" value="{{old('hora_fin')}}" name="hora_fin" class="form-control" required>
                                    @error('hora_fin')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/horario')}}" class="btn btn-danger">Cancelar</a>
                                    <button type="submit" class="btn btn-primary">Registrar horario</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-9">
                    <div id="consultorio_info">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection