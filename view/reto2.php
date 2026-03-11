<?php
// Arrancamos la sesion para poder leer los datos guardados
session_start();

// Si no tiene reto1 en sesion es que no ha hecho login, lo echamos al inicio
if (!isset($_SESSION['reto1'])) {
    header('Location: /index.php');
    exit;
}

// Si no tiene reto2 es que no ha superado el reto 1 todavia
// Le mostramos un alert de JS y lo mandamos de vuelta al reto 1
if (!isset($_SESSION['reto2'])) {
    echo '<script>alert("¡Eh, para el carro! Tienes que superar el Reto 1 antes de acceder aquí."); window.location.href = "/view/reto1.php";</script>';
    exit; // paramos aqui, no cargamos el resto de la pagina
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <!-- Para que se vea bien en movil -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Cargamos la hoja de estilos que esta en la carpeta css -->
    <link rel="stylesheet" href="../css/styles.css">
    <title>Reto 2 - Redes | Aula 404</title>
</head>
<body>

<header>
        <img src="../IMG/Logo800.webp" alt="Logo del aula 404">
        <h1>Escape Room</h1>
        <br>
        <!-- Sacamos el nombre del usuario de la sesion -->
        <p>// sesión iniciada como: <?php echo $_SESSION['nombre']; ?> //</p>
</header>

<main>
    <div class="contenedor">

        <!-- Barra de progreso, 50% porque estamos en el reto 2 de 4 -->
        <div class="envoltorio-progreso">
            <div class="barra-progreso">
                <!-- Cada reto es un 25%, llevamos 2 asi que 50% -->
                <div class="relleno-progreso" style="width: 50%;"></div>
            </div>
        </div>

        <!-- fila divide la pantalla en columna grande con el formulario y columna pequeña con pistas -->
        <div class="fila">

            <!-- Columna grande: formulario con las preguntas del reto -->
            <div class="columna-8">
                <div class="tarjeta tarjeta-reto">
                    <h2>Reto 2 — Redes y protocolos</h2>
                    <p>Bien, primer reto superado. Ahora el firewall del ordenador del profe te bloquea el paso. Toca redes.</p>

                    <!-- Si proc.php nos devuelve con ?msg= en la URL mostramos el error -->
                    <?php if (isset($_GET['msg'])): ?>
                        <div class="mensaje-error">
                            <strong>No es eso...</strong> <?php echo htmlspecialchars($_GET['msg']); ?>
                        </div>
                    <?php endif; ?>

                    <!-- El formulario envia los datos por POST a proc.php -->
                    <form action="/proc/proc.php" method="post">

                        <!-- Campo oculto para que proc.php sepa que bloque ejecutar -->
                        <input type="hidden" name="pantalla" value="reto2">

                        <!-- Pregunta 1: input numerico, solo acepta numeros entre 1 y 65535 -->
                        <div class="grupo-formulario">
                            <label for="puerto">¿Por qué puerto va el <span class="resaltado">HTTP</span> por defecto?</label>
                            <!-- type="number" con min y max limita lo que puede escribir el usuario -->
                            <input type="number" name="puerto" id="puerto" placeholder="Número de puerto..." min="1" max="65535" required>
                        </div>

                        <!-- Pregunta 2: radio buttons con los 4 protocolos de correo mas conocidos -->
                        <!-- Todos tienen name="protocolo" para que sean del mismo grupo y solo se pueda marcar uno -->
                        <div class="grupo-formulario">
                            <label>¿Qué protocolo usas para <span class="resaltado">enviar</span> un correo?</label>
                            <div class="opciones-radio">
                                <label class="opcion-radio">
                                    <input type="radio" name="protocolo" value="pop3" required>
                                    <span>POP3</span>
                                </label>
                                <label class="opcion-radio">
                                    <input type="radio" name="protocolo" value="imap">
                                    <span>IMAP</span>
                                </label>
                                <label class="opcion-radio">
                                    <input type="radio" name="protocolo" value="smtp">
                                    <span>SMTP</span>
                                </label>
                                <label class="opcion-radio">
                                    <input type="radio" name="protocolo" value="ftp">
                                    <span>FTP</span>
                                </label>
                            </div>
                        </div>

                        <!-- Pregunta 3: select con las mascaras de red de las 4 clases -->
                        <div class="grupo-formulario">
                            <label for="mascara">¿Cuál es la máscara de red de una clase <span class="resaltado">C</span>?</label>
                            <select name="mascara" id="mascara" required>
                                <!-- disabled selected hace que salga por defecto pero no se pueda elegir -->
                                <option value="" disabled selected>— Elige una opción —</option>
                                <option value="255.0.0.0">255.0.0.0</option>
                                <option value="255.255.0.0">255.255.0.0</option>
                                <option value="255.255.255.0">255.255.255.0</option>
                                <option value="255.255.255.255">255.255.255.255</option>
                            </select>
                        </div>

                        <!-- Al darle al boton se envia el formulario a proc.php -->
                        <button type="submit" class="boton boton-primario">Saltar el firewall</button>
                    </form>
                </div>
            </div>

            <!-- Columna pequeña: pistas y estado del reto -->
            <div class="columna-4">
                <!-- Tarjeta con pistas por si no se acuerdan -->
                <div class="tarjeta">
                    <h2>Si no te acuerdas...</h2>
                    <p>Piensa en esto:</p>
                    <ul class="lista-pistas">
                        <li>Los puertos van del 0 al 65535</li>
                        <li>SMTP, POP3, IMAP son de correo</li>
                        <li>Clase C empieza por 192.168...</li>
                    </ul>
                </div>
                <!-- Tarjeta que muestra en que reto estamos -->
                <div class="tarjeta">
                    <h2>Estado</h2>
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