<?php
/**
 * (re)set · Formulario de Eventos
 *
 * - Tabla propia (wp_reset_eventos), separada de los registros de Contacto.
 * - Acción AJAX pública reset_evento (mismo antispam que Contacto).
 * - Aviso por email a la dirección configurada en (re)set Contenidos → Eventos → Formulario.
 * - Pantalla "(re)set Eventos" en el menú del admin con el listado y descarga CSV.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'RESET_EVENTS_DB_VERSION', '1.0.0' );

function reset_events_table() {
	global $wpdb;
	return $wpdb->prefix . 'reset_eventos';
}

// ── Tabla ─────────────────────────────────────────────────────────────────────
function reset_events_maybe_create_table() {
	if ( get_option( 'reset_events_db_version' ) === RESET_EVENTS_DB_VERSION ) return;

	global $wpdb;
	$table   = reset_events_table();
	$charset = $wpdb->get_charset_collate();

	require_once ABSPATH . 'wp-admin/includes/upgrade.php';
	dbDelta( "CREATE TABLE $table (
		id      BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
		nombre  VARCHAR(200)    NOT NULL DEFAULT '',
		email   VARCHAR(200)    NOT NULL DEFAULT '',
		subject VARCHAR(255)    NOT NULL DEFAULT '',
		message LONGTEXT        NULL,
		fecha   DATETIME        NOT NULL DEFAULT CURRENT_TIMESTAMP,
		PRIMARY KEY  (id)
	) $charset;" );

	update_option( 'reset_events_db_version', RESET_EVENTS_DB_VERSION );
}
add_action( 'after_setup_theme', 'reset_events_maybe_create_table' );

// ── Destinatarios del aviso ───────────────────────────────────────────────────
function reset_events_recipients() {
	$raw = (string) reset_content( 'events', 'notify_email' );
	$out = [];
	foreach ( preg_split( '/[,;\s]+/', $raw ) as $addr ) {
		$addr = sanitize_email( $addr );
		if ( $addr !== '' && is_email( $addr ) ) $out[] = $addr;
	}
	return $out ? array_values( array_unique( $out ) ) : [ get_option( 'admin_email' ) ];
}

// ── AJAX: guardar mensaje de evento (público) ─────────────────────────────────
function reset_guardar_evento() {
	reset_form_guard();

	$nombre  = sanitize_text_field( $_POST['nombre'] ?? $_POST['name'] ?? '' );
	$email   = sanitize_email( $_POST['email'] ?? '' );
	$subject = sanitize_text_field( $_POST['subject'] ?? '' );
	$message = sanitize_textarea_field( $_POST['message'] ?? '' );

	if ( ! is_email( $email ) ) {
		wp_send_json_error( [ 'msg' => 'Email no válido.' ], 400 );
	}

	global $wpdb;
	$result = $wpdb->insert( reset_events_table(), [
		'nombre'  => $nombre,
		'email'   => $email,
		'subject' => $subject,
		'message' => $message,
		'fecha'   => current_time( 'mysql' ),
	] );

	if ( $result === false ) {
		error_log( 'Reset: Error inserting evento - ' . $wpdb->last_error );
		wp_send_json_error( [ 'msg' => 'Error al guardar.' ], 500 );
	}

	// Aviso por email. Si falla el envío, el mensaje ya está guardado en el panel.
	$site    = wp_specialchars_decode( get_bloginfo( 'name' ), ENT_QUOTES );
	$subj    = sprintf( '[%s · Eventos] %s', $site, $subject !== '' ? $subject : 'Nuevo mensaje' );
	$body    = "Nuevo mensaje desde el formulario de Eventos\n\n"
	         . "Nombre: {$nombre}\n"
	         . "Email: {$email}\n"
	         . "Asunto: {$subject}\n\n"
	         . "Mensaje:\n{$message}\n";
	$headers = [ 'Content-Type: text/plain; charset=UTF-8' ];
	if ( $nombre !== '' ) {
		$headers[] = 'Reply-To: ' . str_replace( [ '"', ',', '<', '>' ], '', $nombre ) . ' <' . $email . '>';
	} else {
		$headers[] = 'Reply-To: ' . $email;
	}

	if ( ! wp_mail( reset_events_recipients(), $subj, $body, $headers ) ) {
		error_log( 'Reset: no se pudo enviar el aviso del formulario de Eventos.' );
	}

	wp_send_json_success( [ 'msg' => 'ok' ] );
}
add_action( 'wp_ajax_reset_evento',        'reset_guardar_evento' );
add_action( 'wp_ajax_nopriv_reset_evento', 'reset_guardar_evento' );

// ── Admin: menú, listado y CSV ────────────────────────────────────────────────
add_action( 'admin_menu', function() {
	add_menu_page( '(re)set · Eventos', '(re)set Eventos', 'manage_options', 'reset-eventos', 'reset_events_admin_page', 'dashicons-calendar-alt', 31 );
} );

function reset_events_export_csv() {
	if (
		! isset( $_GET['reset_events_export'] ) ||
		! current_user_can( 'manage_options' ) ||
		! check_admin_referer( 'reset_events_export_csv' )
	) return;

	global $wpdb;
	$table = reset_events_table();
	$rows  = $wpdb->get_results( "SELECT nombre, email, subject, message, fecha FROM $table ORDER BY fecha DESC", ARRAY_A );

	header( 'Content-Type: text/csv; charset=utf-8' );
	header( 'Content-Disposition: attachment; filename="reset-eventos-' . date( 'Y-m-d' ) . '.csv"' );

	$out = fopen( 'php://output', 'w' );
	fprintf( $out, chr( 0xEF ) . chr( 0xBB ) . chr( 0xBF ) ); // BOM para Excel
	fputcsv( $out, [ 'Nombre', 'Email', 'Asunto', 'Mensaje', 'Fecha' ] );
	foreach ( $rows as $row ) fputcsv( $out, $row );
	fclose( $out );
	exit;
}
add_action( 'admin_init', 'reset_events_export_csv' );

function reset_events_admin_page() {
	if ( ! current_user_can( 'manage_options' ) ) return;

	global $wpdb;
	$table = reset_events_table();
	$total = (int) $wpdb->get_var( "SELECT COUNT(*) FROM $table" );
	$rows  = $wpdb->get_results( "SELECT * FROM $table ORDER BY fecha DESC" );
	$export_url = wp_nonce_url(
		add_query_arg( 'reset_events_export', '1', admin_url( 'admin.php?page=reset-eventos' ) ),
		'reset_events_export_csv'
	);
	$settings_url = admin_url( 'admin.php?page=reset-contenidos-events' );
	?>
	<div class="wrap">
		<h1 style="display:flex;align-items:center;gap:16px;">
			(re)set · Eventos
			<span style="font-size:14px;font-weight:400;background:#f0f0f0;padding:4px 12px;border-radius:20px;">
				<?php echo (int) $total; ?> mensajes
			</span>
		</h1>

		<p>
			Los mensajes del formulario de Eventos llegan a:
			<strong><?php echo esc_html( implode( ', ', reset_events_recipients() ) ); ?></strong>
			· <a href="<?php echo esc_url( $settings_url ); ?>">Cambiar destinatario</a>
		</p>

		<p>
			<a href="<?php echo esc_url( $export_url ); ?>" class="button button-primary">⬇ Descargar CSV</a>
		</p>

		<?php if ( empty( $rows ) ) : ?>
			<p>Aún no hay mensajes.</p>
		<?php else : ?>
		<table class="wp-list-table widefat fixed striped" style="margin-top:16px;">
			<thead>
				<tr>
					<th style="width:40px;">#</th>
					<th>Nombre</th>
					<th>Email</th>
					<th>Asunto</th>
					<th style="width:35%;">Mensaje</th>
					<th>Fecha</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ( $rows as $r ) : ?>
				<tr>
					<td><?php echo (int) $r->id; ?></td>
					<td><?php echo esc_html( $r->nombre ); ?></td>
					<td><a href="mailto:<?php echo esc_attr( $r->email ); ?>"><?php echo esc_html( $r->email ); ?></a></td>
					<td><?php echo esc_html( $r->subject ); ?></td>
					<td><?php echo nl2br( esc_html( (string) $r->message ) ); ?></td>
					<td><?php echo esc_html( $r->fecha ); ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<?php endif; ?>
	</div>
	<?php
}
