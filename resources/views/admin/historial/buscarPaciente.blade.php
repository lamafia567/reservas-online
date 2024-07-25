@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Busqueda de pacientes</h1>
    <hr>
</div>
<br>
<div class="col-md-12">
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">Buscar paciente:</h3>
        </div>
        <div class="card-body">
            <form action="{{url('/admin/historial/buscarPaciente')}}" method="GET">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Run:</label>
                            <input type="text" name="run" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <div style="height: 32px;"></div>
                            <button type="submit" class="btn btn-primary">Buscar:</button>
                        </div>
                    </div>
                </div>
            </form>
            <hr>
            @if($paciente)
            <h3>Informacion del paciente</h3>
            <table>
                <tr>
                    <td><b>Run:</b></td>
                    <td>{{$paciente->run}}</td>
                </tr>
                <tr>
                    <td><b>Paciente:</b></td>
                    <td>{{$paciente->apellidos." ".$paciente->nombres}}</td>
                </tr>
                <tr>
                    <td><b>Fecha de nacimiento:</b></td>
                    <td>{{$paciente->fecha_nacimiento}}</td>
                </tr>
                <tr>
                    <td><b>Telefono Contacto:</b></td>
                    <td>{{$paciente->fono}}</td>
                </tr>
                <tr>
                    <td><b>Correo Electronico:</b></td>
                    <td>{{$paciente->email}}</td>
                </tr>
                <tr>
                    <td><b>Direccion:</b></td>
                    <td>{{$paciente->direccion}}</td>
                </tr>
            </table>
            <a href="{{url('/admin/historial/paciente',$paciente->id)}}" class="btn btn-warning">Imprimir Historial</a>
            @else
            <p>Paciente no encontrado</p>
            @endif
        </div>
    </div>
</div>
@endsection