<?php
session_start();
if (!isset($_SESSION['reto4'])) {
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
    <title>Reto 4 - Hardware | Aula 404</title>
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
            <p class="etiqueta-progreso">progreso: reto 4 de 4 — ¡ya casi!</p>
            <div class="barra-progreso">
                <div class="relleno-progreso" style="width: 90%;"></div>
            </div>
        </div>

        <div class="fila">
            <div class="columna-8">
                <div class="tarjeta tarjeta-reto">
                    <h2>⚙️ Reto 4 — Hardware</h2>

                    <p>Último reto, no te rindas ahora que estás a punto. El ordenador del profe tiene un módulo de hardware que solo pasan los que saben de componentes. ¿Lo eres tú?</p>

                    <?php if (isset($_GET['msg'])): ?>
                        <div class="mensaje-error">
                            <strong>No es eso...</strong> <?php echo htmlspecialchars($_GET['msg']); ?>
                        </div>
                    <?php endif; ?>

                    <form action="../proc/proc.php" method="post">
                        <input type="hidden" name="pantalla" value="reto4">

                        <div class="grupo-formulario">
                            <label for="arquitectura">El chip <span class="resaltado">Apple M1</span> usa una arquitectura de procesador que se llama...</label>
                            <input type="text" name="arquitectura" id="arquitectura" placeholder="3 letras..." required>
                        </div>

                        <div class="grupo-formulario">
                            <label for="memoria">¿Qué memoria <span class="resaltado">se pierde</span> cuando apagas el ordenador? (pon las siglas)</label>
                            <input type="text" name="memoria" id="memoria" placeholder="Siglas de 3 letras..." required>
                        </div>

                        <div class="grupo-formulario">
                            <label for="unidad">¿Cómo se llama la <span class="resaltado">unidad mínima</span> de información en informática?</label>
                            <input type="text" name="unidad" id="unidad" placeholder="Es un 0 o un 1..." required>
                        </div>

                        <button type="submit" class="boton boton-primario">Abrir la puerta final 🚪</button>
                    </form>
                </div>
            </div>

            <div class="columna-4">
                <div class="tarjeta">
                    <h2>💡 Si no te acuerdas...</h2>
                    <p>Piensa en esto:</p>
                    <ul class="lista-pistas">
                        <li>RISC vs CISC — dos tipos de arquitecturas</li>
                        <li>Volátil = se va al apagar, no volátil = se queda</li>
                        <li>Bit, Byte, KB, MB, GB... ¿cuál es el más pequeño?</li>
                    </ul>
                </div>

                <div class="tarjeta">
                    <h2>🔒 Estado</h2>
                    <p>Candado: <span class="resaltado">cerrado</span></p>
                    <p>Reto: <span class="resaltado">4 de 4</span></p>
                    <p>¡El último, venga!</p>
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