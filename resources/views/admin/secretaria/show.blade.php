@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Registro de {{$secretaria->nombres}} {{$secretaria->apellidos}}</h1>
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
                                <p>{{$secretaria->nombres}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Apellidos:</label>
                                <p>{{$secretaria->apellidos}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Run:</label>
                                <p>{{$secretaria->run}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Telefono celular:</label>
                                <p>{{$secretaria->fono}}</p>
                            </div>
                        </div>
                    </div>
                        <br>
                    <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Fecha de nacimiento:</label>
                                    <p>{{$secretaria->fecha_nacimiento}}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Dirección:</label>
                                    <p>{{$secretaria->direccion}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                            <div class="form group">
                                <label for="">Email:</label>
                                <p>{{$secretaria->user->email}}</p>
                            </div>
                        </div>
                    </div>
                            <br>
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('/admin/secretaria')}}" class="btn btn-danger">Cancelar</a>
                                </div>
                            </div>
                </form>
            </div>
        </div>
    </div>
@endsection