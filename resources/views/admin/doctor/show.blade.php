@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Registro de {{$doctor->nombres." ".$doctor->apellidos}}</h1>
        <hr>
    </div>
    <div class="col-md-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Formulario de registro de doctores</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Nombres:</label><b>*</b>
                                    <p>{{$doctor->nombres}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Apellidos:</label><b>*</b>
                                    <p>{{$doctor->apellidos}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Run:</label><b>*</b>
                                    <p>{{$doctor->run}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Telefono:</label><b>*</b>
                                    <p>{{$doctor->fono}}</p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Licencia Medica:</label><b>*</b>
                                    <p>{{$doctor->licencia_medica}}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Especialidad:</label><b>*</b>
                                    <p>{{$doctor->especialidad}}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Correo Electronico:</label><b>*</b>
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
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection