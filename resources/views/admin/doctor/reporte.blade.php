@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Reportes de doctores.</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-4">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <div class="card-title">Generar Reporte</div>
                </div>
                <div class="card-body">
                    <a href="{{url('/admin/doctor/pdf')}}" class="btn btn-success"><i class="bi bi-printer">    Listado de personal medico.</i></a>
                </div>
            </div>
        </div>
    </div>
@endsection