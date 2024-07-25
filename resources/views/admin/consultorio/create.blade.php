@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Registro de Especialidades</h1>
        <hr>
    </div>
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Formulario de registro de Especialidades</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/consultorio/create')}}" method="POST">
                        @csrf
                    <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Nombre:</label><b>*</b>
                                    <input type="text" value="{{old('nombre')}}" name="nombre" class="form-control" required>
                                    @error('nombre')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Ubicacion:</label><b>*</b>
                                    <input type="text" value="{{old('ubicacion')}}"  name="ubicacion" class="form-control" required>
                                    @error('ubicacion')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Capacidad:</label><b>*</b>
                                    <input type="text" value="{{old('capacidad')}}" name="capacidad" class="form-control" required> 
                                    @error('capacidad')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Telefono:</label><b>*</b>
                                    <input type="fono" value="{{old('telefono')}}" name="telefono" class="form-control" required>
                                    @error('telefono')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Especialidad:</label><b>*</b>
                                    <input type="text" value="{{old('especialidad')}}" name="especialidad" class="form-control" required>
                                    @error('especialidad')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Estado:</label><b>*</b>
                                    <select name="estado" id="" class="form-control">
                                        <option value="ACTIVO">ACTIVO</option>
                                        <option value="INACTIVO">INACTIVO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <a href="{{url('admin/consultorio')}}" class="btn btn-danger">Cancelar</a>
                                    <button type="submit" class="btn btn-primary">Registrar consultorio</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection