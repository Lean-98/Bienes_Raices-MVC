<main class="contenedor seccion">
        <h1 data-cy="heading-admin">Administrador de Bienes Raices</h1>
       
        <!-- <?php include_once __DIR__ . '/../templates/alertas.php';?> -->

        <a href="/propiedades/crear" class="boton boton-forestGreen">Nueva Propiedad</a>
        <a href="/vendedores/crear" class="boton boton-limeGreen">Nuevo Vendedor</a> 
        <a href="/blogs/crear" class="boton boton-springGreen">Nuevo Blog</a> 
        <a href="/testimoniales/crear" class="boton boton-mediumSeaGreen">Nuevo Testimonial</a> 

        <h2>Propiedades</h2>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody> <!-- Mostrar los Resultados -->
                <?php foreach( $propiedades as $propiedad ): ?>
                <tr>
                    <td><?php echo $propiedad->id; ?></td>
                    <td><?php echo $propiedad->titulo; ?></td>
                    <td>€<?php echo $propiedad->precio; ?></td>
                    <td> <img src="/imagenes/<?php echo $propiedad->imagen; ?>" class="imagen-tabla"></td>
                    <td> 
                        
                        <form method="POST" class="w-100" action="/propiedades/eliminar">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                            <input type="hidden" name="tipo" value="propiedad">
                            <input type="submit"  class="boton-rojo-block" value="Eliminar">
                        </form>

                    <a href="/propiedades/actualizar?id=<?php echo $propiedad->id; ?>" class="boton-orange-block">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


        <h2>Vendedores</h2>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody> <!-- Mostrar los Resultados -->
                <?php foreach( $vendedores as $vendedor ): ?>
                <tr>
                    <td><?php echo $vendedor->id; ?></td>
                    <td><?php echo $vendedor->nombre . " " . $vendedor->apellido ?></td>
                    <td><?php echo $vendedor->telefono; ?></td>
                    <td> <img src="/imagenes/<?php echo $vendedor->imagen; ?>" class="imagen-tabla"></td>
                    
                    <td>  
                        <form method="POST" class="w-100" action="/vendedores/eliminar">
                            <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit"  class="boton-rojo-block" value="Eliminar">
                        </form>

                    <a href="/vendedores/actualizar?id=<?php echo $vendedor->id; ?>" class="boton-orange-block">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>   

 

        <h2> Gestión Blogs</h2>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Escritor</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody> <!-- Mostrar los Resultados -->
               <?php foreach( $blogs as $blog ): ?>
                <tr>
                    <td><?php echo $blog->id; ?></td>
                    <td><?php echo $blog->titulo; ?></td>
                    <td><?php echo $blog->escritor; ?></td>
                    <td> <img src="/imagenes/<?php echo $blog->imagen; ?>" class="imagen-tabla"></td>
                    
                    <td>  
                        <form method="POST" class="w-100" action="/blogs/eliminar">
                            <input type="hidden" name="id" value="<?php echo $blog->id; ?>">
                            <input type="hidden" name="tipo" value="blog">
                            <input type="submit"  class="boton-rojo-block" value="Eliminar">
                        </form>

                    <a href="/blogs/actualizar?id=<?php echo $blog->id; ?>" class="boton-orange-block">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>



        <h2>Testimoniales</h2>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Cotenido</th> 
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody> <!-- Mostrar los Resultados -->
               <?php foreach( $testimoniales as $testimonial ): ?>
                <tr>
                    <td><?php echo $testimonial->id; ?></td>
                    <td><?php echo $testimonial->nombreCompleto; ?></td>
                    <td><?php echo limitar_cadena($testimonial->contenido, 60, "..."); ?></td> 
                    
                <td>  
                    <form method="POST" class="w-100" action="testimoniales/eliminar">
                        <input type="hidden" name="id" value="<?php echo $testimonial->id; ?>">
                        <input type="hidden" name="tipo" value="testimonial">
                        <input type="submit"  class="boton-rojo-block" value="Eliminar">
                    </form>

                    <a href="testimoniales/actualizar?id=<?php echo $testimonial->id; ?>" class="boton-orange-block">Actualizar</a>
                </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
</main>