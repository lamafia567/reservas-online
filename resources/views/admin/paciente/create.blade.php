@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Registro de paciente</h1>
        <hr>
    </div>
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Formulario de registro de paciente</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/paciente/create')}}" method="POST">
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
                                    <input type="text" value="{{old('run')}}" name="run" class="form-control" required> 
                                    @error('run')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Fecha de nacimiento</label><b>*</b>
                                    <input type="date" value="{{old('fecha_nacimiento')}}" name="fecha_nacimiento" class="form-control" required>
                                    @error('fecha_nacimiento')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Genero:</label><b>*</b>
                                    <select name="genero" id="" class="form-control">
                                        <option value="M">MASCULINO</option>
                                        <option value="F">FEMENINO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Numero Celular:</label><b>*</b>
                                    <input type="number" value="{{old('fono')}}" name="fono" class="form-control" required>
                                    @error('fono')
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
                            <div class="col-md-9">
                                <div class="form group">
                                    <label for="">Direccion:</label><b>*</b>
                                    <input type="address" value="{{old('direccion')}}" name="direccion" class="form-control" required>
                                    @error('direccion')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Estado Civil:</label><b>*</b>
                                    <input type="text" value="{{old('estado_civil')}}" name="estado_civil" class="form-control" required>
                                    @error('estado_civil')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Observaciones:</label>
                                    <input type="text" value="{{old('observaciones')}}" name="observaciones" class="form-control" required>
                                    @error('observaciones')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <a href="{{url('admin/paciente')}}" class="btn btn-danger">Cancelar</a>
                                    <button type="submit" class="btn btn-primary">Registrar paciente</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection