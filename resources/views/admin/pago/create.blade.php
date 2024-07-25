@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Registro de un nuevo pago</h1>
    <hr>
</div>
<br>
<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Formulario de registro de pagos</h3>
        </div>
        <div class="card-body">
            <form action="{{url('admin/pago/create')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Paciente:</label>
                                    <select name="paciente_id" id="" class="form-control">
                                        @foreach($pacientes as $paciente)
                                        <option value="{{$paciente->id}}">{{$paciente->apellidos." ".$paciente->nombres}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Doctor:</label>
                                    <select name="doctor_id" id="" class="form-control">
                                        @foreach($doctores as $doctor)
                                        <option value="{{$doctor->id}}">{{$doctor->apellidos." ".$doctor->nombres." ".$doctor->especialidad}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Monto:</label>
                                    <input type="text" name="monto" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Fecha de pago:</label>
                                    <input type="date" value="<?php echo date('Y-m-d') ?>" name="fecha_pago" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Descripcion:</label>
                                    <input type="text" name="descripcion" class="form-control">
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
                            <a href="{{url('admin/pago')}}" class="btn btn-danger">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Registrar Pago</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection