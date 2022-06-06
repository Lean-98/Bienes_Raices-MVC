<main class="contenedor seccion contenido-centrado">
        <h1 data-cy="titulo-propiedad"><?php echo $propiedad->titulo; ?></h1>

        <img loading="lazy" src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="Imagen de la Propiedad">
      
        <div class="resumen-propiedad">
            <p class="precio">€<?php echo number_format($propiedad->precio); ?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                    <p><?php echo $propiedad->habitaciones; ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p><?php echo $propiedad->wc; ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p><?php echo $propiedad->estacionamiento; ?></p>
                </li>
            </ul>
            <p><?php echo $propiedad->descripcion; ?></p>
</main>