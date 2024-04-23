<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Usuarios</title>
    <link rel="stylesheet" href="{{public_path('dist/css/adminlte.min.css')}}">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <img src="{{ public_path('img/apple-icon.png') }}" alt="" width='60px'>
            </div>
            <div class="col-md-12 col-xs-12">
                <h4 class="text-center">Institución Universitaria Antonio Jose</h4>
            </div>
            <div class="row">
                <h3 class="text-center">Reporte de Productos</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th>Nombre De Usuario</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Email</th>
                                <th>Ciudad</th>
                                <th>Postal</th>
                                <th>Sobre</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $use)
                                <tr>
                                    <td class="v-align-middle">{{ $use->username }}</td>
                                    <td class="v-align-middle">{{ $use->firstname }}</td>
                                    <td class="v-align-middle">{{ $use->lastname }}</td>
                                    <td class="v-align-middle">{{ $use->email }}</td>
                                    <td class="v-align-middle">{{ $use->city }}</td>
                                    <td class="v-align-middle">{{ $use->postal }}</td>
                                    <td class="v-align-middle">{{ $use->about }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
</body>

</html>
