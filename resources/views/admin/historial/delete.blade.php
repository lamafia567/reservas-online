@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Borrar historial</h1>
    <hr>
</div>
<br>
<div class="col-md-12">
    <div class="card card-outline card-danger">
        <div class="card-header">
            <h3 class="card-title">¿Esta seguro de eliminar este registro?</h3>
        </div>
        <div class="card-body">
            <form action="{{url('admin/historial',$historial->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Paciente:</label><b>*</b>
                                    <select name="paciente_id" id="" class="form-control" disabled>
                                        @foreach($pacientes as $paciente)
                                        <option value="{{$paciente->id}}" {{$historial->paciente_id == $paciente->id ? 'selected':''}}>{{$paciente->nombres." ".$paciente->apellido}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Fecha de la cita:</label><b>*</b>
                                    <input name="fecha_visita" type="date" value="{{$historial->fecha_visita}}" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Detalles</label>
                                    <p>{!! $historial->detalles !!}</p>
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
                            <a href="{{url('admin/historial')}}" class="btn btn-danger">Cancelar</a>
                            <button type="submit" class="btn btn-danger">Borrar Historial</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection