@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Modificar paciente: {{$paciente->nombres." ".$paciente->apellidos}}
        </h1>
        <hr>
    </div>
    <div class="col-md-12">
        <div class="card card-outline card-success">
            <div class="card-header">
                <h3 class="card-title">Actualizar paciente</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/paciente',$paciente->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                    <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Nombres:</label><b>*</b>
                                    <input type="text" value="{{$paciente->nombres}}" name="nombres" class="form-control" required>
                                    @error('nombres')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Apellidos:</label><b>*</b>
                                    <input type="apellidos" value="{{$paciente->apellidos}}"  name="apellidos" class="form-control" required>
                                    @error('apellidos')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Run:</label><b>*</b>
                                    <input type="text" value="{{$paciente->run}}" name="run" class="form-control" required> 
                                    @error('run')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Fecha de nacimiento</label><b>*</b>
                                    <input type="date" value="{{$paciente->fecha_nacimiento}}" name="fecha_nacimiento" class="form-control" required>
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
                                        @if($paciente->genero=='M')
                                            <option value="M">MASCULINO</option>
                                            <option value="F">FEMENINO</option>
                                        @else
                                            <option value="F">FEMENINO</option>
                                            <option value="M">MASCULINO</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Numero Celular:</label><b>*</b>
                                    <input type="text" value="{{$paciente->fono}}" name="fono" class="form-control" required>
                                    @error('fono')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Correo Electronico:</label><b>*</b>
                                    <input type="email" value="{{$paciente->email}}" name="email" class="form-control" required>
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
                                    <input type="address" value="{{$paciente->direccion}}" name="direccion" class="form-control" required>
                                    @error('direccion')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Estado Civil:</label><b>*</b>
                                    <input type="text" value="{{$paciente->estado_civil}}" name="estado_civil" class="form-control" required>
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
                                    <input type="text" value="{{$paciente->observaciones}}" name="observaciones" class="form-control" required>
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
                                    <button type="submit" class="btn btn-success">Modificar paciente</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection