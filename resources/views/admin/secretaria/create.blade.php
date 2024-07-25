@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Registro de secretarias</h1>
        <hr>
    </div>
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Formulario de registro de secretarias</h3>
            </div>
            <div class="card-body">
                    <form action="{{url('/admin/secretaria/create')}}" method="POST">
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
                                <input type="apellidos" value="{{old('apellidos')}}"  name="apellidos" class="form-control" required>
                                @error('apellidos')
                                <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Run:</label><b>*</b>
                                <input type="run" name="run" class="form-control" required> 
                                @error('run')
                                <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Telefono celular:</label><b>*</b>
                                <input type="text" name="fono" class="form-control" required>
                                @error('fono')
                                <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                        <br>
                    <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Fecha de nacimiento:</label><b>*</b>
                                    <input type="date" name="fecha_nacimiento" class="form-control" required>
                                    @error('fecha_nacimiento')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form group">
                                    <label for="">Dirección:</label><b>*</b>
                                    <input type="address" name="direccion" class="form-control" required>
                                    @error('direccion')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                    </div>
                    <br>
                    <div class="row">
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Email:</label><b>*</b>
                                    <input type="email" name="email" class="form-control" required>
                                    @error('email')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Contraseña</label><b>*</b>
                                    <input type="password" name="password" class="form-control" required> 
                                    @error('password')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Verificacion de la contraseña</label><b>*</b>
                                    <input type="password" name="password_confirmation" class="form-control" required>
                                    @error('password_confirmation')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                            <br>
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('/admin/secretaria')}}" class="btn btn-danger">Cancelar</a>
                                    <button type="submit" class="btn btn-primary">Registrar secretaria</button>
                                </div>
                            </div>
                </form>
            </div>
        </div>
    </div>
@endsection