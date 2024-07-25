@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Registro de Horarios</h1>
        <hr>
    </div>
    <div class="col-md-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Datos registrados</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/horario/create')}}" method="POST">
                        @csrf
                    <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Doctor:</label>
                                        <p>{{$horario->doctor->nombres." ".$horario->doctor->apellidos}}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Consultorio y Ubicacion:</label>
                                        <p>{{$horario->consultorio->nombre." - ".$horario->consultorio->ubicacion}}</p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Dia:</label>
                                    <p>{{$horario->dia}}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Hora Inicio:</label>
                                    <p>{{$horario->hora_inicio}}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Hora Fin:</label>
                                    <p>{{$horario->hora_fin}}</p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <a href="{{url('admin/horario')}}" class="btn btn-danger">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection