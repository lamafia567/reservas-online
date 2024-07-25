@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Actualizacion de Especialidad</h1>
        <hr>
    </div>
    <div class="col-md-12">
        <div class="card card-outline card-success">
            <div class="card-header">
                <h3 class="card-title">Formulario de actualizacion de especialidad</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/consultorio',$consultorio->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                    <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Nombre:</label>
                                    <input type="text" value="{{$consultorio->nombre}}" name="nombre" class="form-control" required>
                                    @error('nombre')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Ubicacion:</label>
                                    <input type="text" value="{{$consultorio->ubicacion}}"  name="ubicacion" class="form-control" required>
                                    @error('ubicacion')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Capacidad:</label>
                                    <input type="text" value="{{$consultorio->capacidad}}" name="capacidad" class="form-control" required> 
                                    @error('capacidad')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Telefono:</label>
                                    <input type="fono" value="{{$consultorio->telefono}}" name="telefono" class="form-control" required>
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
                                    <label for="">Especialidad:</label>
                                    <input type="text" value="{{$consultorio->especialidad}}" name="especialidad" class="form-control" required>
                                    @error('especialidad')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Estado:</label>
                                    <select name="estado" id="" class="form-control">
                                        @if($consultorio->estado=='ACTIVO')
                                            <option value="ACTIVO">ACTIVO</option>
                                            <option value="INACTIVO">INACTIVO</option>
                                        @else
                                            <option value="INACTIVO">INACTIVO</option>
                                            <option value="ACTIVO">ACTIVO</option>
                                        @endif
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
                                    <button type="submit" class="btn btn-success">Actualizar consultorio</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection