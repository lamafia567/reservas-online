@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Registro de {{$doctor->nombres." ".$doctor->apellidos}}</h1>
        <hr>
    </div>
    <div class="col-md-12">
        <div class="card card-outline card-danger">
            <div class="card-header">
                <h3 class="card-title">¿Esta seguro de eliminar estos registros?</h3>
                </div>
                <div class="card-body">
                <form action="{{url('admin/doctor',$doctor->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                    <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Nombres:</label>
                                    <p>{{$doctor->nombres}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Apellidos:</label>
                                    <p>{{$doctor->apellidos}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Run:</label>
                                    <p>{{$doctor->run}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Telefono:</label>
                                    <p>{{$doctor->fono}}</p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Licencia Medica:</label>
                                    <p>{{$doctor->licencia_medica}}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Especialidad:</label>
                                    <p>{{$doctor->especialidad}}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Correo Electronico:</label>
                                    <p>{{$doctor->user->email}}</p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <a href="{{url('admin/doctor')}}" class="btn btn-danger">Volver</a>
                                    <button type="submit" class="btn btn-danger">Eliminar a {{$doctor->nombres}}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection