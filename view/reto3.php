<?php
session_start();
if (!isset($_SESSION['reto3'])) {
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
    <title>Reto 3 - Programación | Aula 404</title>
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
            <p class="etiqueta-progreso">progreso: reto 3 de 4</p>
            <div class="barra-progreso">
                <div class="relleno-progreso" style="width: 75%;"></div>
            </div>
        </div>

        <div class="fila">
            <div class="columna-8">
                <div class="tarjeta tarjeta-reto">
                    <h2>💻 Reto 3 — Programación</h2>

                    <p>Ya queda poco. El antivirus del profe solo deja pasar a los que saben programar. Nada raro, cosas básicas de PHP que vimos en clase:</p>

                    <?php if (isset($_GET['msg'])): ?>
                        <div class="mensaje-error">
                            <strong>No es eso...</strong> <?php echo htmlspecialchars($_GET['msg']); ?>
                        </div>
                    <?php endif; ?>

                    <form action="../proc/proc.php" method="post">
                        <input type="hidden" name="pantalla" value="reto3">

                        <div class="grupo-formulario">
                            <label for="resultado">En PHP, ¿cuánto da <span class="resaltado">5 + 3 * 2</span>?</label>
                            <input type="text" name="resultado" id="resultado" placeholder="El resultado es..." required>
                        </div>

                        <div class="grupo-formulario">
                            <label for="tipo">¿Qué tipo de dato guarda los valores <span class="resaltado">true</span> o <span class="resaltado">false</span>?</label>
                            <input type="text" name="tipo" id="tipo" placeholder="Nombre del tipo de dato..." required>
                        </div>

                        <div class="grupo-formulario">
                            <label for="bucle">¿Cómo se llama el bucle que se repite <span class="resaltado">mientras</span> se cumple algo?</label>
                            <input type="text" name="bucle" id="bucle" placeholder="Nombre del bucle..." required>
                        </div>

                        <button type="submit" class="boton boton-primario">Ejecutar código ▶</button>
                    </form>
                </div>
            </div>

            <div class="columna-4">
                <div class="tarjeta">
                    <h2>💡 Si no te acuerdas...</h2>
                    <p>Recuerda esto:</p>
                    <ul class="lista-pistas">
                        <li>El * va antes que el + (precedencia)</li>
                        <li>Los tipos primitivos de PHP: int, string, float, bool...</li>
                        <li>Hay 3 bucles: for, while, do-while</li>
                    </ul>
                </div>

                <div class="tarjeta">
                    <h2>🔒 Estado</h2>
                    <p>Candado: <span class="resaltado">cerrado</span></p>
                    <p>Reto: <span class="resaltado">3 de 4</span></p>
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