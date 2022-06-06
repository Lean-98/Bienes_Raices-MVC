<fieldset>
        <legend>Información General</legend>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="vendedor[nombre]" placeholder="Nombre vendedor(a)" value="<?php echo s($vendedor->nombre); ?>">

        <label for="apellido">Apellido:</label>
        <input type="text" id="nombre" name="vendedor[apellido]" placeholder="Apellido vendedor(a)" value="<?php echo s($vendedor->apellido); ?>">
                
        <label for="imagen">Imagen:</label>
        <input type="file" id="imagen" accept="image/jpg, image/png" name="vendedor[imagen]">

        <?php if($vendedor->imagen): ?>
                <img src="/imagenes/<?php echo $vendedor->imagen ?>" class="imagen-small">
        <?php endif; ?>

</fieldset>

<fieldset>
    <legend> Información Extra</legend>
    
    <label for="telefono">Teléfono:</label>
        <input type="number" id="telefono" name="vendedor[telefono]" placeholder="Teléfono" value="<?php echo s($vendedor->telefono); ?>">
    <label for="email">E-mail:</label>
    <input type="email" id="email" name="vendedor[email]" placeholder="E-mail" value="<?php echo s($vendedor->email); ?>">        
</fieldset>