@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Eliminar Configuracion</h1>
    <hr>
</div>
<br>
<div class="col-md-12">
    <div class="card card-outline card-danger">
        <div class="card-header">
            <h3 class="card-title">Formulario de borrado de configuracion</h3>
        </div>
        <div class="card-body">
            <form action="{{url('admin/configuracion',$configuracion->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Nombre de la clinica:</label><b>*</b>
                                    <input type="text" value="{{$configuracion->nombre}}" name="nombre" class="form-control" disabled>
                                    @error('nombre')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Direccion:</label><b>*</b>
                                    <input type="address" value="{{$configuracion->direccion}}" name="direccion" class="form-control" disabled>
                                    @error('direccion')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Telefono:</label><b>*</b>
                                    <input type="text" value="{{$configuracion->fono}}" name="fono" class="form-control" disabled>
                                    @error('fono')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Correo Electronico:</label><b>*</b>
                                    <input type="email" value="{{$configuracion->correo}}" name="correo" class="form-control" disabled>
                                    @error('correo')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="col-md-4">
                        <!--Imagen-->
                        <div class="form-group">
                            <label for="">Logotipo</label>
                            {{--Visualizar la Imagen--}}
                            <center>
                                <output id="list">
                                    <img src="{{url('storage/'.$configuracion->logo)}}" alt="logo" width="250px">
                                </output>
                            </center>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form group">
                            <a href="{{url('admin/configuracion')}}" class="btn btn-danger">Cancelar</a>
                            <button type="submit" class="btn btn-danger">Eliminar configuracion</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection