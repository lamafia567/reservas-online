@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Historial de: {{$historial->paciente->apellido." ".$historial->paciente->nombres}}</h1>
    <hr>
</div>
<br>
<div class="col-md-12">
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">Formulario de registro de configuracion</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form group">
                                <label for="">Paciente:</label>
                                <p>{{$historial->paciente->apellido." ".$historial->paciente->nombres}}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form group">
                                <label for="">Fecha de la cita:</label>
                                <p>{{$historial->fecha_visita}}</p>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Detalles</label>
                                <p>{!!$historial->detalles!!}</p>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <div class="form group">
                        <a href="{{url('admin/historial')}}" class="btn btn-info">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection