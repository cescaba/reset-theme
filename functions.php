<?php

// ── Versión del tema ────────────────────────────────────────────────────────
// Para actualizar: sube la nueva versión aquí Y en style.css, luego
// actualiza también el archivo update.json en tu servidor.
define( 'RESET_THEME_VERSION', '1.0.1' );

// URL del JSON de actualizaciones — cámbiala por la tuya antes de desplegar.
// El archivo update.json debe estar accesible públicamente.
// Formato del JSON: ver comentario al final de este archivo.
define( 'RESET_THEME_UPDATE_URL', 'https://tusitio.com/updates/reset-theme.json' );

// ── Comprobador de actualizaciones ─────────────────────────────────────────
add_filter( 'pre_set_site_transient_update_themes', 'reset_check_for_update' );
function reset_check_for_update( $transient ) {
    if ( empty( $transient->checked ) ) {
        return $transient;
    }

    $response = wp_remote_get( RESET_THEME_UPDATE_URL, [
        'timeout'    => 10,
        'user-agent' => 'WordPress/' . get_bloginfo( 'version' ),
    ] );

    if ( is_wp_error( $response ) || wp_remote_retrieve_response_code( $response ) !== 200 ) {
        return $transient;
    }

    $data = json_decode( wp_remote_retrieve_body( $response ) );

    if ( empty( $data->version ) || empty( $data->download_url ) ) {
        return $transient;
    }

    if ( version_compare( $data->version, RESET_THEME_VERSION, '>' ) ) {
        $transient->response[ get_template() ] = [
            'theme'       => get_template(),
            'new_version' => $data->version,
            'url'         => $data->details_url ?? '',
            'package'     => $data->download_url,
        ];
    }

    return $transient;
}

// ── Forzar comprobación al ver la lista de temas ───────────────────────────
add_action( 'load-themes.php', function() {
    delete_site_transient( 'update_themes' );
} );

function reset_theme_setup() {
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'reset_theme_setup' );

/*
 * ── Formato del archivo reset-theme.json ────────────────────────────────────
 * Sube este archivo a la URL definida en RESET_THEME_UPDATE_URL.
 * Actualízalo cada vez que saques una nueva versión del tema.
 *
 * {
 *   "version":      "1.1.0",
 *   "download_url": "https://tusitio.com/updates/reset-theme-1.1.0.zip",
 *   "details_url":  "https://tusitio.com/updates/reset-theme-changelog"
 * }
 *
 * Pasos para publicar una actualización:
 *   1. Sube la versión en esta constante y en style.css (ej: 1.1.0)
 *   2. Empaqueta el tema en un .zip (carpeta reset-theme/)
 *   3. Sube el .zip a tu servidor
 *   4. Actualiza reset-theme.json con la nueva versión y la URL del .zip
 *   5. WordPress detectará la actualización en el próximo chequeo (o al visitar
 *      Apariencia → Temas en el dashboard del cliente)
 * ────────────────────────────────────────────────────────────────────────── */

// ── Crear tabla al activar el tema ──────────────────────────────────────────
function reset_create_table() {
    global $wpdb;
    $table  = $wpdb->prefix . 'reset_registros';
    $charset = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $table (
        id         BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
        nombre     VARCHAR(200)    NOT NULL DEFAULT '',
        email      VARCHAR(200)    NOT NULL,
        fecha      DATETIME        NOT NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id),
        UNIQUE KEY email (email)
    ) $charset;";

    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta( $sql );
}
add_action( 'after_switch_theme', 'reset_create_table' );

// ── AJAX: guardar registro (público) ────────────────────────────────────────
function reset_guardar_registro() {
    check_ajax_referer( 'reset_nonce', 'nonce' );

    // ── Anti-bot: honeypot ──────────────────────────────────────────────────
    if ( ! empty( $_POST['website'] ) ) {
        wp_send_json_error( [ 'msg' => 'Spam detectado.' ], 403 );
    }

    // ── Anti-bot: timestamp firmado ─────────────────────────────────────────
    $form_loaded = (int) ( $_POST['form_loaded'] ?? 0 );
    $form_token  = sanitize_text_field( $_POST['form_token'] ?? '' );

    $token_actual   = wp_hash( floor( time() / 60 )        . 'reset_form' );
    $token_anterior = wp_hash( floor( ( time() - 60 ) / 60 ) . 'reset_form' );

    if ( $form_token !== $token_actual && $form_token !== $token_anterior ) {
        wp_send_json_error( [ 'msg' => 'Token inválido.' ], 403 );
    }

    if ( $form_loaded > 0 && time() - $form_loaded < 3 ) {
        wp_send_json_error( [ 'msg' => 'Envío demasiado rápido.' ], 403 );
    }

    // ── Datos ───────────────────────────────────────────────────────────────
    $nombre = sanitize_text_field( $_POST['nombre'] ?? '' );
    $email  = sanitize_email( $_POST['email'] ?? '' );

    if ( ! is_email( $email ) ) {
        wp_send_json_error( [ 'msg' => 'Email no válido.' ], 400 );
    }

    global $wpdb;
    $table = $wpdb->prefix . 'reset_registros';

    $existe = $wpdb->get_var( $wpdb->prepare( "SELECT id FROM $table WHERE email = %s", $email ) );
    if ( $existe ) {
        wp_send_json_success( [ 'msg' => 'already' ] );
    }

    $wpdb->insert( $table, [
        'nombre' => $nombre,
        'email'  => $email,
        'fecha'  => current_time( 'mysql' ),
    ] );

    wp_send_json_success( [ 'msg' => 'ok' ] );
}
add_action( 'wp_ajax_reset_registro',        'reset_guardar_registro' );
add_action( 'wp_ajax_nopriv_reset_registro', 'reset_guardar_registro' );

// ── Pasar nonce + ajaxurl al front ──────────────────────────────────────────
function reset_enqueue_scripts() {
    wp_add_inline_script( 'jquery-core', '
        var resetAjax = ' . json_encode([
            'url'   => admin_url( 'admin-ajax.php' ),
            'nonce' => wp_create_nonce( 'reset_nonce' ),
        ]) . ';
    ', 'before' );
    wp_enqueue_script( 'jquery' );
}
add_action( 'wp_enqueue_scripts', 'reset_enqueue_scripts' );

// ── Menú en el backoffice ────────────────────────────────────────────────────
function reset_admin_menu() {
    add_menu_page(
        '(re)set · Registros',
        '(re)set Registros',
        'manage_options',
        'reset-registros',
        'reset_admin_page',
        'dashicons-email-alt',
        30
    );
}
add_action( 'admin_menu', 'reset_admin_menu' );

// ── Exportar CSV ─────────────────────────────────────────────────────────────
function reset_export_csv() {
    if (
        ! isset( $_GET['reset_export'] ) ||
        ! current_user_can( 'manage_options' ) ||
        ! check_admin_referer( 'reset_export_csv' )
    ) return;

    global $wpdb;
    $table = $wpdb->prefix . 'reset_registros';
    $rows  = $wpdb->get_results( "SELECT nombre, email, fecha FROM $table ORDER BY fecha DESC", ARRAY_A );

    header( 'Content-Type: text/csv; charset=utf-8' );
    header( 'Content-Disposition: attachment; filename="reset-registros-' . date('Y-m-d') . '.csv"' );

    $out = fopen( 'php://output', 'w' );
    fprintf( $out, chr(0xEF) . chr(0xBB) . chr(0xBF) ); // BOM para Excel
    fputcsv( $out, [ 'Nombre', 'Email', 'Fecha' ] );
    foreach ( $rows as $row ) {
        fputcsv( $out, $row );
    }
    fclose( $out );
    exit;
}
add_action( 'admin_init', 'reset_export_csv' );

// ── Página de admin ──────────────────────────────────────────────────────────
function reset_admin_page() {
    global $wpdb;
    $table = $wpdb->prefix . 'reset_registros';
    $total = (int) $wpdb->get_var( "SELECT COUNT(*) FROM $table" );
    $rows  = $wpdb->get_results( "SELECT * FROM $table ORDER BY fecha DESC" );
    $export_url = wp_nonce_url(
        add_query_arg( 'reset_export', '1', admin_url( 'admin.php?page=reset-registros' ) ),
        'reset_export_csv'
    );
    ?>
    <div class="wrap">
        <h1 style="display:flex;align-items:center;gap:16px;">
            (re)set · Registros
            <span style="font-size:14px;font-weight:400;background:#f0f0f0;padding:4px 12px;border-radius:20px;">
                <?php echo $total; ?> registros
            </span>
        </h1>

        <p>
            <a href="<?php echo esc_url( $export_url ); ?>" class="button button-primary">
                ⬇ Descargar CSV
            </a>
        </p>

        <?php if ( empty( $rows ) ) : ?>
            <p>Aún no hay registros.</p>
        <?php else : ?>
        <table class="wp-list-table widefat fixed striped" style="margin-top:16px;">
            <thead>
                <tr>
                    <th style="width:40px;">#</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ( $rows as $r ) : ?>
                <tr>
                    <td><?php echo (int) $r->id; ?></td>
                    <td><?php echo esc_html( $r->nombre ); ?></td>
                    <td><?php echo esc_html( $r->email ); ?></td>
                    <td><?php echo esc_html( $r->fecha ); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>
    <?php
}
