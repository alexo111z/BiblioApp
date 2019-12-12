<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Imprimir códigos de barra para ejemplares de libro con ISBN {{ $isbn }}</title>

        <style>
            .barcode-container {
                border: 1px solid black;
                padding: 30px;
                width: 460px;
                text-align: center;
                font-family: Arial, sans-serif;
                margin-left: calc(50% - 230px);
                margin-top: 30px;
            }

            .barcode-container > img {
                width: 460px;
                height: 100px;
            }

            .barcode-container > p {
                font-size: 18px;
            }
        </style>
    </head>
    <body>
        @foreach($barcodeImages as $index => $barcodeImage)
            <div class="barcode-container">
                <img src="data:image/png;base64,{{ $barcodeImage['image'] }}">
                <p><b>Código: </b> {{ $barcodeImage['code'] }}</p>
            </div>
        @endforeach
    </body>
</html>
