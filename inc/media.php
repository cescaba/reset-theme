<?php
/**
 * (re)set · Medios flexibles
 * Cualquier campo de imagen o vídeo del panel acepta ambos: la web pinta <img> o <video>
 * según el archivo elegido.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

function reset_media_ext( $url ) {
	return strtolower( pathinfo( (string) wp_parse_url( (string) $url, PHP_URL_PATH ), PATHINFO_EXTENSION ) );
}

function reset_media_is_video( $url ) {
	return in_array( reset_media_ext( $url ), [ 'mp4', 'webm', 'mov', 'm4v', 'ogv' ], true );
}

// Devuelve <video> (autoplay, mudo, en bucle) o <img>. Vacío si no hay archivo.
function reset_media_html( $url, $alt = '', $class = '' ) {
	$url = trim( (string) $url );
	if ( $url === '' ) return '';
	$cls = $class !== '' ? ' class="' . esc_attr( $class ) . '"' : '';

	if ( reset_media_is_video( $url ) ) {
		// .mov se declara como mp4, igual que antes: los navegadores lo reproducen igual.
		$types = [ 'webm' => 'video/webm', 'ogv' => 'video/ogg' ];
		$type  = $types[ reset_media_ext( $url ) ] ?? 'video/mp4';
		$label = $alt !== '' ? ' aria-label="' . esc_attr( $alt ) . '"' : ' aria-hidden="true"';
		return '<video' . $cls . ' autoplay muted loop playsinline preload="metadata"' . $label . '><source src="' . esc_url( $url ) . '" type="' . esc_attr( $type ) . '"></video>';
	}

	return '<img' . $cls . ' src="' . esc_url( $url ) . '" alt="' . esc_attr( $alt ) . '">';
}
