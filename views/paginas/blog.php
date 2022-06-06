<main data-cy="contenedor-seccion-blog" class="contenedor seccion contenido-centrado">
        <h2>Nuestro Blog</h2>
        <?php foreach($blogs as $blog): ?>
          
        <article data-cy="entrada-blog" class="entrada-blog"> 
            <div data-cy="imagen" class="imagen">
                <picture>
                    <img loading="lazy" src="/imagenes/<?php echo $blog->imagen; ?>" alt="Texto Entrada Blog">    
                </picture>
            </div>

            <div data-cy="texto-entrada" class="texto-entrada">
              <a href="entrada?id=<?php echo $blog->id; ?>">
                <?php $fecha = new DateTime($blog->fecha); ?>

                  <h4 data-cy="titulo-blog"><?php echo $blog->titulo; ?></h4>
                  <p class="informacion-meta">Escrito el: <span><?php echo $fecha->format("d-m-Y"); ?></span> 
                  por: <span><?php echo $blog->escritor; ?></span></p>

                  <p>
                      <p> <?php echo limitar_cadena($blog->contenido, 325, "..."); ?></p>
                  </p>
              </a>  
            </div>
        </article>

    <?php endforeach; ?>
</main>

