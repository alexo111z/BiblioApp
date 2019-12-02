<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">
    <title>Imprimir Reporte</title>
</head>

<body>
    <div class="row col-xs-12 ">
        <h1 style="margin-top: 0;" class="page-header">Reporte de Multas</h1>
    </div>
    <table class="table table-hover table-striped" style="margin-top: 1.5rem;">
            <thead>
                <tr>
                    <th style="padding:3px;">Folio</th>
                    <th style="padding:3px;">No. Control/Nomina</th>
                    <th style="padding:3px;">Nombre</th>
                    <th style="padding:3px;">Tipo</th>
                    <th style="padding:3px;">Fecha de prestamo</th>
                    <th style="padding:3px;">Fecha de pago</th>
                    <th style="padding:3px;">Monto</th>
                    <th style="padding:3px;">Comentarios</th>
                </tr>
            </thead>
        <tbody>
            @foreach ($multas as $registro)
            <tr>
                <td style="padding:3px;">{{$registro->Folio}}</td>
                <td style="padding:3px;">{{$registro->NoControl}}</td>
                <td style="padding:3px;">{{$registro->Nombre}} {{$registro->Apellidos}}</td>
                <td style="padding:3px;">{{$registro->Tipo}}</td>
                <td style="padding:3px;">{{$registro->FechaInicio}}</td>
                <td style="padding:3px;">{{$registro->FechaPago}}</td>
                <td style="padding:3px;">{{$registro->Monto}}.00</td>
                <td style="padding:3px;">{{$registro->Comentarios}}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="7">&nbsp;</td>
                <td class="pull-right"><h4>Total:${{$total}}</h4></td>
            </tr>
        </tbody>
    </table>
    <div class="pull-right">
        <h5>{{count($multas)}} Multas totales</h5>
    </div>
</body>
<script src="{{asset('js/app.js')}}"></script>
<script>
 $(document).ready(function () {
    window.print();
 });
</script>

</html>
