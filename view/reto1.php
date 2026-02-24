<?php
session_start();
if (!isset($_SESSION['reto1'])) {
    header('Location: ../index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Reto 1 - Sistemas Numéricos | Aula 404</title>
</head>
<body>

<header>
    <div class="contenedor">
        <h1>💻 Aula 404</h1>
        <p>// sesión iniciada como: <?php echo $_SESSION['nombre']; ?> //</p>
    </div>
</header>

<main>
    <div class="contenedor">

        <div class="envoltorio-progreso">
            <p class="etiqueta-progreso">progreso: reto 1 de 4</p>
            <div class="barra-progreso">
                <div class="relleno-progreso" style="width: 25%;"></div>
            </div>
        </div>

        <div class="fila">
            <div class="columna-8">
                <div class="tarjeta tarjeta-reto">
                    <h2>🔢 Reto 1 — Bases numéricas</h2>

                    <p>Venga, empieza por lo fácil. El primer candado del ordenador del profe es de sistemas numéricos. Te acuerdas de clase ?</p>

                    <?php if (isset($_GET['msg'])): ?>
                        <div class="mensaje-error">
                            <strong>No es eso...</strong> <?php echo htmlspecialchars($_GET['msg']); ?>
                        </div>
                    <?php endif; ?>

                    <form action="../proc/proc.php" method="post">
                        <input type="hidden" name="pantalla" value="reto1">

                        <div class="grupo-formulario">
                            <label for="binario">¿Cuánto es <span class="resaltado">42</span> en binario?</label>
                            <input type="text" name="binario" id="binario" placeholder="Solo 0s y 1s..." required>
                        </div>

                        <div class="grupo-formulario">
                            <label for="hexadecimal">¿Y <span class="resaltado">255</span> en hexadecimal?</label>
                            <input type="text" name="hexadecimal" id="hexadecimal" placeholder="Letras y/o números..." required>
                        </div>

                        <div class="grupo-formulario">
                            <label for="octal">¿Cuánto es <span class="resaltado">8</span> en octal?</label>
                            <input type="text" name="octal" id="octal" placeholder="En base 8..." required>
                        </div>

                        <button type="submit" class="boton boton-primario">Abrir candado 🔓</button>
                    </form>
                </div>
            </div>

            <div class="columna-4">
                <div class="tarjeta">
                    <h2>💡 Si no te acuerdas...</h2>
                    <p>Repasa los sistemas de numeración:</p>
                    <ul class="lista-pistas">
                        <li>Binario = base 2 (solo 0 y 1)</li>
                        <li>Octal = base 8 (del 0 al 7)</li>
                        <li>Hexadecimal = base 16 (0-9 y a-f)</li>
                    </ul>
                </div>

                <div class="tarjeta">
                    <h2>🔒 Estado</h2>
                    <p>Candado: <span class="resaltado">cerrado</span></p>
                    <p>Reto: <span class="resaltado">1 de 4</span></p>
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