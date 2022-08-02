<main class="contenedor seccion">
    <h1>Crear Blog</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php include_once __DIR__ . '/../templates/alertas.php';?>

    <form class="formulario" method="POST" enctype="multipart/form-data">
        <?php include 'formulario.php'; ?>
        <input type="submit" value="Crear Blog" class="boton boton-verde">
    </form>
        
</main>