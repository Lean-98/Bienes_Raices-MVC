<fieldset>
        <legend>Información General</legend>

        <label for="titulo">Titulo:</label>
        <input type="text" id="titulo" name="propiedad[titulo]" placeholder="Titulo Propiedad" value="<?php echo s($propiedad->titulo); ?>">

        <label for="precio">precio:</label>
        <input type="number" id="precio" name="propiedad[precio]" placeholder="Precio Propiedad" value="<?php echo s($propiedad->precio); ?>">
                
        <label for="imagen">Imagen:</label>
        <input type="file" id="imagen" accept="image/jpg, image/png" name="propiedad[imagen]">

        <?php if($propiedad->imagen): ?>
                <img src="/imagenes/<?php echo $propiedad->imagen ?>" class="imagen-small">
        <?php endif; ?>
        
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="propiedad[descripcion]"><?php echo s($propiedad->descripcion); ?></textarea>

</fieldset>
            
<fieldset>
         <legend>Información Propiedad</legend>

         <label for="habitaciones">Habitaciones:</label>
         <input type="number" id="habitaciones" name="propiedad[habitaciones]" placeholder="Cantidad Habitaciones" min="1" max="9" value="<?php echo 
         s($propiedad->habitaciones); ?>">

        <label for="wc">Baños:</label>
        <input type="number" id="wc" name="propiedad[wc]" placeholder="Cantidad Baños" min="1" max="9" value="<?php echo s($propiedad->wc); ?>">

        <label for="estacionamiento">Estacionamiento:</label>
        <input type="number" id="estacionamiento" name="propiedad[estacionamiento]" placeholder="Cantidad Vehiculos para la Cochera" min="1" max="9" value="<?php echo s($propiedad->estacionamiento); ?>">
</fieldset>

<fieldset>
        <legend>Vendedor</legend>
        <label for="vendedor">Vendedor</label>
        <select name="propiedad[vendedor_id]" id="vendedor">
        <option selected="true" disabled="disabled">-- Seleccione --</option>
         <?php foreach($vendedores as $vendedor) { ?>  
                <option 
                <?php echo $propiedad->vendedor_id === $vendedor->id ? 'selected' : ''; ?>
                value="<?php echo s($vendedor->id); ?>"> 
                <?php echo s($vendedor->nombre) . ' '. s($vendedor->apellido); ?> </option>
         <?php } ?>      
</fieldset> 