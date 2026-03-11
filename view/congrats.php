<?php
// inicia la sesión para poder usar las variables guardadas entre páginas
session_start();

// si el usuario no ha completado el reto1 lo mandamos al inicio
if (!isset($_SESSION['reto1'])) {
    header('Location: /index.php'); // redirección al index
    exit; // corta la ejecución del script
}

// variable para detectar si el usuario intenta saltarse pasos
$se_salta_paso = false;

// aquí guardaremos qué reto le falta completar
$num_del_pendiente = '';

// si la sesión "completado" no existe significa que aún no ha terminado todo
if (!isset($_SESSION['completado'])) {

    // marcamos que está intentando entrar antes de tiempo
    $se_salta_paso = true;

    // comprobamos qué reto es el primero que no ha hecho
    if (!isset($_SESSION['reto2']))      { $num_del_pendiente = '1'; }
    elseif (!isset($_SESSION['reto3']))  { $num_del_pendiente = '2'; }
    elseif (!isset($_SESSION['reto4']))  { $num_del_pendiente = '3'; }
    else                                 { $num_del_pendiente = '4'; }
}

// guardamos el nombre del usuario que está en la sesión
$nombre = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <!-- configuración básica de la página -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- carga del css -->
    <link rel="stylesheet" href="../css/styles.css">

    <title>¡Has superado! | Aula 404</title>
</head>
<body>

<?php if ($se_salta_paso): ?>
<script>
    // si intenta entrar sin completar retos sale un aviso
    alert("¡Eh, para el carro! Tienes que superar el Reto <?php echo $num_del_pendiente; ?> antes de acceder aquí.");

    // lo mandamos a la página del reto que le falta
    window.location.href = "<?php echo $url_del_pendiente; ?>";
</script>
<?php endif; ?>

<header>
        <img src="../IMG/Logo800.webp" alt="Logo del aula 404">
         <h1>ESCAPE ROOM</h1>
         <br>
        <!-- título del proyecto -->
        <h1>Escape Room SUPERADO </h1>
        <p>// misión cumplida //</p>
</header>

<main>
    <div class="contenedor">

        <!-- barra visual que indica que el juego está completado -->
        <div class="envoltorio-progreso">

            <!-- barra de progreso -->
            <div class="barra-progreso">
                <!-- relleno de la barra (100% porque ya acabó) -->
                <div class="relleno-progreso" style="width: 100%;"></div>
            </div>
        </div>

        <div class="fila">
            <div class="columna-12">

                <!-- caja principal de felicitación -->
                <div class="congrats-wrap">

                    <!-- icono decorativo -->
                    <span class="icono-ascii"></span>

                    <!-- mensaje de felicitación con el nombre del usuario -->
                    <h2>¡Enhorabuena, <span><?php echo $nombre; ?></span>!</h2>

                    <!-- insignia visual -->
                    <div class="badge-completado">Escape Room SUPERADO</div>

                    <!-- texto de cierre del escape room -->
                    <p>Has conseguido salir del Escape Room . Los 4 retos resueltos y sin apenas haber sufrido. No está mal para ser antes de las 9 de la mañana.</p>

                    <p>Demostraste que algo se te quedó de clase: bases numéricas, redes, programación y hardware. El profe estaría orgulloso (o celoso, quién sabe).</p>

                    <!-- formulario para reiniciar el juego -->
                    <form action="/proc/proc.php" method="post">

                        <!-- valor oculto para decirle al script que queremos reiniciar -->
                        <input type="hidden" name="pantalla" value="replay">

                        <!-- botón para volver a empezar -->
                        <button type="submit" class="boton boton-secundario">🔄 Volver a empezar</button>

                    </form>
                </div>
            </div>
        </div>

        <div class="fila">

            <!-- columna con resumen de retos -->
            <div class="columna-6">
                <div class="tarjeta">
                    <h2> Lo que has resuelto</h2>

                    <!-- lista de retos completados -->
                    <ul class="lista-pistas">
                        <li>Reto 1 — Bases numéricas </li>
                        <li>Reto 2 — Redes y protocolos </li>
                        <li>Reto 3 — Programación PHP </li>
                        <li>Reto 4 — Hardware </li>
                    </ul>
                </div>
            </div>

            <!-- columna con el "título" simbólico -->
            <div class="columna-6">
                <div class="tarjeta">

                    <h2> Título conseguido</h2>

                    <p>A partir de ahora puedes llamarte:</p>

                    <!-- título decorativo -->
                    <p><span class="resaltado">Alumno del año del Aula 404</span></p>

                    <p>No tiene ningún valor académico, pero mola tenerlo.</p>

                </div>
            </div>

        </div>

    </div>
</main>

<footer>
    <div class="contenedor">

        <!-- créditos del proyecto -->
        <p>aula 404 · el escape room de ASIX · hecho por Iker Quesada , Diego Montero y Sergio Sanchez</p>

    </div>
</footer>

</body>
</html>