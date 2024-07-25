@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Actualizacion de: {{$doctor->nombres." ".$doctor->apellidos}}</h1>
        <hr>
    </div>
    <div class="col-md-12">
        <div class="card card-outline card-success">
            <div class="card-header">
                <h3 class="card-title">Formulario de registro de doctores</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/doctor/'.$doctor->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                    <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Nombres:</label>
                                    <input type="text" value="{{$doctor->nombres}}" name="nombres" class="form-control" required>
                                    @error('nombres')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Apellidos:</label>
                                    <input type="text" value="{{$doctor->apellidos}}"  name="apellidos" class="form-control" required>
                                    @error('apellidos')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Run:</label>
                                    <input type="text" value="{{$doctor->run}}" name="run" class="form-control" required> 
                                    @error('run')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Telefono:</label>
                                    <input type="text" value="{{$doctor->fono}}" name="fono" class="form-control" required>
                                    @error('fono')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Licencia Medica:</label>
                                    <input type="text" value="{{$doctor->licencia_medica}}" name="licencia_medica" class="form-control" required>
                                    @error('licencia_medica')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Especialidad:</label>
                                    <input type="text" value="{{$doctor->especialidad}}" name="especialidad" class="form-control" required>
                                    @error('especialidad')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Correo Electronico:</label>
                                    <input type="email" value="{{$doctor->user->email}}" name="email" class="form-control" required>
                                    @error('email')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                        <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Contraseña</label>
                                    <input type="password" name="password" class="form-control"> 
                                    @error('password')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Verificacion de la contraseña</label>
                                    <input type="password" name="password_confirmation" class="form-control">
                                    @error('password_confirmation')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <a href="{{url('admin/doctor')}}" class="btn btn-danger">Cancelar</a>
                                    <button type="submit" class="btn btn-success">Actualizar doctor</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection