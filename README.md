# reset-theme

Tema WordPress personalizado para **(re)set Functional Matcha Bar — Barcelona**. Es una página *coming soon* de una sola pantalla con formulario de registro y panel de administración integrado.

---

## Cómo funciona

### Estructura de la página

La página está dividida en dos columnas:

| Columna izquierda (`a-left`) | Columna derecha (`a-right`) |
|---|---|
| Titular, tagline y formulario de registro | Logo SVG grande e información de apertura |

En móvil las columnas se apilan verticalmente.

### Formulario de registro

El formulario recoge **nombre** y **email** y los guarda en una tabla propia de la base de datos (`wp_reset_registros`). Incluye tres capas anti-spam:

- **Honeypot** — campo oculto que los bots rellenan y los humanos no ven.
- **Token firmado** — se genera en el servidor al cargar la página y se valida al enviar.
- **Timestamp** — rechaza envíos que llegan menos de 3 segundos después de cargar el formulario.

### Panel de administración

Aparece en el menú lateral de WordPress como **"(re)set Registros"**. Muestra todos los registros en tabla y permite descargar un CSV con BOM (compatible con Excel) haciendo clic en **Descargar CSV**.

### Sistema de actualizaciones

El tema incluye un comprobador de actualizaciones propio. WordPress muestra la notificación de actualización en *Apariencia → Temas* cuando hay una versión nueva disponible en el servidor.

---

## Cómo modificar el tema

### Textos visibles

Todos los textos están en `index.php`. Busca y edita directamente:

| Qué cambiar | Dónde buscarlo en `index.php` |
|---|---|
| Titular principal | `class="a-headline"` |
| Subtítulo / tagline | `class="a-tagline"` |
| Texto del botón | `class="a-btn"` |
| Ciudad y fecha de apertura | `class="a-eyebrow"` |
| Dirección | `class="a-address"` |
| Link de Instagram | `class="a-social"` |
| Mensaje de confirmación | `id="successMsg"` |

### Colores

Los colores están definidos como variables CSS en `index.php`, dentro del bloque `:root`:

```css
:root {
  --ink-blue:    #AFCBDE;   /* fondo columna izquierda */
  --matcha:      #223E36;   /* color principal oscuro  */
  --warm-sand:   #F6F5F2;   /* fondo columna derecha   */
  --silk-white:  #F1F1DE;   /* color texto sobre botón */
  --matcha-mid:  #2E5246;
  --matcha-light:#4A7A67;   /* color acento / hover    */
}
```

Cambia el valor hexadecimal para actualizar el color en todo el sitio.

### Tipografías

El tema usa cuatro familias:

| Fuente | Uso | Origen |
|---|---|---|
| **Exposure** | Cuerpo, titular nav | Archivo local `/fonts/exposure/` |
| **Exposure -10** | Dirección en columna derecha | Archivo local `/fonts/exposure/` |
| **ABC Diatype** | Labels, formulario, botones | Archivo local `/fonts/abc-diatype/` |
| **DM Serif Display** | Titular principal grande | Google Fonts |
| **Fragment Mono** | Tagline | Google Fonts |

Para cambiar una fuente, edita la línea `font-family:` del selector correspondiente en `index.php`.

### Logo SVG

El SVG principal está en `assets/images/reset_matcha.svg`. Reemplaza el archivo manteniendo el mismo nombre, o cambia la ruta en `index.php`:

```php
<img src="<?php echo get_template_directory_uri(); ?>/assets/images/reset_matcha.svg" alt="(re)set">
```

---

## Publicar una nueva versión

1. Actualiza el número de versión en `functions.php` (constante `RESET_THEME_VERSION`) y en el encabezado de `style.css`.
2. Empaqueta la carpeta del tema en un `.zip`.
3. Sube el `.zip` a tu servidor.
4. Actualiza el archivo `reset-theme.json` en el servidor con la nueva versión y la URL del `.zip`:

```json
{
  "version":      "1.1.0",
  "download_url": "https://tusitio.com/updates/reset-theme-1.1.0.zip",
  "details_url":  "https://tusitio.com/updates/reset-theme-changelog"
}
```

5. WordPress mostrará la actualización disponible en *Apariencia → Temas*.

---

## Deploy automático

Cada push a la rama `main` despliega los archivos al servidor automáticamente vía FTP usando GitHub Actions (`.github/workflows/deploy.yml`).

Las credenciales se configuran en **Settings → Secrets and variables → Actions** del repositorio:

| Secret | Valor |
|---|---|
| `FTP_SERVER` | Dirección del servidor FTP |
| `FTP_USERNAME` | Usuario FTP |
| `FTP_PASSWORD` | Contraseña FTP |
