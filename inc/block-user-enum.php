<?php
/**
 * (re)set · Bloqueo de enumeración de usuarios
 *
 * Evita que un visitante sin sesión descubra los nombres de usuario:
 * ?author=N y /author/…, REST /wp/v2/users, oEmbed, sitemap de usuarios,
 * mensajes de login y de "olvidé mi contraseña", y XML-RPC.
 *
 * Desactivar en emergencia: define( 'RESET_BLOCK_USER_ENUM', false ); en wp-config.php
 */

if ( ! defined( 'ABSPATH' ) ) exit;

function reset_block_user_enum_enabled() {
	return ! defined( 'RESET_BLOCK_USER_ENUM' ) || RESET_BLOCK_USER_ENUM;
}

// 1) ?author=N, ?author_name= y /author/slug/ → 404.
//    Prioridad 1: debe ir antes de redirect_canonical, que convertiría ?author=1 en /author/admin/.
add_action( 'template_redirect', function() {
	if ( ! reset_block_user_enum_enabled() || is_user_logged_in() || ! is_author() ) return;
	global $wp_query;
	$wp_query->set_404();
	status_header( 404 );
	nocache_headers();
}, 1 );

// 2) REST: sin sesión no existe el listado de usuarios.
add_filter( 'rest_endpoints', function( $endpoints ) {
	if ( ! reset_block_user_enum_enabled() || is_user_logged_in() ) return $endpoints;
	foreach ( array_keys( $endpoints ) as $route ) {
		if ( strpos( $route, '/wp/v2/users' ) === 0 ) unset( $endpoints[ $route ] );
	}
	return $endpoints;
} );

// 3) oEmbed publica author_name / author_url.
add_filter( 'oembed_response_data', function( $data ) {
	if ( reset_block_user_enum_enabled() ) unset( $data['author_name'], $data['author_url'] );
	return $data;
} );

// 4) Sitemap de usuarios.
add_filter( 'wp_sitemaps_add_provider', function( $provider, $name ) {
	return ( reset_block_user_enum_enabled() && $name === 'users' ) ? false : $provider;
}, 10, 2 );

// 5) Login: mismo mensaje exista o no el usuario (WordPress distingue "usuario inválido" de "contraseña incorrecta").
add_filter( 'authenticate', function( $user ) {
	if ( ! reset_block_user_enum_enabled() || ! is_wp_error( $user ) ) return $user;
	if ( array_intersect( $user->get_error_codes(), [ 'invalid_username', 'invalid_email', 'incorrect_password' ] ) ) {
		$msg = strpos( determine_locale(), 'es' ) === 0 ? 'Usuario o contraseña incorrectos.' : 'Incorrect username or password.';
		return new WP_Error( 'invalid_credentials', '<strong>Error:</strong> ' . $msg );
	}
	return $user;
}, 100 );

// 6) "Olvidé mi contraseña": respuesta idéntica exista o no la cuenta.
add_action( 'lostpassword_post', function( $errors, $user_data = false ) {
	if ( ! reset_block_user_enum_enabled() || ! is_wp_error( $errors ) ) return;
	// Campo vacío: se deja el aviso normal (no revela nada). Cuenta inexistente: mismo resultado que si existiera.
	if ( in_array( 'empty_username', $errors->get_error_codes(), true ) ) return;
	if ( ! $user_data || in_array( 'invalid_email', $errors->get_error_codes(), true ) ) {
		wp_safe_redirect( site_url( 'wp-login.php?checkemail=confirm' ) );
		exit;
	}
}, 10, 2 );

// 7) XML-RPC (también permite probar usuarios y contraseñas).
add_filter( 'xmlrpc_enabled', function( $enabled ) {
	return reset_block_user_enum_enabled() ? false : $enabled;
} );
