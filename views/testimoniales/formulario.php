<fieldset>
        <legend>Testimonial</legend>

        <label for="nombreCompleto">Nombre:</label>
        <input type="text" id="nombreCompleto" name="testimonial[nombreCompleto]" placeholder="Nombre Completo del Cliente" 
        value="<?php echo s($testimonial->nombreCompleto); ?>">

        <label for="contenido">Contenido:</label>
        <textarea name="testimonial[contenido]" id="contenido"><?php echo s($testimonial->contenido); ?></textarea>
                
</fieldset>