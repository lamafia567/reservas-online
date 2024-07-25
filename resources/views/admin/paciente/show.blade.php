@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Paciente {{$paciente->nombres}} {{$paciente->apellidos}}</h1>
        <hr>
    </div>
    <div class="col-md-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Datos:</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Nombres:</label>
                                    <p>{{$paciente->nombres}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Apellidos:</label>
                                    <p>{{$paciente->apellidos}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Run:</label>
                                    <p>{{$paciente->run}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Fecha de nacimiento</label>
                                    <p>{{$paciente->fecha_nacimiento}}</p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Genero:</label>
                                    <p>
                                        @if($paciente->genero=='M')
                                            MASCULINO
                                        @else
                                            FEMENINO
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Numero Celular:</label>
                                    <p>{{$paciente->fono}}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Correo Electronico:</label>
                                    <p>{{$paciente->email}}</p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form group">
                                    <label for="">Direccion:</label>
                                    <p>{{$paciente->direccion}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Estado Civil:</label>
                                    <p>{{$paciente->estado_civil}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Observaciones:</label>
                                    <p>
                                        @if($paciente->observaciones!=null)
                                            {{$paciente->observaciones}}
                                        @else
                                            No hay observaciones
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <a href="{{url('admin/paciente')}}" class="btn btn-danger">Cancelar</a>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
@endsection