@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Configuraciones</h1>
    <hr>
</div>
<br>
<div class="col-md-12">
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">Formulario de configuracion</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form group">
                                <label for="">Nombre de la clinica:</label><b>*</b>
                                <p>{{$configuracion->nombre}}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form group">
                                <label for="">Direccion:</label><b>*</b>
                                <p>{{$configuracion->direccion}}</p>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form group">
                                <label for="">Telefono:</label><b>*</b>
                                <p>{{$configuracion->fono}}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form group">
                                <label for="">Correo Electronico:</label><b>*</b>
                                <p>{{$configuracion->correo}}</p>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Logotipo</label>
                        <center>
                            <td>
                                <img src="{{url('storage/'.$configuracion->logo)}}" alt="logo" width="250px">
                            </td>
                        </center>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <div class="form group">
                        <a href="{{url('admin/configuracion')}}" class="btn btn-danger">Cancelar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection