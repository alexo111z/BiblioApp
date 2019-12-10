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
        <h1 style="margin-top: 0;">Reporte de Titulos registrados</h1>
    </div>
    <table class="table table-hover table-striped" style="margin-top: 1.5rem;">
            <thead>
                <tr>
                    <th style="padding:3px;">#</th>
                    <th style="padding:3px;">Título</th>
                    <th style="padding:3px;">Autor</th>
                    <th style="padding:3px;">Editorial</th>
                    <th style="padding:3px;">Dewey</th>
                    <th style="padding:3px;">Ed.</th>
                    <th style="padding:3px;">Ej.</th>
                    <th style="padding:3px;">Fecha</th>
                </tr>
            </thead>
        <tbody>
            @foreach ($lista as $registro)
            <tr>
                <td style="padding:3px;">*</td>
                <td style="padding:3px;">{{$registro->Titulo}}</td>
                <td style="padding:3px;">{{$registro->Autor}}</td>
                <td style="padding:3px;">{{$registro->Editorial}}</td>
                <td style="padding:3px;">{{$registro->Dewey}}</td>
                <td style="padding:3px;">{{$registro->Edicion}}</td>
                <td style="padding:3px;">{{$registro->Ejemplares}}</td>
                <td style="padding:3px;">{{$registro->Registro}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pull-right">
        <h5>{{count($lista)}} Titulos totales</h5>
    </div>
</body>
<script src="{{asset('js/app.js')}}"></script>
<script>
 $(document).ready(function () {
    window.print();
 });
</script>

</html>
