<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <style>

        body {
            margin: 0;
            font-family: system-ui,-apple-system,"Segoe UI",Roboto,"Helvetica Neue","Noto Sans","Liberation Sans",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            background-color: #fff;
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: transparent;
        }
        h5{
            line-height:0.5;
        }
        
    </style>

</head>
<body>
<img src="{{URL::asset('Imagenes/Logo_TelPri_1.png')}}" alt="LogoTelPri Web" width="200" class="py-2">
    <h2>Lineas.</h2>
    <h5>{{$fecha}}</h5>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Linea</th>
                <th>Mac/Campo/Li3</th>
                <th>Inventario</th>
                <th>Serial</th>
                <th>Plataforma</th>
                <th>Titular</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lineas as $linea)
            <tr>
                <td>{{ $linea->linea }}</td>
                <td>{{ $linea->mac }}</td>
                <td>{{ $linea->inventario }}</td>
                <td>{{ $linea->serial }}</td>
                <td>{{ $linea->plataforma }}</td>   
                <td>{{ $linea->titular }}</td>
                <td>{{ $linea->estado }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>