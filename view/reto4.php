<?php
// Arrancamos la sesion para poder leer los datos guardados
session_start();

// Si no tiene reto1 en sesion es que no ha hecho login, lo echamos al inicio
if (!isset($_SESSION['reto1'])) {
    header('Location: ../index.php');
    exit;
}

// Para llegar al reto 4 hay que haber superado los retos 1, 2 y 3
// Miramos cual falta exactamente para mandarlo al sitio correcto
if (!isset($_SESSION['reto4'])) {
    if (!isset($_SESSION['reto2'])) {
        // No ha superado ni el reto 1 todavia
        echo '<script>alert("¡Eh, para el carro! Tienes que superar el Reto 1 antes de acceder aquí."); window.location.href = "reto1.php";</script>';
    } elseif (!isset($_SESSION['reto3'])) {
        // Tiene reto1 pero le falta el reto 2
        echo '<script>alert("¡Eh, para el carro! Tienes que superar el Reto 2 antes de acceder aquí."); window.location.href = "reto2.php";</script>';
    } else {
        // Tiene reto1 y reto2 pero le falta el reto 3
        echo '<script>alert("¡Eh, para el carro! Tienes que superar el Reto 3 antes de acceder aquí."); window.location.href = "reto3.php";</script>';
    }
    exit; // paramos aqui en todos los casos, no cargamos el resto de la pagina
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
    <title>Reto 4 - Hardware | Aula 404</title>
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

        <!-- Barra de progreso, 90% porque es el ultimo reto pero todavia no ha terminado -->
        <div class="envoltorio-progreso">
            <div class="barra-progreso">
                <!-- 90% y no 100% porque aun no ha completado el juego -->
                <div class="relleno-progreso" style="width: 90%;"></div>
            </div>
        </div>

        <!-- fila divide la pantalla en columna grande con el formulario y columna pequeña con pistas -->
        <div class="fila">

            <!-- Columna grande: formulario con las preguntas del reto -->
            <div class="columna-8">
                <div class="tarjeta tarjeta-reto">
                    <h2>Reto 4 — Hardware</h2>
                    <p>Último reto, no te rindas ahora que estás a punto. El ordenador del profe tiene un módulo de hardware que solo pasan los que saben de componentes. ¿Lo eres tú?</p>

                    <!-- Si proc.php nos devuelve con ?msg= en la URL mostramos el error -->
                    <?php if (isset($_GET['msg'])): ?>
                        <div class="mensaje-error">
                            <strong>No es eso...</strong> <?php echo htmlspecialchars($_GET['msg']); ?>
                        </div>
                    <?php endif; ?>

                    <!-- El formulario envia los datos por POST a proc.php -->
                    <form action="../proc/proc.php" method="post">

                        <!-- Campo oculto para que proc.php sepa que bloque ejecutar -->
                        <input type="hidden" name="pantalla" value="reto4">

                        <!-- Pregunta 1: radio buttons con las arquitecturas de procesador mas conocidas -->
                        <!-- Todos tienen name="arquitectura" para que sean del mismo grupo y solo se pueda marcar uno -->
                        <div class="grupo-formulario">
                            <label>El chip <span class="resaltado">Apple M1</span> usa una arquitectura de procesador que se llama...</label>
                            <div class="opciones-radio">
                                <label class="opcion-radio">
                                    <input type="radio" name="arquitectura" value="x86" required>
                                    <span>x86</span>
                                </label>
                                <label class="opcion-radio">
                                    <input type="radio" name="arquitectura" value="arm">
                                    <span>ARM</span>
                                </label>
                                <label class="opcion-radio">
                                    <input type="radio" name="arquitectura" value="mips">
                                    <span>MIPS</span>
                                </label>
                                <label class="opcion-radio">
                                    <input type="radio" name="arquitectura" value="risc-v">
                                    <span>RISC-V</span>
                                </label>
                            </div>
                        </div>

                        <!-- Pregunta 2: select con los tipos de memoria mas conocidos -->
                        <div class="grupo-formulario">
                            <label for="memoria">¿Qué memoria <span class="resaltado">se pierde</span> cuando apagas el ordenador?</label>
                            <select name="memoria" id="memoria" required>
                                <!-- disabled selected hace que salga por defecto pero no se pueda elegir -->
                                <option value="" disabled selected>— Elige una opción —</option>
                                <option value="rom">ROM</option>
                                <option value="ram">RAM</option>
                                <option value="ssd">SSD</option>
                                <option value="hdd">HDD</option>
                            </select>
                        </div>

                        <!-- Pregunta 3: input de texto libre, la respuesta es corta -->
                        <div class="grupo-formulario">
                            <label for="unidad">¿Cómo se llama la <span class="resaltado">unidad mínima</span> de información en informática?</label>
                            <input type="text" name="unidad" id="unidad" placeholder="Es un 0 o un 1..." required>
                        </div>

                        <!-- Al darle al boton se envia el formulario a proc.php -->
                        <button type="submit" class="boton boton-primario">Abrir la puerta final</button>
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
                        <li>RISC vs CISC — dos tipos de arquitecturas</li>
                        <li>Volátil = se va al apagar, no volátil = se queda</li>
                        <li>Bit, Byte, KB, MB, GB... ¿cuál es el más pequeño?</li>
                    </ul>
                </div>
                <!-- Tarjeta que muestra en que reto estamos -->
                <div class="tarjeta">
                    <h2>Estado</h2>
                    <p>Candado: <span class="resaltado">cerrado</span></p>
                    <p>Reto: <span class="resaltado">4 de 4</span></p>
                    <p>El último, venga!</p>
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