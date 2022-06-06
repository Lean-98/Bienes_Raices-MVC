<fieldset>
        <legend>Nuestro Blog</legend>

        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="blog[titulo]" placeholder="Título Blog" value="<?php echo s($blog->titulo); ?>">

        <label for="escritor">Escritor:</label>
        <input type="text" id="escritor" name="blog[escritor]" placeholder="Nombre Completo del Escritor" 
        value="<?php echo s($blog->escritor); ?>">

        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="blog[fecha]" value="<?php echo s($blog->fecha); ?>">

        <label for="contenido">Contenido:</label>
        <textarea name="blog[contenido]" id="contenido"><?php echo s($blog->contenido); ?></textarea>
                
        <label for="imagen">Imagen:</label>
        <input type="file" id="imagen" accept="image/jpg, image/png" name="blog[imagen]">

        <?php if($blog->imagen): ?>
                <img src="/imagenes/<?php echo $blog->imagen ?>" class="imagen-small">
        <?php endif; ?>

</fieldset>

