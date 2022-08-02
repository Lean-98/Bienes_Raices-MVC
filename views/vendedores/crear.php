
<main class="contenedor seccion">
    <h1>Crear</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php include __DIR__ . '/../templates/alertas.php'; ?>

    <form class="formulario" method="POST" action="/vendedores/crear" enctype="multipart/form-data">
        <?php include 'formulario.php'; ?>
        <input type="submit" value="Registrar Vendedor" class="boton boton-verde">
    </form>
        
</main>
