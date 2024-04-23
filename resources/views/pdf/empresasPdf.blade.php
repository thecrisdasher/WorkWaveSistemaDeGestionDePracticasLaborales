<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Ofertas</title>
    <link rel="stylesheet" href="{{ public_path('dist/css/adminlte.min.css') }}">
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
                <h3 class="text-center">Reporte de Empresas</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th>nombre</th>
                                <th>Razon Social</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($empresas as $empresa)
                                <tr>
                                    <td class="v-align-middle">{{ $empresa->nombre }}</td>
                                    <td class="v-align-middle">{{ $empresa->razon_social }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
</body>

</html>
