@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Registro del pago</h1>
    <hr>
</div>
<br>
<div class="col-md-12">
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">Registro de pago</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Paciente:</label>
                                <p>{{$pago->paciente->apellidos." ".$pago->paciente->nombres}}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Doctor:</label>
                                <p>{{$pago->doctor->apellidos." ".$pago->doctor->nombres." - ".$pago->doctor->especialidad}}</p>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Monto:</label>
                                <p>{{$pago->monto}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Fecha de pago:</label>
                                <p>{{$pago->fecha_pago}}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Descripcion:</label>
                                <p>{{$pago->descripcion}}</p>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <div class="form group">
                        <a href="{{url('admin/pago')}}" class="btn btn-info">Cancelar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection