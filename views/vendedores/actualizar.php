<main class="contenedor seccion">
    <h1>Actualizar Vendedor(a)</h1>

     <a href="/admin" class="boton boton-verde">Volver</a>

     <?php include __DIR__ . '/../templates/alertas.php'; ?>

        <form class="formulario" method="POST" enctype="multipart/form-data">
            <?php include 'formulario.php'; ?>
            <input type="submit" value="Guardar Cambios" class="boton boton-verde">
        </form>

    </main>