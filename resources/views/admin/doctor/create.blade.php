@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Registro de doctores</h1>
        <hr>
    </div>
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Formulario de registro de doctores</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/doctor/create')}}" method="POST">
                        @csrf
                    <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Nombres:</label><b>*</b>
                                    <input type="text" value="{{old('nombres')}}" name="nombres" class="form-control" required>
                                    @error('nombres')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Apellidos:</label><b>*</b>
                                    <input type="text" value="{{old('apellidos')}}"  name="apellidos" class="form-control" required>
                                    @error('apellidos')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Run:</label><b>*</b>
                                    <input type="text" value="{{old('run')}}" name="run" class="form-control" required> 
                                    @error('run')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Telefono:</label><b>*</b>
                                    <input type="text" value="{{old('fono')}}" name="fono" class="form-control" required>
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
                                    <label for="">Licencia Medica:</label><b>*</b>
                                    <input type="text" value="{{old('licencia_medica')}}" name="licencia_medica" class="form-control" required>
                                    @error('licencia_medica')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Especialidad:</label><b>*</b>
                                    <input type="text" value="{{old('especialidad')}}" name="especialidad" class="form-control" required>
                                    @error('especialidad')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Correo Electronico:</label><b>*</b>
                                    <input type="email" value="{{old('email')}}" name="email" class="form-control" required>
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
                                    <label for="">Contraseña</label><b>*</b>
                                    <input type="password" name="password" class="form-control" required> 
                                    @error('password')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Verificacion de la contraseña</label><b>*</b>
                                    <input type="password" name="password_confirmation" class="form-control" required>
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
                                    <button type="submit" class="btn btn-primary">Registrar doctor</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection