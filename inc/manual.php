<?php
/**
 * (re)set · Manual de uso
 *
 * Sirve tutorial/index.html (y tutorial/shots/*) en /manual/, solo para usuarios
 * con sesión que puedan editar páginas. Para el resto de visitantes la ruta no existe (404).
 * Se ve dentro del panel en: (re)set Contenidos → Tutorial (iframe a /manual/).
 */

if ( ! defined( 'ABSPATH' ) ) exit;

function reset_manual_can_view() {
	return is_user_logged_in() && current_user_can( 'edit_pages' );
}

function reset_manual_gate() {
	$path = reset_request_path(); // definida en inc/hide-admin.php
	if ( $path !== 'manual' && strpos( $path, 'manual/' ) !== 0 ) return;

	$dir = get_template_directory() . '/tutorial';

	// Sin carpeta tutorial/ dejamos pasar la petición a WordPress (por si hay una página llamada "manual").
	if ( ! is_file( $dir . '/index.html' ) ) return;

	// Sin permiso, la ruta "no existe".
	if ( ! reset_manual_can_view() ) reset_admin_not_found();

	nocache_headers();
	header( 'X-Robots-Tag: noindex, nofollow' );
	header( 'X-Content-Type-Options: nosniff' );

	// /manual/shots/<imagen>
	if ( strpos( $path, 'manual/shots/' ) === 0 ) {
		$name = basename( substr( $path, strlen( 'manual/shots/' ) ) );
		$file = $dir . '/shots/' . $name;
		$type = wp_check_filetype( $name );
		if ( ! in_array( $type['ext'], [ 'jpg', 'jpeg', 'png', 'webp', 'gif' ], true ) || ! is_file( $file ) ) {
			reset_admin_not_found();
		}
		header( 'Content-Type: ' . $type['type'] );
		header( 'Content-Length: ' . filesize( $file ) );
		header( 'Cache-Control: private, max-age=3600' );
		readfile( $file );
		exit;
	}

	// /manual/ → el HTML, con las imágenes apuntando a la ruta protegida.
	if ( $path === 'manual' || $path === 'manual/' ) {
		$html = (string) file_get_contents( $dir . '/index.html' );
		$html = str_replace( 'src="shots/', 'src="' . esc_attr( home_url( '/manual/shots/' ) ), $html );
		header( 'Content-Type: text/html; charset=utf-8' );
		echo $html;
		exit;
	}

	reset_admin_not_found();
}
add_action( 'init', 'reset_manual_gate', 2 );

// Opción "Tutorial" en el menú (re)set Contenidos: abre el manual dentro del propio panel.
add_action( 'admin_menu', function() {
	if ( ! is_file( get_template_directory() . '/tutorial/index.html' ) ) return;
	add_submenu_page( 'reset-contenidos', 'Tutorial', 'Tutorial', 'edit_pages', 'reset-contenidos-tutorial', 'reset_manual_render_admin' );
}, 20 );

function reset_manual_render_admin() {
	if ( ! reset_manual_can_view() ) return;
	?>
	<div class="wrap" style="margin-right:0">
		<iframe src="<?php echo esc_url( home_url( '/manual/' ) ); ?>" title="Tutorial · Manual de uso"
			style="display:block;width:100%;height:calc(100vh - 110px);min-height:480px;border:1px solid #dcdcde;border-radius:4px;background:#fff"></iframe>
	</div>
	<?php
}
