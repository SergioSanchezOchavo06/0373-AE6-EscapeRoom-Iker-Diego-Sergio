<?php
session_start();
if (isset($_SESSION['reto1'])) {
    header('Location: view/reto1.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Aula 404 - El Escape Room del Insti</title>
</head>
<body>

<header>
    <div class="contenedor">
        <h1>💻 Aula 404</h1>
        <p>// El escape room de la aula de ASIX //</p>
    </div>
</header>

<main>
    <div class="contenedor">

        <div class="titulo-bienvenida">
            <h2>Bienvenido al aula<br><span> de ASIX</span></h2>
        </div>

        <div class="fila">
            <div class="columna-8">
                <div class="tarjeta">
                    <h2>¿De qué va esto?</h2>
                    <p>Estás en el aula de informática, son las 8 de la mañana y el ordenador del profe controla la puerta. Para salir tienes que resolver <span class="resaltado">4 retos</span> de los temas que hemos dado en clase.</p>
                    <p>Si fallas , no pasa nada, te da una pista y lo intentas otra vez. Sin límite de intentos, sin dramas.</p>
                    <ul class="lista-pistas">
                        <li>Reto 1 — Sistemas numéricos (binario, hexa, octal)</li>
                        <li>Reto 2 — Redes y protocolos</li>
                        <li>Reto 3 — Programación en PHP</li>
                        <li>Reto 4 — Hardware y componentes</li>
                    </ul>
                </div>

                <div class="tarjeta">
                    <h2>Identifícate para entrar</h2>
                    <p>El ordenador necesita saber quién eres. Pon tu nombre y correo y le damos:</p>

                    <form action="proc/proc.php" method="post">
                        <div class="grupo-formulario">
                            <label for="nombre">Tu nombre</label>
                            <input type="text" name="nombre" id="nombre" placeholder="Ej: Albeto De santos" required>
                        </div>
                        <div class="grupo-formulario">
                            <label for="email">Tu correo</label>
                            <input type="email" name="email" id="email" placeholder="tunombre@alumnes.com" required>
                        </div>
                        <input type="hidden" name="pantalla" value="inicio">
                        <button type="submit" class="boton boton-primario">Entrar al aula </button>
                    </form>

                    <?php if (isset($_GET['msg'])): ?>
                        <div class="mensaje-error">
                            <strong>Ey, espera:</strong> <?php echo htmlspecialchars($_GET['msg']); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>

    </div>
</main>

<footer>
    <div class="contenedor">
        <p>aula 404 · el escape room de ASIX · hecho por Iker Quesada , Diego Montero y Sergio Sanchez </p>
    </div>
</footer>

</body>
</html>