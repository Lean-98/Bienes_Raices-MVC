<main class="contenedor seccion contenido-centrado">
    <!-- <h1>Guía para la decoración de tu hogar</h1> -->

<article class="entrada-blog"> 
    <div class="imagen">
        <picture>
            <img loading="lazy" src="/imagenes/<?php echo $blog->imagen; ?>" alt="Texto Entrada Blog">    
        </picture>
    </div>

    <div class="texto-entrada">
        <a href="blog?id=<?php echo $blog->id; ?>">
            <?php $fecha = new DateTime($blog->fecha); ?>
            <h4><?php echo $blog->titulo; ?></h4>
            <p class="informacion-meta">Escrito el: <span><?php echo $fecha->format("d-m-Y"); ?></span> 
            por: <span><?php echo $blog->escritor; ?></span></p>
            <p>
                <p> <?php echo $blog->contenido; ?></p>
            </p>
        </a>  
    </div>
</article>
</main>

      




