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
    <h2 style="text-align: center;"><u>Listado de todas las Reservas</u></h2>

    <br>
    <p>Reporte desde: {{$fecha_inicio}} | Hasta: {{$fecha_fin}}</p>
    <table class="table table-bordered table-sm table-stripped ">
        <thead>
            <tr style="background-color:#e7e7e7">
                <th>Nro</th>
                <th>Profesional</th>
                <th>Especialidad</th>
                <th>Fecha de reserva</th>
                <th>Hora de reserva</th>|
            </tr>
        </thead>
        <tbody>
            <?php $contador = 1; ?>
            @foreach($eventos as $evento)
            <tr>
                <td>{{$contador++}}</td>
                <td>{{$evento->doctor->nombres." ".$evento->doctor->apellidos}}</td>
                <td>{{$evento->doctor->especialidad}}</td>
                <td>{{\Carbon\Carbon::parse($evento->start)->format('Y-m-d')}}</td>
                <td>{{\Carbon\Carbon::parse($evento->start)->format('H:i')}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>