@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Eliminar Especialidad: {{$consultorio->nombre}}</h1>
        <hr>
    </div>
    <div class="col-md-12">
        <div class="card card-outline card-danger">
            <div class="card-header">
                <h3 class="card-title">¿Esta seguro de elminar estos registros?</h3>
                </div>
                <div class="card-body">
                <form action="{{url('admin/consultorio',$consultorio->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
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
                                    <button type="submit" class="btn btn-danger">Eliminar a {{$consultorio->nombre}}</button>
                                </div>
                            </div>
                        </div>
                </form>
                </div>
            </div>
        </div>
@endsection