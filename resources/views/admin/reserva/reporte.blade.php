@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Reportes de reservas.</h1>
</div>
<hr>
<div class="row">
    <div class="col-md-4">
        <div class="card card-outline card-info">
            <div class="card-header">
                <div class="card-title">Generar Reporte</div>
            </div>
            <div class="card-body">
                <a href="{{url('/admin/reserva/pdf')}}" class="btn btn-success">
                    <i class="bi bi-printer">Listado de todas las reservas.</i></a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="card card-outline card-info">
            <div class="card-header">
                <div class="card-title">Generar Reporte por fechas</div>
            </div>
            <div class="card-body">
                <form action="{{route('admin.reserva.pdf_fecha')}}" method="GET">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Fecha Inicio:</label>
                            <input type="date" name="fecha_inicio" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="">Fecha Fin:</label>
                            <input type="date" name="fecha_fin" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <div style="height: 8px;"></div>
                            <button class="btn btn-info">Generar reporte</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection