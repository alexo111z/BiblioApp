<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">
    <title>Imprimir Reporte</title>
</head>

<body>
    <div class="row col-xs-12 " style="border-bottom: 1px solid #eee; margin-bottom:10px; padding-bottom:10px;">
        <h1 style="margin-top: 0;">Reporte de prestamos de Administrativos</h1>
    </div>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th style="padding:3px;">Préstamos</th>
                <th style="padding:3px;">No. de Nomina</th>
                <th style="padding:3px;">Nombre</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lista as $prestamo)
            <tr>
                <td style="padding:3px;">*</td>
                <td style="padding:3px;">{{$prestamo->Prestamos}}</td>
                <td style="padding:3px;">{{$prestamo->Nomina}}</td>
                <td style="padding:3px;">{{$prestamo->Nombre}} {{$prestamo->Apellidos}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pull-right">
        <h5>{{count($lista)}} Prestamos totales</h5>
    </div>
</body>
<script src="{{asset('js/app.js')}}"></script>
<script>
 $(document).ready(function () {
    window.print();
 });
</script>

</html>
