fetch('http://localhost:8082/public/index.php?recurso=mascotas')
    .then(response => response.json())
    .then(data => {
        console.log(data);

        const contenedor = document.getElementById('contenedor-mascotas');
        const contador = document.getElementById('catalogo-count');

        if (!data.success || !data.data || data.data.length === 0) {
            contenedor.innerHTML = `
                <div class="catalog-empty">
                    <i class="fa-solid fa-paw"></i>
                    <h4>Todavía no hay mascotas cargadas</h4>
                    <p>No se encontraron mascotas disponibles.</p>
                </div>
            `;
            contador.textContent = '0 mascotas disponibles';
            return;
        }

        contenedor.innerHTML = '';

        data.data.forEach(mascota => {
            contenedor.innerHTML += `
                <article class="pet-card">
                    <img src="${mascota.foto_url}" alt="Foto de ${mascota.nombre}">
                    <div class="pet-card-body">
                        <h4>${mascota.nombre}</h4>
                        <p class="pet-card-meta">
                            ${mascota.especie} · ${mascota.raza} · ${mascota.sexo} · ${mascota.tamaño}
                        </p>
                        <p>${mascota.historial}</p>
                        <div class="pet-card-actions">
                            <a class="btn-adopt" href="../user/solicitar_adopcion.php?id=${mascota.id}">
                                <i class="fa-solid fa-heart"></i> Adoptar
                            </a>
                            <a class="btn-transito" href="../user/solicitar_transito.php?id=${mascota.id}">
                                <i class="fa-solid fa-house-chimney"></i> Hogar de tránsito
                            </a>
                            <a class="btn-detail" href="mascota-detalle.php?id=${mascota.id}">
                                <i class="fa-solid fa-circle-info"></i> Ver detalle
                            </a>
                        </div>
                    </div>
                </article>
            `;
        });

        const total = data.data.length;
        contador.textContent = `${total} mascota${total === 1 ? '' : 's'} disponible${total === 1 ? '' : 's'}`;
    })
    .catch(error => {
        console.error('Error:', error);
    });
