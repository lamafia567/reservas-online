<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <table style="font-size: 8pt;">
        <tr>
            <td style="text-align: center;">
                {{$configuracion->nombre}}
                {{$configuracion->direccion}}
                {{$configuracion->fono}}
                {{$configuracion->correo}}
            </td>
            <td width="500px"></td>
            <td>
                <img src="{{url('storage/'.$configuracion->logo)}}" alt="logo" width="50px">
            </td>
        </tr>
    </table>
    <h4 style="text-align: center;"><u>COMPROBANTE DE PAGO - ORIGINAL</u></h4>
    <br>
    <table cellpadding="5px" cellspacing="5px">
        <tr>
            <td>
                <p><b>Nombre:</b></p>
            </td>
            <td>{{$pago->paciente->apellidos." ".$pago->paciente->nombres}}</td>
            <td width="150px" rowspan="4"></td>
            <td rowspan="4">
                <div>
                    <img src="data:image/png;base64,{{ $qrCodeBase64 }}" alt="Codigo QR" width="150px">
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <p><b>Fecha Pago:</b></p>
            </td>
        <tr>
            <p>{{$pago->fecha_pago}}</p>
        </tr>
        </tr>
        <tr>
            <td>
                <p><b>Consultorio/Especialidad:</b></p>
            </td>
        <tr>
            <p>{{$pago->doctor->especialidad}}</p>
        </tr>
        </tr>
        <td>
            <p><b>Monto:</b></p>
        </td>
        <tr>
            <p>{{$pago->monto}}</p>
        </tr>
        </tr>
    </table>
    <table>
        <tr>
            <td width="210px" style="text-align:center">
                <p>
                    ___________________________ <br>
                <p>Secretaria</p>
                <p>{{Auth::user()->secretaria->apellidos." ".Auth::user()->secretaria->nombres}}</p>
                </p>
            </td>
            <td width="210px">
            </td>
            <td width="210px" style="text-align:center">
                <p>
                    ___________________________<br>
                <p>Paciente {{$pago->paciente->apellidos}}</p>
                <p>Recibir Conforme</p>
                </p>
            </td>
        </tr>
    </table>
    <p>-------------------------------------------------------------------------------------------------------------------------------------</p>
    <table style="font-size: 8pt;">
        <tr>
            <td style="text-align: center;">
                {{$configuracion->nombre}}<br>
                {{$configuracion->direccion}}<br>
                {{$configuracion->fono}}<br>
                {{$configuracion->correo}}<br>
            </td>
            <td width="500px"></td>
            <td>
                <img src="{{url('storage/'.$configuracion->logo)}}" alt="logo" width="50px">
            </td>
        </tr>
    </table>
    <h4 style="text-align: center;"><u>COMPROBANTE DE PAGO - COPIA</u></h4>
    <br>
    <table cellpadding="5px" cellspacing="5px">
        <tr>
            <td>
                <p><b>Nombre:</b></p>
            </td>
            <td>{{$pago->paciente->apellidos." ".$pago->paciente->nombres}}</td>
            <td width="150px" rowspan="4"></td>
            <td rowspan="4">
                <div>
                    <img src="data:image/png;base64,{{ $qrCodeBase64 }}" alt="Codigo QR" width="150px">
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <p><b>Fecha Pago:</b></p>
            </td>
        <tr>
            <p>{{$pago->fecha_pago}}</p>
        </tr>
        </tr>
        <tr>
            <td>
                <p><b>Consultorio/Especialidad:</b></p>
            </td>
        <tr>
            <p>{{$pago->doctor->especialidad}}</p>
        </tr>
        </tr>
        <td>
            <p><b>Monto:</b></p>
        </td>
        <tr>
            <p>{{$pago->monto}}</p>
        </tr>
        </tr>
    </table>
    <table>
        <tr>
            <td width="210px" style="text-align:center">
                <p>
                    ___________________________ <br>
                <p>Secretaria</p>
                <p>{{Auth::user()->secretaria->apellidos." ".Auth::user()->secretaria->nombres}}</p>
                </p>
            </td>
            <td width="210px">
            </td>
            <td width="210px" style="text-align:center">
                <p>
                    ___________________________<br>
                <p>Paciente {{$pago->paciente->apellidos}}</p></p>
                <p>Recibir Conforme</p>
                </p>
            </td>
        </tr>
    </table>
</body>

</html>