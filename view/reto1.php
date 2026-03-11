<?php
// Arrancamos la sesion para poder leer los datos que guardamos al iniciar
session_start();

// Si no tiene reto1 en sesion es que no ha hecho login todavia, lo mandamos al inicio
if (!isset($_SESSION['reto1'])) {
    header('Location: ../index.php');
    exit; // paramos aqui, no seguimos ejecutando nada mas
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Cargamos la hoja de estilos que esta en la carpeta css -->
    <link rel="stylesheet" href="../css/styles.css">
    <title>Reto 1 - Sistemas Numéricos | Aula 404</title>
</head>
<body>

<header>
        <img src="../IMG/Logo800.webp" alt="Logo del aula 404">
         <h1>ESCAPE ROOM</h1>
         <br>
        <!-- Sacamos el nombre del usuario de la sesion, lo guardamos cuando hizo login -->
        <p>// Sesión iniciada como: <?php echo $_SESSION['nombre']; ?> //</p>
</header>

<main>
    <div class="contenedor">

        <!-- Barra de progreso que muestra en que reto estamos -->
        <div class="envoltorio-progreso">
            <div class="barra-progreso">
                <!-- 25% porque es el reto 1 de 4, cada reto suma un 25% -->
                <div class="relleno-progreso" style="width: 25%;"></div>
            </div>
        </div>

        <!-- fila divide la pantalla en dos columnas: la grande con el formulario y la pequeña con las pistas -->
        <div class="fila">

            <!-- Columna grande: aqui va el formulario con las preguntas -->
            <div class="columna-8">
                <div class="tarjeta tarjeta-reto">
                    <h2>Reto 1 — Bases numéricas</h2>
                    <p>Venga, empieza por lo fácil. El primer candado del ordenador del profe es de sistemas numéricos. ¿Te acuerdas de clase?</p>

                    <!-- Si proc.php nos devuelve con ?msg= en la URL mostramos el mensaje de error -->
                    <!-- htmlspecialchars evita que si el mensaje tiene codigo HTML se ejecute -->
                    <?php if (isset($_GET['msg'])): ?>
                        <div class="mensaje-error">
                            <strong>No es eso...</strong> <?php echo htmlspecialchars($_GET['msg']); ?>
                        </div>
                    <?php endif; ?>

                    <!-- El formulario envia los datos por POST a proc.php que comprueba si son correctos -->
                    <form action="../proc/proc.php" method="post">

                        <!-- Campo oculto que le dice a proc.php que bloque de codigo tiene que ejecutar -->
                        <input type="hidden" name="pantalla" value="reto1">

                        <!-- Pregunta 1: input de texto, el usuario escribe libremente -->
                        <div class="grupo-formulario">
                            <label for="binario">¿Cuánto es <span class="resaltado">42</span> en binario?</label>
                            <!-- required hace que el navegador no deje enviar el formulario si esta vacio -->
                            <input type="text" name="binario" id="binario" placeholder="Solo 0s y 1s..." required>
                        </div>

                        <!-- Pregunta 2: select desplegable con 4 opciones para elegir -->
                        <div class="grupo-formulario">
                            <label for="hexadecimal">¿Y <span class="resaltado">255</span> en hexadecimal?</label>
                            <select name="hexadecimal" id="hexadecimal" required>
                                <!-- disabled selected hace que esta opcion salga por defecto pero no se pueda elegir -->
                                <option value="" disabled selected>— Elige una opción —</option>
                                <option value="ef">EF</option>
                                <option value="ff">FF</option>
                                <option value="fe">FE</option>
                                <option value="f0">F0</option>
                            </select>
                        </div>

                        <!-- Pregunta 3: radio buttons, solo se puede marcar una opcion a la vez -->
                        <div class="grupo-formulario">
                            <label>¿Cuánto es <span class="resaltado">8</span> en octal?</label>
                            <!-- Todos tienen el mismo name="octal" para que sean del mismo grupo -->
                            <div class="opciones-radio">
                                <label class="opcion-radio">
                                    <input type="radio" name="octal" value="8" required>
                                    <span>8</span>
                                </label>
                                <label class="opcion-radio">
                                    <input type="radio" name="octal" value="10">
                                    <span>10</span>
                                </label>
                                <label class="opcion-radio">
                                    <input type="radio" name="octal" value="12">
                                    <span>12</span>
                                </label>
                                <label class="opcion-radio">
                                    <input type="radio" name="octal" value="16">
                                    <span>16</span>
                                </label>
                            </div>
                        </div>

                        <!-- Al darle al boton se envia el formulario a proc.php -->
                        <button type="submit" class="boton boton-primario">Abrir candado</button>
                    </form>
                </div>
            </div>

            <!-- Columna pequeña: tarjetas de ayuda y estado del reto -->
            <div class="columna-4">
                <!-- Tarjeta con pistas por si no se acuerdan -->
                <div class="tarjeta">
                    <h2>Si no te acuerdas...</h2>
                    <p>Repasa los sistemas de numeración:</p>
                    <ul class="lista-pistas">
                        <li>Binario = base 2 (solo 0 y 1)</li>
                        <li>Octal = base 8 (del 0 al 7)</li>
                        <li>Hexadecimal = base 16 (0-9 y a-f)</li>
                    </ul>
                </div>
                <!-- Tarjeta que muestra en que reto estamos -->
                <div class="tarjeta">
                    <h2>Estado</h2>
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