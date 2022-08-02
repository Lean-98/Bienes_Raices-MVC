<main class="contenedor seccion contenido-centrado">
        <h1 data-cy="heading-login">Iniciar Sesión</h1>

<?php include_once __DIR__ . '/../templates/alertas.php';?>

    <form data-cy="formulario-login" method="POST" class="formulario" action="/login">
        <fieldset>   
            <legend>Email y Password</legend>

            <label for="email">E-mail</label>
            <input data-cy="email-login" type="email" name="email" placeholder="Tu Email" id="email">

            <label for="password">Password</label>
            <input data-cy="password-login" type="password" name="password" placeholder="Tu Password" id="password">
        </fieldset> 
        <input type="submit" value="Iniciar Sesión" class="boton-verde"> 
    </form>
</main>