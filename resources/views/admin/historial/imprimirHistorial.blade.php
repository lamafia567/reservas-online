<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <table style="font-size: 10pt;">
        <tr>
            <td style="text-align: center;">
                {{$configuracion->nombre}}<br>
                {{$configuracion->direccion}}<br>
                {{$configuracion->fono}}<br>
                {{$configuracion->correo}}<br>
            </td>
            <td width="500px"></td>
            <td>
            <img src="{{url('storage/'.$configuracion->logo)}}" alt="logo" width="110px">
            </td>
        </tr>
    </table>
    <h2 style="text-align: center;"><u>Historial de {{$paciente->apellidos." ".$paciente->nombres}}</u></h2>

    <br>
    
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
    <hr>
    <h3>Consultas Realizadas:</h3>
    <table>
        @foreach($historiales as $historial)
        <tr>
            <td><b>Fecha:</b></td>
            <td>{{$historial->fecha_visita}}</td>
        </tr>
        <tr>
            <td><b>Detalles:</b></td>
            <td>{!! $historial->detalles !!}</td>
        </tr>
        <hr>
        @endforeach
    </table>
</body>

</html>