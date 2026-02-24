# 🔬 Escape Room - El Laboratorio Secreto

App web PHP con sistema de sesiones para la práctica de formularios ASIX1.

## Estructura del proyecto

```
escape_room/
├── index.php               ← Página de bienvenida
├── css/
│   └── styles.css          ← Única hoja de estilos (responsive)
├── proc/
│   └── proc.php            ← Procesador central (validación PHP)
├── view/
│   ├── reto1.php           ← Reto 1: Sistemas numéricos
│   ├── reto2.php           ← Reto 2: Redes y protocolos
│   ├── reto3.php           ← Reto 3: Programación
│   ├── reto4.php           ← Reto 4: Hardware
│   └── congrats.php        ← Página final Congratulations
└── W3C/                    ← Capturas validación W3C
```

## Respuestas correctas

| Reto | Campo | Respuesta |
|------|-------|-----------|
| Reto 1 | 42 en binario | `101010` |
| Reto 1 | 255 en hexadecimal | `ff` |
| Reto 1 | 8 en octal | `10` |
| Reto 2 | Puerto HTTP | `80` |
| Reto 2 | Protocolo envío email | `smtp` |
| Reto 2 | Máscara clase C | `255.255.255.0` |
| Reto 3 | Resultado 5+3*2 | `11` |
| Reto 3 | Tipo true/false | `boolean` |
| Reto 3 | Bucle con condición | `while` |
| Reto 4 | Arquitectura Apple M1 | `arm` |
| Reto 4 | Memoria volátil | `ram` |
| Reto 4 | Unidad mínima info | `bit` |

> Las respuestas son **case insensitive** (da igual mayúsculas o minúsculas)

## Despliegue en hosting gratuito

### Opción recomendada: InfinityFree (https://infinityfree.net)
1. Regístrate gratis en infinityfree.net
2. Crea una cuenta de hosting
3. Accede al Panel → File Manager → htdocs
4. Sube todos los archivos del proyecto
5. Accede a tu dominio gratuito (ej: tuusuario.infinityfreeapp.com)

### Otras opciones gratuitas con PHP:
- **000webhost** (hostinger.com/free-web-hosting)
- **FreeHostingNoAds** (freehostingnoads.net)
- **AwardSpace** (awardspace.com)

## Tecnologías usadas
- PHP 7+ con sesiones (`session_start()`, `$_SESSION`)
- HTML5 válido W3C
- CSS3 con layout de filas y columnas (sin frameworks)
- Responsive con un punto de corte a 768px

> **Nota:** todas las clases CSS están escritas en castellano y buscan describir su función
> (ej. `tarjeta`, `fila`, `columna-8`, `lista-pistas`, `mensaje-error`, `boton-primario`).

## Cómo funciona (sesiones)
Igual que el ejemplo del profesor (pokemon misterioso):
1. Al completar cada reto, se guarda `$_SESSION['retoN'] = 'activo'`
2. Cada página verifica con `if (!isset($_SESSION['retoN']))` antes de mostrarse
3. Si no tiene permiso, redirige a `index.php`
4. Al hacer replay, `session_destroy()` limpia todo
