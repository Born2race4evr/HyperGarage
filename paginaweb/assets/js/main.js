document.addEventListener('DOMContentLoaded', () => {

    const buscador = document.getElementById('buscador');
    const contenedor = document.getElementById('contenedor-coches');

    // Cargar todos los coches al entrar (para que no salga vacío al inicio)
    buscarCoches('');

    if (buscador) {
        buscador.addEventListener('input', (e) => {
            const texto = e.target.value;
            buscarCoches(texto);
        });
    }

    function buscarCoches(texto) {
        // Asegúrate de que esta ruta es correcta desde index.php
        const url = `api/coches_search.php?q=${texto}`;

        fetch(url)
            .then(respuesta => {
                if (!respuesta.ok) {
                    throw new Error(`Error de red: ${respuesta.status}`);
                }
                return respuesta.text(); // Recibimos texto primero para depurar
            })
            .then(textoRespuesta => {
                try {
                    const coches = JSON.parse(textoRespuesta); // Intentamos convertir a JSON
                    renderizarCoches(coches);
                } catch (e) {
                    console.error("El servidor devolvió algo que no es JSON:", textoRespuesta);
                    // Si hay error de PHP, a veces devuelve HTML, esto nos ayuda a verlo
                }
            })
            .catch(error => console.error('Error FETCH:', error));
    }

    function renderizarCoches(coches) {
        contenedor.innerHTML = '';

        if (coches.length === 0) {
            contenedor.innerHTML = '<div class="col-12 text-center text-secondary mt-5"><h3>No se encontraron coincidencias.</h3></div>';
            return;
        }

        coches.forEach(coche => {
            // Formatear precio de forma segura
            let precio = "0";
            if (coche.precio) {
                precio = new Intl.NumberFormat('es-ES').format(coche.precio);
            }

            // Comprobación de imagen
            let imagen = coche.foto ? `assets/img/${coche.foto}` : 'assets/img/default.jpg';

            const html = `
            <div class="col-md-4 col-sm-6 fade-in">
                <div class="card card-car h-100">
                    <div class="card-img-wrapper">
                        <img src="${imagen}" 
                             class="card-img-top" 
                             alt="${coche.modelo}"
                             onerror="this.src='assets/img/default.jpg'">
                    </div>
                    <div class="price-tag">${precio} €</div>
                    
                    <div class="card-body">
                        <small class="text-danger fw-bold text-uppercase">${coche.marca}</small>
                        <h4 class="card-title text-white mt-1 mb-3">${coche.modelo}</h4>
                        <p class="card-text text-secondary small">
                            ${coche.descripcion ? coche.descripcion.substring(0, 70) : ''}...
                        </p>
                    </div>
                </div>
            </div>
            `;

            contenedor.innerHTML += html;
        });
    }
});