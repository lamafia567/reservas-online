@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Registro de un nuevo historial</h1>
    <hr>
</div>
<br>
<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Formulario de registro de configuracion</h3>
        </div>
        <div class="card-body">
            <form action="{{url('admin/historial/create')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Paciente:</label><b>*</b>
                                    <select name="paciente_id" id="" class="form-control">
                                        @foreach($pacientes as $paciente)
                                        <option value="{{$paciente->id}}">{{$paciente->nombres." ".$paciente->apellido}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Fecha de la cita:</label><b>*</b>
                                    <input name="fecha_visita" type="date" value="<?php echo date('Y-m-d') ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Detalles</label>
                                    <textarea name="detalle" class="form-control" id="editor" cols="30" rows="10" style="width: 100%; "></textarea>
                                    <script type="importmap">
                                        {
                                            "imports": {
                                                "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/42.0.1/ckeditor5.js",
                                                "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/42.0.1/"
                                            }
                                        }
                                    </script>
                                    <script type="module">
                                        import {
                                            ClassicEditor,
                                            Essentials,
                                            Bold,
                                            Italic,
                                            Font,
                                            Paragraph
                                        } from 'ckeditor5';

                                        ClassicEditor
                                            .create(document.querySelector('#editor'), {
                                                plugins: [Essentials, Bold, Italic, Font, Paragraph],
                                                toolbar: {
                                                    items: [
                                                        'undo', 'redo', '|', 'bold', 'italic', '|',
                                                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                                                    ]
                                                }
                                            })
                                            .then( /* ... */ )
                                            .catch( /* ... */ );
                                    </script>

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
                            <button type="submit" class="btn btn-primary">Registrar Historial</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection