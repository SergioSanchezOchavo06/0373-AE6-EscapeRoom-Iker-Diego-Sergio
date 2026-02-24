<?php
session_start();
if (!isset($_SESSION['completado'])) {
    header('Location: ../index.php');
    exit;
}
$nombre = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>¡Has superado! | Aula 404</title>
</head>
<body>

<header>
    <div class="contenedor">
        <h1>💻 Aula 404</h1>
        <p>// misión cumplida //</p>
    </div>
</header>

<main>
    <div class="contenedor">

        <div class="envoltorio-progreso">
            <p class="etiqueta-progreso">progreso: ¡completado al 100%!</p>
            <div class="barra-progreso">
                <div class="relleno-progreso" style="width: 100%;"></div>
            </div>
        </div>

        <div class="fila">
            <div class="columna-12">
                <div class="congrats-wrap">
                    <span class="icono-ascii">🏆</span>
                    <h2>¡Enhorabuena, <span><?php echo $nombre; ?></span>!</h2>
                    <div class="badge-completado">✅ Aula 404 superada</div>
                    <p>Has conseguido salir del aula. Los 4 retos resueltos y el profe sin enterarse. No está mal para ser antes de las 9 de la mañana.</p>
                    <p>Demostraste que algo se te quedó de clase: bases numéricas, redes, programación y hardware. El profe estaría orgulloso (o celoso, quién sabe).</p>

                    <form action="../proc/proc.php" method="post">
                        <input type="hidden" name="pantalla" value="replay">
                        <button type="submit" class="boton boton-secundario">🔄 Volver a empezar</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="fila">
            <div class="columna-6">
                <div class="tarjeta">
                    <h2>📝 Lo que has resuelto</h2>
                    <ul class="lista-pistas">
                        <li>Reto 1 — Bases numéricas ✅</li>
                        <li>Reto 2 — Redes y protocolos ✅</li>
                        <li>Reto 3 — Programación PHP ✅</li>
                        <li>Reto 4 — Hardware ✅</li>
                    </ul>
                </div>
            </div>
            <div class="columna-6">
                <div class="tarjeta">
                    <h2>🎖️ Título conseguido</h2>
                    <p>A partir de ahora puedes llamarte:</p>
                    <p><span class="resaltado">Alumno del año del Aula 404</span></p>
                    <p>No tiene ningún valor académico, pero mola tenerlo.</p>
                </div>
            </div>
        </div>

    </div>
</main>

<footer>
    <div class="contenedor">
        <p>aula 404 · el escape room de ASIX · hecho por Iker Quesada , Diego Montero y Sergio Sanchez</p>
    </div>
</footer>

</body>
</html>