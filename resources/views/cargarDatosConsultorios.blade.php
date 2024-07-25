<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3><center>Horario de atencion de {{$consultorio->nombre}}</center></h3>
    <hr>
    <table style="font-size: 16px;" class="table table-striped table-hover table-sm table-bordered">
        <thead>
            <tr style="text-align: center;">
                <th>Hr:</th>
                <th>Lunes:</th>
                <th>Martes:</th>
                <th>Miercoles:</th>
                <th>Jueves:</th>
                <th>Viernes:</th>
                <th>Sabado:</th>
                <th>Domingo:</th>
            </tr>
        </thead>
        <tbody style="text-align: center;">
            @php
            $horas = ['08:00:00 - 09:00:00','09:00:00 - 10:00:00','10:00:00 - 11:00:00','11:00:00 - 12:00:00','12:00:00 - 13:00:00','13:00:00 - 14:00:00','14:00:00 - 15:00:00','15:00:00 - 16:00:00','16:00:00 - 17:00:00','17:00:00 - 18:00:00','18:00:00 - 19:00:00','19:00:00 - 20:00:00'];
            $dias = ['LUNES','MARTES','MIERCOLES','JUEVES','VIERNES','SABADO','DOMINGO'];
            @endphp
            @foreach($horas as $hora)
            @php
            list($hora_inicio,$hora_fin) = explode(' - ',$hora);
            @endphp
            <tr>
                <td>{{$hora}}</td>
                @foreach($dias as $dia)
                @php
                $nombreDoctor = '';
                foreach($horarios as $horario){
                if(strtoupper($horario->dia) == $dia &&
                $hora_inicio >= $horario->hora_inicio &&
                $hora_fin <= $horario->hora_fin ){
                    $nombreDoctor = $horario->doctor->nombres." ".$horario->doctor->apellidos;
                    break;
                    }
                    }
                    @endphp
                    <td>{{$nombreDoctor}}</td>
                    @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>