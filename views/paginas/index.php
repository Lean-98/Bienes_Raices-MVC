<main class="contenedor seccion">
    <h2 data-cy="heading-nosotros">Más Sobre Nosotros</h2>

    <?php include 'iconos.php'; ?>
</main>

<section class="seccion contenedor">
    <h2>Casas y Departamentos en Venta</h2>

    <?php
        include 'listado.php';
    ?>
    
    <div class="alinear-derecha">
        <a href="/propiedades" class="boton-verde" data-cy="todas-propiedades">Ver Todas</a>
    </div>
</section>

<section data-cy="imagen-contacto" class="imagen-contacto">
    <h2>Encuentra la casa de tus sueños</h2>
    <p class="info-contacto">Llena el formulario de contacto y un asesor se comunicará contigo a la brevedad</p>
    <a href="/contacto" class="boton-amarillo">Contactános</a>
</section>



<div class="contenedor seccion seccion-inferior">
    <section data-cy="blog" class="blog">

        <?php
             include 'blog.php';
        ?>
 
    </section>
   

    <section data-cy="testimoniales" class="testimoniales">
        <h2>Testimoniales</h2>

        <div class="testimonial">

        <?php 
             include 'testimonial.php';
        ?>
        
        </div>
    </section>
</div>