<main class="contenedor seccion">
        <h1 data-cy="heading-contacto">Contacto</h1>

        <?php  if($mensaje) { ?>
                <p data-cy="alerta-envio-formulario" class='alerta exito'><?php echo $mensaje; ?></p>
           <?php }?>

        <picture>
           <source srcset="build/img/destacada04.webp" type="image/webp">
           <source srcset="build/img/destacada04.jpg" type="image/jpeg">
           <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen Contacto">   
        </picture>

        <h2 data-cy="heading-formulario">Llene el Formulario de Contacto</h2>

    <form data-cy="formulario-contacto" class="formulario" action="/contacto" method="POST">
          <fieldset>
              <legend>Información personal</legend>

              <label for="nombre">Nombre</label>
              <input data-cy="input-nombre" type="text" placeholder="Tu Nombre" id="nombre" name="contacto[nombre]" required>
              
              <label for="mensaje">Mensaje:</label>
              <textarea data-cy="input-mensaje" id="mensaje" name="contacto[mensaje]" required></textarea>
          </fieldset>  

          <fieldset>
              <legend>Información sobre la propiedad</legend>

              <label for="opciones">Vende o Compra:</label>
              <select data-cy="input-opciones" id="opciones" name="contacto[tipo]" required>
                <option value="" disabled selected>-- Seleccione --</option>
                <option value="Compra">Compra</option>
                <option value="Vende">Vende</option>
              </select>

              <label for="presupuesto">Precio o Presupuesto</label>
              <input data-cy="input-precio" type="number" placeholder="Tu Precio o Presupuesto" id="presupuesto" name="contacto[precio]" required>
          </fieldset>

          <fieldset>
              <legend>Contacto</legend>

              <p>Como desea ser Contactado:</p>

              <div class="forma-contacto">
                  <label for="contactar-telefono">Teléfono</label>
                  <input data-cy="forma-contacto" type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]" required>
                  
                  <label for="contactar-email">E-mail</label>
                  <input data-cy="forma-contacto" type="radio" value="email" id="contactar-email" name="contacto[contacto]" required>
              </div>

              <div id="contacto"></div>


          </fieldset>

          <input type="submit" value="Enviar" class="boton-verde">
     </form>
</main>