<?php
session_start();
if (!isset($_SESSION['reto2'])) {
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
    <title>Reto 2 - Redes | Aula 404</title>
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
            <p class="etiqueta-progreso">progreso: reto 2 de 4</p>
            <div class="barra-progreso">
                <div class="relleno-progreso" style="width: 50%;"></div>
            </div>
        </div>

        <div class="fila">
            <div class="columna-8">
                <div class="tarjeta tarjeta-reto">
                    <h2>🌐 Reto 2 — Redes y protocolos</h2>

                    <p>Bien, primer reto superado. Ahora el firewall del ordenador del profe te bloquea el paso,  Toca redes. </p>

                    <?php if (isset($_GET['msg'])): ?>
                        <div class="mensaje-error">
                            <strong>No es eso...</strong> <?php echo htmlspecialchars($_GET['msg']); ?>
                        </div>
                    <?php endif; ?>

                    <form action="../proc/proc.php" method="post">
                        <input type="hidden" name="pantalla" value="reto2">

                        <div class="grupo-formulario">
                            <label for="puerto">¿Por qué puerto va el <span class="resaltado">HTTP</span> por defecto?</label>
                            <input type="text" name="puerto" id="puerto" placeholder="Número de puerto..." required>
                        </div>

                        <div class="grupo-formulario">
                            <label for="protocolo">¿Qué protocolo usas para <span class="resaltado">enviar</span> un correo?</label>
                            <input type="text" name="protocolo" id="protocolo" placeholder="Nombre del protocolo..." required>
                        </div>

                        <div class="grupo-formulario">
                            <label for="mascara">¿Cuál es la máscara de red de una clase <span class="resaltado">C</span>?</label>
                            <input type="text" name="mascara" id="mascara" placeholder="Formato: x.x.x.x" required>
                        </div>

                        <button type="submit" class="boton boton-primario">Saltar el firewall 🌐</button>
                    </form>
                </div>
            </div>

            <div class="columna-4">
                <div class="tarjeta">
                    <h2>💡 Si no te acuerdas...</h2>
                    <p>Piensa en esto:</p>
                    <ul class="lista-pistas">
                        <li>Los puertos van del 0 al 65535</li>
                        <li>SMTP, POP3, IMAP son de correo</li>
                        <li>Clase C empieza por 192.168...</li>
                    </ul>
                </div>

                <div class="tarjeta">
                    <h2>🔒 Estado</h2>
                    <p>Candado: <span class="resaltado">cerrado</span></p>
                    <p>Reto: <span class="resaltado">2 de 4</span></p>
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