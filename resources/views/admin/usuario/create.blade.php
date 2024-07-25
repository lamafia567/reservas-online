@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Registro de usuario</h1>
        <hr>
    </div>
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Formulario de registro de usuario</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/usuario/create')}}" method="POST">
                        @csrf
                    <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Nombre del usuario</label><b>*</b>
                                    <input type="text" value="{{old('name')}}" name="name" class="form-control" required>
                                    @error('name')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Email del usuario</label><b>*</b>
                                    <input type="email" value="{{old('email')}}"  name="email" class="form-control" required>
                                    @error('email')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br> 
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Contraseña</label><b>*</b>
                                    <input type="password" name="password" class="form-control" required> 
                                    @error('password')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
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
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('/admin/usuario')}}" class="btn btn-danger">Cancelar</a>
                                    <button type="submit" class="btn btn-primary">Registrar usuario</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection