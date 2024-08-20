<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ public_path('css/app.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
<h2>Usuarios CallCenter.</h2>

<table class="table table-striped">
        <thead>
            <tr>
                <th>Extensión</th>
                <th>Nombres</th>
                <th>Usuario</th>
                <th>Pass</th>
                <th>Servicio</th>
                <th>Accesso</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($callcenters as $callcenter)
            <tr>
                <td>{{ $callcenter->extension }}</td>
                <td>{{ $callcenter->nombres }}</td>   
                <td>{{ $callcenter->usuario }}</td>   
                <td>{{ $callcenter->contrasena }}</td>                        
                <td>{{ $callcenter->servicio }}</td>   
                <td>{{ $callcenter->acceso }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>