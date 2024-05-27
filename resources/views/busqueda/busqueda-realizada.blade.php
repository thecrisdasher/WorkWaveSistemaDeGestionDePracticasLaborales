@extends('pages.busqueda')
@section('busqueda')
    <div class="container-busqueda mt-5 mx-5">
        <div class="row">
            <div class="col-md-6"> <!-- Columna para el primer div -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><strong>Ofertas Encontradas</strong></h4>
                        @foreach ($ofertas as $oferta)
                            <div class="card mt-2" id="oferta_{{ $oferta->id_oferta }}">
                                <div class="card-body">
                                    <h5 class="card-title"><strong>{{ $oferta->nombre_oferta }}</strong></h5>
                                    <h6 class="card-text">{{ $oferta->Empresa->nombre }}</h6>
                                    <p class="card-text">{{ $oferta->Ubicacion->direccion }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <!-- Columna para el segundo div, encima de la primera columna en dispositivos medianos y más grandes -->
                <div class="card mt-md-0">
                    <!-- mt-md-0 para eliminar el margen superior en dispositivos medianos y más grandes -->
                    <div class="card-body">
                        <h4 class="card-title"><strong>Detalles de la oferta</strong></h4>
                        <div class="card mt-md-0">
                            <div class="card-body" id="detalle_oferta">
                                <h4 class="card-title">Detalles de la Oferta</h4>
                                <p class="card-text">Selecciona una oferta para ver más detalles.</p>
                            </div>
                        </div>


                        <!-- Contenido del segundo div -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-busqueda mt-3 mx-5 d-flex just3ify-content">
        <div>

        </div>
        <div>
            {!! $ofertas->links() !!}
        </div>
    </div>
@endsection


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cartasOferta = document.querySelectorAll('[id^="oferta_"]');

        cartasOferta.forEach(cart => {
            cart.addEventListener('click', function() {
                // Remover la clase de todas las cartas
                cartasOferta.forEach(carta => carta.classList.remove('carta-seleccionada'));

                // Agregar la clase a la carta seleccionada
                this.classList.add('carta-seleccionada');

                const ofertaId = this.id.split('_')[1];

                // Realizar solicitud AJAX para verificar el estado de postulación del usuario
                fetch(`/oferta/verificar-postulacion/${ofertaId}`)
                    .then(response => response.json())
                    .then(data => {
                        // Cambiar el texto del botón según el estado de postulación
                        const botonPostularme = document.getElementById('postularme');
                        if (data.postulado) {
                            botonPostularme.textContent = 'Te has postulado con éxito';
                            botonPostularme.disabled =
                            true; // Opcional: deshabilitar el botón después de postularse
                        } else {
                            botonPostularme.textContent = 'Postularme';
                            botonPostularme.disabled = false;
                        }
                    })
                    .catch(error => {
                        console.error('Error al verificar la postulación:', error);
                    });


                // Realizar solicitud AJAX para obtener los detalles de la oferta
                fetch(`/oferta/detalle/${ofertaId}`)
                    .then(response => response.json())
                    .then(data => {
                        // Actualizar el contenido del segundo div con los detalles de la oferta
                        const detalleOferta = document.getElementById('detalle_oferta');
                        detalleOferta.innerHTML = `
                            <h4 class="card-title">${data.nombre_oferta}</h4>
                            <h6 class="card-text">${data.empresa.nombre}</h6>
                            <p class="card-text">${data.ubicacion.direccion}</p>
                            <h6 class="card-text">${data.descripcion}</h6>
                            <!-- Otros detalles de la oferta según la estructura de datos -->
                            <button id="postularme" class="btn btn-success mt-4 ml-3 mb-4">Postularme</button>


                        `;
                        document.getElementById('postularme').addEventListener('click',
                            function() {


                                fetch(`/oferta/postularme/${ofertaId}`)


                                    .then(response => response.json())
                                    .then(data => {
                                        console.log(data)
                                        alert(data
                                        .message); // Mostrar mensaje de éxito
                                    })
                                    .catch(error => {
                                        console.error('Error al postularse:',
                                        error);
                                    });
                            });
                    })
                    .catch(error => {
                        console.error('Error al obtener los detalles de la oferta:', error);
                    });

            });
        });
    });
</script>
