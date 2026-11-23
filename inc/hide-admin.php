<?php
/**
 * (re)set · Acceso oculto al backoffice
 *
 * El login solo se abre en /explore. Para visitantes sin sesión,
 * /wp-login.php y /wp-admin/ responden 404. Una vez dentro, /wp-admin/ funciona normal.
 *
 * Desactivar en emergencia (p. ej. si algo falla): en wp-config.php añade
 *     define( 'RESET_HIDE_ADMIN', false );
 * Cambiar la ruta:
 *     define( 'RESET_ADMIN_SLUG', 'otra-ruta' );
 */

if ( ! defined( 'ABSPATH' ) ) exit;

function reset_hide_admin_enabled() {
	return ! defined( 'RESET_HIDE_ADMIN' ) || RESET_HIDE_ADMIN;
}

function reset_admin_slug() {
	$slug = defined( 'RESET_ADMIN_SLUG' ) ? (string) RESET_ADMIN_SLUG : 'explore';
	return strtolower( trim( $slug, '/' ) ) ?: 'explore';
}

// Ruta pedida, sin barras y relativa a la home (por si el sitio vive en un subdirectorio).
function reset_request_path() {
	$uri  = isset( $_SERVER['REQUEST_URI'] ) ? wp_unslash( $_SERVER['REQUEST_URI'] ) : '';
	$path = (string) wp_parse_url( $uri, PHP_URL_PATH );
	$base = (string) wp_parse_url( home_url( '/' ), PHP_URL_PATH );
	if ( $base !== '' && $base !== '/' && strpos( $path, $base ) === 0 ) {
		$path = substr( $path, strlen( $base ) );
	}
	return strtolower( trim( rawurldecode( $path ), '/' ) );
}

function reset_admin_not_found() {
	status_header( 404 );
	nocache_headers();
	header( 'Content-Type: text/html; charset=utf-8' );
	echo '<!DOCTYPE html><html lang="es"><head><meta charset="utf-8"><title>404</title></head><body><h1>404 Not Found</h1></body></html>';
	exit;
}

function reset_admin_gate() {
	if ( ! reset_hide_admin_enabled() ) return;
	if ( defined( 'WP_CLI' ) || wp_doing_cron() ) return;

	$path = reset_request_path();

	// /explore → pantalla de login de WordPress.
	if ( $path === reset_admin_slug() ) {
		// wp-login.php se carga desde esta función: sus variables de "ámbito global" deben seguir siéndolo.
		global $pagenow, $error, $interim_login, $action;
		$pagenow = 'wp-login.php';
		require_once ABSPATH . 'wp-login.php';
		exit;
	}

	// Entrada directa al login original: no existe.
	if ( $path === 'wp-login.php' ) {
		reset_admin_not_found();
	}

	// /wp-admin/ sin sesión: no existe. Se permiten los archivos que usa la web pública
	// (formulario por admin-ajax) y la propia pantalla de login (estilos/scripts concatenados).
	if ( $path === 'wp-admin' || strpos( $path, 'wp-admin/' ) === 0 ) {
		$allowed = [ 'admin-ajax.php', 'admin-post.php', 'load-styles.php', 'load-scripts.php' ];
		if ( ! is_user_logged_in() && ! in_array( basename( $path ), $allowed, true ) ) {
			reset_admin_not_found();
		}
	}
}
add_action( 'init', 'reset_admin_gate', 1 );

// Todas las URLs que WordPress genera hacia wp-login.php pasan a /explore
// (formularios, "olvidé mi contraseña", logout, contraseña de entradas protegidas…).
function reset_admin_rewrite_login_url( $url ) {
	if ( ! reset_hide_admin_enabled() || strpos( $url, 'wp-login.php' ) === false ) return $url;
	return str_replace( 'wp-login.php', reset_admin_slug(), $url );
}
add_filter( 'site_url', 'reset_admin_rewrite_login_url', 10, 1 );
add_filter( 'wp_redirect', 'reset_admin_rewrite_login_url', 10, 1 );

// WordPress redirige /login, /admin y /dashboard al login: eso delataría la ruta.
add_action( 'init', function() {
	if ( reset_hide_admin_enabled() ) {
		remove_action( 'template_redirect', 'wp_redirect_admin_locations', 1000 );
	}
} );
