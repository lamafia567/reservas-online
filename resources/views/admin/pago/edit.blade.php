@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Pago de: {{$pago->paciente->apellidos." ".$pago->paciente->nombres}}</h1>
    <hr>
</div>
<br>
<div class="col-md-12">
    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title">Formulario de registro de pago</h3>
        </div>
        <div class="card-body">
            <form action="{{url('admin/pago',$pago->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Paciente:</label>
                                    <select name="paciente_id" id="" class="form-control">
                                        @foreach($pacientes as $paciente)
                                        <option value="{{$paciente->id}}" {{$paciente->id == $pago->paciente_id ? 'selected':''}}>{{$paciente->nombres." ".$paciente->apellido}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Doctor:</label>
                                    <select name="doctor_id" id="" class="form-control">
                                        @foreach($doctores as $doctor)
                                        <option value="{{$doctor->id}}" {{$doctor->id == $pago->doctor_id ? 'selected':''}}>{{$doctor->apellidos." ".$doctor->nombres." ".$doctor->especialidad}}</option>
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
                                    <input type="text" name="monto" value="{{$pago->monto}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Fecha de pago:</label>
                                    <input type="date" value="{{$pago->fecha_pago}}" name="fecha_pago" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Descripcion:</label>
                                    <input type="text" name="descripcion" value="{{$pago->descripcion}}" class="form-control">
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
                            <button type="submit" class="btn btn-success">Actualizar Pago</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection