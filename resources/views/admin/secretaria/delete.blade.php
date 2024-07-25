@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Eliminar secretaria: {{$secretaria->nombres}} {{$secretaria->apellidos}}</h1>
        <hr>
    </div>
    <div class="col-md-12">
        <div class="card card-outline card-danger">
            <div class="card-header">
                <h3 class="card-title">¿Esta seguro de eliminar los registros?</h3>
            </div>
            <div class="card-body">
                    <form action="{{url('/admin/secretaria',$secretaria->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Nombres:</label>
                                <input type="text" value="{{$secretaria->nombres}}" name="nombres" class="form-control" disabled>
                                @error('nombres')
                                <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Apellidos:</label>
                                <input type="apellidos" value="{{$secretaria->apellidos}}"  name="apellidos" class="form-control" disabled>
                                @error('apellidos')
                                <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Run:</label>
                                <input type="run" name="run" value="{{$secretaria->run}}" class="form-control" disabled> 
                                @error('run')
                                <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Telefono celular:</label>
                                <input type="text" name="fono" value="{{$secretaria->fono}}" class="form-control" disabled>
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
                                    <label for="">Fecha de nacimiento:</label>
                                    <input type="date" value="{{$secretaria->fecha_nacimiento}}" name="fecha_nacimiento" class="form-control" disabled>
                                    @error('fecha_nacimiento')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form group">
                                    <label for="">Dirección:</label>
                                    <input type="address" value="{{$secretaria->direccion}}" name="direccion" class="form-control" disabled>
                                    @error('direccion')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                    </div>
                    <br>
                    <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Email:</label>
                                    <input type="email" value="{{$secretaria->user->email}}" name="email" class="form-control" disabled>
                                    @error('email')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                            <br>
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('/admin/secretaria')}}" class="btn btn-danger">Cancelar</a>
                                    <button type="submit" class="btn btn-danger">Eliminar registro</button>
                                </div>
                            </div>
                </form>
            </div>
        </div>
    </div>
@endsection