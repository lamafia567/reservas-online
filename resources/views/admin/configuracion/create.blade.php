@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Configuraciones</h1>
    <hr>
</div>
<br>
<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Formulario de registro de configuracion</h3>
        </div>
        <div class="card-body">
            <form action="{{url('admin/configuracion/create')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Nombre de la clinica:</label><b>*</b>
                                    <input type="text" value="{{old('nombre')}}" name="nombre" class="form-control" required>
                                    @error('nombre')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Direccion:</label><b>*</b>
                                    <input type="address" value="{{old('direccion')}}" name="direccion" class="form-control" required>
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
                                    <input type="text" value="{{old('fono')}}" name="fono" class="form-control" required>
                                    @error('fono')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Correo Electronico:</label><b>*</b>
                                    <input type="email" value="{{old('correo')}}" name="correo" class="form-control" required>
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
                            <input type="file" id="file" name="logo" class="form-control">
                            {{--Visualizar la Imagen--}}
                            <center>
                                <output id="list"></output>
                            </center>
                            <script>
                                function archivo(evt) {
                                    var files = evt.target.files; // FileList object
                                    //Obtenemos la imagen del campo "file".
                                    for (var i = 0, f; f = files[i]; i++) {
                                        //Solo admitimos imágenes.
                                        if (!f.type.match('image.*')) {
                                            continue;
                                        }
                                        var reader = new FileReader();
                                        reader.onload = (function(theFile) {
                                            return function(e) {
                                                // Insertamos la imagen.
                                                document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="', e.target.result, '"width="100%" title="', escape(theFile.name), '"/>'
                                                ].join('');
                                            };
                                        })(f);
                                        reader.readAsDataURL(f);
                                    }
                                }
                                document.getElementById('file').addEventListener('change', archivo, false);
                            </script>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form group">
                            <a href="{{url('admin/configuracion')}}" class="btn btn-danger">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Registrar configuracion</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection