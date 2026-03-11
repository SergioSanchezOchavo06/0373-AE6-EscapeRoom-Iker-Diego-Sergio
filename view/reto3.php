<?php
// Arrancamos la sesion para poder leer los datos guardados
session_start();

// Si no tiene reto1 en sesion es que no ha hecho login, lo echamos al inicio
if (!isset($_SESSION['reto1'])) {
    header('Location: ../index.php');
    exit;
}

// Para llegar al reto 3 hay que haber superado el reto 1 y el reto 2
// Miramos cual falta exactamente para mandarlo al sitio correcto
if (!isset($_SESSION['reto3'])) {
    if (!isset($_SESSION['reto2'])) {
        // No ha superado ni el reto 1 todavia (reto2 se desbloquea al pasar reto1)
        echo '<script>alert("¡Eh, para el carro! Tienes que superar el Reto 1 antes de acceder aquí."); window.location.href = "reto1.php";</script>';
    } else {
        // Tiene reto1 superado pero le falta el reto 2
        echo '<script>alert("¡Eh, para el carro! Tienes que superar el Reto 2 antes de acceder aquí."); window.location.href = "reto2.php";</script>';
    }
    exit; // paramos aqui en los dos casos, no cargamos el resto de la pagina
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
    <title>Reto 3 - Programación | Aula 404</title>
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

        <!-- Barra de progreso, 75% porque estamos en el reto 3 de 4 -->
        <div class="envoltorio-progreso">
            <div class="barra-progreso">
                <!-- Cada reto es un 25%, llevamos 3 asi que 75% -->
                <div class="relleno-progreso" style="width: 75%;"></div>
            </div>
        </div>

        <!-- fila divide la pantalla en columna grande con el formulario y columna pequeña con pistas -->
        <div class="fila">

            <!-- Columna grande: formulario con las preguntas del reto -->
            <div class="columna-8">
                <div class="tarjeta tarjeta-reto">
                    <h2>Reto 3 — Programación</h2>
                    <p>Ya queda poco. El antivirus del profe solo deja pasar a los que saben programar. Nada raro, cosas básicas de PHP que vimos en clase:</p>

                    <!-- Si proc.php nos devuelve con ?msg= en la URL mostramos el error -->
                    <?php if (isset($_GET['msg'])): ?>
                        <div class="mensaje-error">
                            <strong>No es eso...</strong> <?php echo htmlspecialchars($_GET['msg']); ?>
                        </div>
                    <?php endif; ?>

                    <!-- El formulario envia los datos por POST a proc.php -->
                    <form action="../proc/proc.php" method="post">

                        <!-- Campo oculto para que proc.php sepa que bloque ejecutar -->
                        <input type="hidden" name="pantalla" value="reto3">

                        <!-- Pregunta 1: input numerico, la respuesta es un numero -->
                        <div class="grupo-formulario">
                            <label for="resultado">En PHP, ¿cuánto da <span class="resaltado">5 + 3 * 2</span>?</label>
                            <input type="number" name="resultado" id="resultado" placeholder="El resultado es..." required>
                        </div>

                        <!-- Pregunta 2: select con los tipos de datos de PHP -->
                        <div class="grupo-formulario">
                            <label for="tipo">¿Qué tipo de dato guarda los valores <span class="resaltado">true</span> o <span class="resaltado">false</span>?</label>
                            <select name="tipo" id="tipo" required>
                                <!-- disabled selected hace que salga por defecto pero no se pueda elegir -->
                                <option value="" disabled selected>— Elige un tipo de dato —</option>
                                <option value="int">int</option>
                                <option value="string">string</option>
                                <option value="float">float</option>
                                <option value="boolean">boolean</option>
                                <option value="array">array</option>
                            </select>
                        </div>

                        <!-- Pregunta 3: radio buttons con los tipos de bucle de PHP -->
                        <!-- Todos tienen name="bucle" para que sean del mismo grupo y solo se pueda marcar uno -->
                        <div class="grupo-formulario">
                            <label>¿Cómo se llama el bucle que se repite <span class="resaltado">mientras</span> se cumple algo?</label>
                            <div class="opciones-radio">
                                <label class="opcion-radio">
                                    <input type="radio" name="bucle" value="for" required>
                                    <span>for</span>
                                </label>
                                <label class="opcion-radio">
                                    <input type="radio" name="bucle" value="foreach">
                                    <span>foreach</span>
                                </label>
                                <label class="opcion-radio">
                                    <input type="radio" name="bucle" value="while">
                                    <span>while</span>
                                </label>
                                <label class="opcion-radio">
                                    <input type="radio" name="bucle" value="do-while">
                                    <span>do-while</span>
                                </label>
                            </div>
                        </div>

                        <!-- Al darle al boton se envia el formulario a proc.php -->
                        <button type="submit" class="boton boton-primario">Ejecutar codigo</button>
                    </form>
                </div>
            </div>

            <!-- Columna pequeña: pistas y estado del reto -->
            <div class="columna-4">
                <!-- Tarjeta con pistas por si no se acuerdan -->
                <div class="tarjeta">
                    <h2>Si no te acuerdas...</h2>
                    <p>Recuerda esto:</p>
                    <ul class="lista-pistas">
                        <li>El * va antes que el + (precedencia)</li>
                        <li>Los tipos primitivos de PHP: int, string, float, bool...</li>
                        <li>Hay 3 bucles: for, while, do-while</li>
                    </ul>
                </div>
                <!-- Tarjeta que muestra en que reto estamos -->
                <div class="tarjeta">
                    <h2>Estado</h2>
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