@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Especialidad: {{$consultorio->nombre}}</h1>
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
                                    <label for="">Nombre:</label>
                                    <p>{{$consultorio->nombre}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Ubicacion:</label>
                                    <p>{{$consultorio->ubicacion}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Capacidad:</label>
                                    <p>{{$consultorio->capacidad}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Telefono:</label>
                                    <p>{{$consultorio->telefono}}</p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Especialidad:</label>
                                    <p>{{$consultorio->especialidad}}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Numero Celular:</label>
                                    <p>
                                        @if($consultorio->estado=='ACTIVO')
                                            ACTIVO
                                        @else
                                            INACTIVO
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <a href="{{url('admin/consultorio')}}" class="btn btn-danger">Cancelar</a>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
@endsection