<?php
/**
 * (re)set · Contenidos editables por página
 * Sidebar admin: una sección por página + Global.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'RESET_CONTENT_GROUPS', [ 'inicio', 'story', 'contact', 'coming', 'global' ] );

// ── Defaults (valores actuales del theme) ─────────────────────────────────────
function reset_content_defaults() {
	$uri = get_template_directory_uri();
	return [
		'inicio' => [
			'hero_title'         => 'Born<br>to<br><i class="font-italic">elevate.</i>',
			'hero_desc'          => 'Functional Matcha Bar Barcelona.',
			'hero_video'         => $uri . '/assets/images/bg-home.mp4',
			'hero_video_mobile'  => $uri . '/assets/images/bg-home-mobile.mov',
			'info_title'         => 'We combine high-quality matcha with functional superfoods.',
			'info_img1'          => $uri . '/assets/images/info-matcha-1.png',
			'info_img2'          => $uri . '/assets/images/info-matcha-2.png',
			'signature_title'    => "Our signature<br>Matcha Drinks",
			'signature_products' => "Matcha latte Caliente / Frío | Matcha ceremonial con tu leche favorita\nPistachio cloud | Matcha latte frío con crema de pistacho\nStrawberry cloud | Matcha latte frío con crema de fresa\nReset cloud | Matcha latte frío con crema de espirulina",
			'grid_title'         => "Crafted for<br>body & mind",
			'grid_desc'          => 'Funcional matcha blends made with premium ingredients and purpose.',
			'grid_link_text'     => 'Full menu →',
			'grid_link_url'      => '#',
			'grid_products'      => "Reset Matcha | Matcha latte frío con crema de fresa | {$uri}/assets/images/matcha-can-2.png\nCalm Matcha | Matcha latte frío con crema de fresa | {$uri}/assets/images/matcha-can-3.png\nFocus Latte | Matcha latte frío con crema de fresa | {$uri}/assets/images/matcha-can-4.png\nCitrus Matcha | Matcha latte frío con crema de fresa | {$uri}/assets/images/matcha-can-2.png",
			'space_label'        => 'Our space',
			'space_title'        => '<i>Born in</i><br>BARCELONA',
			'space_addr1'        => 'C/ Casanova 189',
			'space_addr2'        => 'Barcelona',
			'space_img'          => $uri . '/assets/images/bg-space.png',
			'space_map_text'     => 'View map',
			'space_map_url'      => '#',
			'rhythm_title'       => "(re)set<br>your rhythm",
			'rhythm_sub'         => "Premium matcha<br>for mindfull moments",
			'rhythm_img1'        => $uri . '/assets/images/sc-rhythm-1.png',
			'rhythm_img2'        => $uri . '/assets/images/sc-rhythm-2.png',
		],
		'story' => [
			'hero_title'   => 'Born from a simple idea.',
			'hero_desc'    => 'Energy should feel good.',
			'hero_footer'  => 'Clarity, balance & presence',
			'hero_bg'      => $uri . '/assets/images/bg-page-2.png',
			'rituals_sub'   => 'We don’t serve drinks',
			'rituals_title' => 'We create rituals',
			'rituals_desc'  => 'Ceremonial grade. Traceable origin. Paired with functional superfoods chosen one by one.',
			'way_img'   => $uri . '/assets/images/story-way.png',
			'way_title' => 'A way to keep going',
			'way_desc'  => 'Why is coffee the only option? We wanted clean, steady energy without the spike or the crash.',
			'way_btn'   => 'Our menu',
			'way_url'   => '/#crafted-body-mind',
			'purpose_label' => 'our purpose',
			'purpose_title' => '(re)set exists to help people take care of their energy',
			'purpose_col1'  => "To create a space\nwhere people feel good,",
			'purpose_col2'  => 'connect',
			'purpose_col3'  => "and slow down,\neven if just a moment",
			'purpose_bg'    => $uri . '/assets/images/bg-purpose.png',
			'beliefs_sub'   => 'what we believe in',
			'beliefs'       => [
				[ 'title' => 'CLEAN ENERGY', 'desc' => "Energy,\nwithout the chaos", 'icon' => $uri . '/assets/images/icon-energy.svg' ],
				[ 'title' => 'MENTAL CLARITY', 'desc' => "Focus,\nwithout the pressure", 'icon' => $uri . '/assets/images/icon-clarity.svg' ],
				[ 'title' => 'DAILY BALANCE', 'desc' => "Balance,\nwithout the effort", 'icon' => $uri . '/assets/images/icon-balance.svg' ],
			],
			'comm_bg'    => $uri . '/assets/images/bg-community.png',
			'comm_label' => 'our community',
			'comm_title' => '(re)set is a place to meet people who care about how they feel',
			'comm_desc'  => "Funcional drinks\nConversations that matter",
			'comm_btn'   => 'send us a message',
			'comm_url'   => '#',
			'space_bg'    => $uri . '/assets/images/bg-space-2.png',
			'space_label' => 'our space',
			'space_title' => 'Barcelona is our home. This is a place to slow down and reset',
			'space_desc'  => "C/ Casanova, 189\nBarcelona",
			'space_btn'   => 'visit our store',
			'space_url'   => '#',
			'promise_label' => 'our promise',
			'promise_title' => "Matcha that makes you <br>\n<span class=\"font-serif-italic\">feel good</span>",
			'promise_btn'   => 'explore menu',
			'promise_url'   => '/#crafted-body-mind',
			'promise_bg_mobile' => $uri . '/assets/images/bg-promise-powder.png',
		],
		'contact' => [
			'hero_pretitle' => "---Let's talk",
			'hero_title'    => 'Give us a call.',
			'hero_desc'     => 'Reservations, collaborations press - or just a hello. We answer fast.',
			'hero_bg'       => $uri . '/assets/images/bg-contact.png',
			'visit_addr1' => 'C/ Casanova 189',
			'visit_addr2' => 'Barcelona',
			'visit_link'  => 'view map →',
			'visit_url'   => '#',
			'hours_1' => 'Mon - Fri: <i>08-19</i>',
			'hours_2' => 'Sat: <i>10-17</i>',
			'hours_3' => 'Sun: <i>closed</i>',
			'email'   => 'info@resetmatchabar.com',
			'social'  => '@resetmatchabar',
			'social_url' => 'https://instagram.com/resetmatchabar',
			'form_img'   => $uri . '/assets/images/matcha-whisk.png',
			'form_title' => 'Send us a message',
			'find_label' => '--- How to find us',
			'find_title' => "L'Eixample esquerra, closely to Frances Macià Square.",
			'find_items' => "Metro | L5 - Hospital Clínic - 10min\nBus | Francesc Macià - 7, 33, 34, H8 - 2 min\nBike | Bicing C/ Londres 53 - 3 min.\nParking | Carrer de Buenos Aires 33. 2 min",
			'find_link'  => 'view map →',
			'find_url'   => '#',
			'find_img'   => $uri . '/assets/images/matcha-cans.png',
		],
		'coming' => [
			'eyebrow'       => 'Functional Matcha Bar · Barcelona',
			'headline'      => 'Born to elevate.',
			'tagline'       => "A functional matcha bar built\nfor people who want to feel better every day.",
			'video_desktop' => $uri . '/assets/images/bg-home.mov',
			'video_mobile'  => $uri . '/assets/images/bg-home-mobile.mov',
			'location'      => 'Opening soon',
			'address'       => "C/ Casanova 189\nBarcelona",
			'social'        => '@resetmatchabar',
			'social_url'    => 'https://www.instagram.com/resetmatchabar',
			'success_title' => 'Welcome — you’re officially part of the (re)set community.',
			'success_text'  => "We’re getting everything ready behind the scenes.\nSee you very soon.",
		],
		'global' => [
			'footer_title'  => 'Lets (re)set',
			'footer_social' => 'Follow us @resetmatchabar',
			'footer_social_url' => 'https://www.instagram.com/resetmatchabar',
		],
	];
}

// ── Helper para plantillas ────────────────────────────────────────────────────
function reset_content( $group, $key, $fallback = '' ) {
	$defaults = reset_content_defaults();
	$def = $defaults[ $group ][ $key ] ?? $fallback;
	$opt = get_option( 'reset_content_' . $group, [] );
	$val = ( isset( $opt[ $key ] ) && $opt[ $key ] !== '' ) ? $opt[ $key ] : $def;
	// Los campos 'html' se imprimen dentro de h1/h2/p: convertimos bloques
	// <p>…</p> en <br> para que los saltos ya guardados sigan funcionando.
	if ( is_string( $val ) && reset_content_field_type( $group, $key ) === 'html' ) {
		$val = reset_inline_html( $val );
	}
	return $val;
}

function reset_content_field_type( $group, $key ) {
	$schema = reset_content_schema();
	foreach ( ( $schema[ $group ]['sections'] ?? [] ) as $fields ) {
		foreach ( $fields as $f ) {
			if ( ( $f['key'] ?? '' ) === $key ) return $f['type'] ?? 'text';
		}
	}
	return 'text';
}

// "<p>a</p><p>b</p>" -> "a<br>b" ; "a\nb" -> "a<br>b" (campos inline en titulares).
function reset_inline_html( $html ) {
	$html = (string) $html;
	if ( strpos( $html, '<p' ) !== false ) {
		$html = preg_replace( '#</p>\s*<p[^>]*>#i', '<br>', $html );
		$html = preg_replace( '#</?p[^>]*>#i', '', $html );
	}
	// Saltos literales (pestaña Texto o textarea): a <br> sin duplicar los que ya hay.
	$html = preg_replace( '#(<br\s*/?>)\s*\r?\n#i', '$1', $html );
	$html = preg_replace( "#\r?\n\s*(<br\s*/?>)#i", '$1', $html );
	$html = preg_replace( "/\r\n|\r|\n/", '<br>', $html );
	return trim( $html );
}

// Parsea líneas "Nombre | Descripción | Imagen"
function reset_parse_lines( $text, $parts = 3 ) {
	$out = [];
	foreach ( preg_split( '/\r\n|\r|\n/', (string) $text ) as $line ) {
		$line = trim( $line );
		if ( $line === '' ) continue;
		// permite salto literal "\n" dentro de un campo usando comas? no: split por |
		$chunks = array_map( 'trim', explode( '|', $line ) );
		$chunks = array_pad( $chunks, $parts, '' );
		$out[] = array_slice( $chunks, 0, $parts );
	}
	return $out;
}

// Devuelve productos del grid normalizados: [ ['name'=>, 'desc'=>, 'image'=>], ... ]
// Soporta formato nuevo (array estructurado) y legacy (texto "Nombre | Desc | URL").
function reset_get_grid_products( $group = 'inicio', $key = 'grid_products' ) {
	$raw = reset_content( $group, $key, [] );
	if ( is_array( $raw ) ) {
		$out = [];
		foreach ( $raw as $row ) {
			if ( ! is_array( $row ) ) continue;
			$name  = trim( (string) ( $row['name'] ?? '' ) );
			$desc  = trim( (string) ( $row['desc'] ?? '' ) );
			$image = trim( (string) ( $row['image'] ?? '' ) );
			if ( $name === '' && $desc === '' && $image === '' ) continue;
			$out[] = [ 'name' => $name, 'desc' => $desc, 'image' => $image ];
		}
		if ( ! empty( $out ) ) return $out;
	}
	// Legacy: string con líneas
	$lines = reset_parse_lines( is_string( $raw ) ? $raw : '', 3 );
	$out = [];
	foreach ( $lines as $p ) {
		$out[] = [ 'name' => $p[0], 'desc' => $p[1], 'image' => $p[2] ];
	}
	return $out;
}

// Devuelve creencias normalizadas: [ ['title'=>, 'desc'=>, 'icon'=>], ... ]
// Soporta formato nuevo (array) y legacy (texto "TÍTULO | Desc | URL?").
function reset_get_beliefs( $group = 'story', $key = 'beliefs' ) {
	$defaults = reset_content_defaults();
	$fallback_icons = [];
	if ( isset( $defaults[ $group ][ $key ] ) && is_array( $defaults[ $group ][ $key ] ) ) {
		foreach ( $defaults[ $group ][ $key ] as $d ) {
			$fallback_icons[] = $d['icon'] ?? '';
		}
	}
	$raw = reset_content( $group, $key, [] );
	if ( is_array( $raw ) ) {
		$out = [];
		foreach ( $raw as $i => $row ) {
			if ( ! is_array( $row ) ) continue;
			$title = trim( (string) ( $row['title'] ?? '' ) );
			$desc  = trim( (string) ( $row['desc'] ?? '' ) );
			$icon  = trim( (string) ( $row['icon'] ?? '' ) );
			if ( $title === '' && $desc === '' && $icon === '' ) continue;
			if ( $icon === '' && isset( $fallback_icons[ $i ] ) ) $icon = $fallback_icons[ $i ];
			$out[] = [ 'title' => $title, 'desc' => $desc, 'icon' => $icon ];
		}
		if ( ! empty( $out ) ) return $out;
	}
	// Legacy: string con líneas
	$lines = reset_parse_lines( is_string( $raw ) ? $raw : '', 3 );
	$out = [];
	foreach ( $lines as $i => $p ) {
		$icon = isset( $p[2] ) && $p[2] !== '' ? $p[2] : ( $fallback_icons[ $i ] ?? '' );
		$out[] = [ 'title' => $p[0], 'desc' => $p[1], 'icon' => $icon ];
	}
	return $out;
}

// Temporal: aún no existe la página /menu; los botones de menú apuntan
// a la sección "Crafted for body & mind" de Inicio. Cuando exista /menu,
// basta con borrar esta función y usar las URLs tal cual.
function reset_menu_target_url( $url ) {
	$url = trim( (string) $url );
	if ( $url === '' ) {
		return home_url( '/#crafted-body-mind' );
	}
	$path  = parse_url( $url, PHP_URL_PATH );
	$clean = strtolower( trim( (string) ( $path !== null ? $path : $url ), '/' ) );
	if ( $clean === 'menu' ) {
		return home_url( '/#crafted-body-mind' );
	}
	if ( preg_match( '#^https?://#i', $url ) || $url[0] === '#' ) {
		return $url;
	}
	return home_url( $url );
}

// ── Esquema de campos (para pintar el admin) ──────────────────────────────────
function reset_content_schema() {
	return [
		'inicio' => [
			'title' => 'Inicio',
			'desc'  => 'Textos, imágenes y vídeos de la portada (plantilla Inicio + front-page).',
			'sections' => [
				'Hero' => [
					[ 'key' => 'hero_title', 'label' => 'Título hero', 'type' => 'html', 'desc' => 'Usa la barra del editor para saltos de línea, cursiva, etc.' ],
					[ 'key' => 'hero_desc', 'label' => 'Descripción hero', 'type' => 'text' ],
					[ 'key' => 'hero_video', 'label' => 'Vídeo escritorio', 'type' => 'video' ],
					[ 'key' => 'hero_video_mobile', 'label' => 'Vídeo móvil', 'type' => 'video' ],
				],
				'Frase + imágenes' => [
					[ 'key' => 'info_title', 'label' => 'Frase principal', 'type' => 'textarea' ],
					[ 'key' => 'info_img1', 'label' => 'Imagen 1', 'type' => 'image' ],
					[ 'key' => 'info_img2', 'label' => 'Imagen 2', 'type' => 'image' ],
				],
				'Signature drinks' => [
					[ 'key' => 'signature_title', 'label' => 'Título sección', 'type' => 'html' ],
					[ 'key' => 'signature_products', 'label' => 'Bebidas signature', 'type' => 'textarea_lines', 'desc' => 'Una por línea: Nombre | Descripción' ],
				],
				'Grid productos' => [
					[ 'key' => 'grid_title', 'label' => 'Título grid', 'type' => 'html' ],
					[ 'key' => 'grid_desc', 'label' => 'Descripción grid', 'type' => 'text' ],
					[ 'key' => 'grid_link_text', 'label' => 'Texto enlace', 'type' => 'text' ],
					[ 'key' => 'grid_link_url', 'label' => 'URL enlace', 'type' => 'text' ],
					[ 'key' => 'grid_products', 'label' => 'Productos grid', 'type' => 'products', 'desc' => 'Cada producto tiene nombre, descripción e imagen elegible desde Medios.' ],
				],
				'Espacio' => [
					[ 'key' => 'space_label', 'label' => 'Etiqueta', 'type' => 'text' ],
					[ 'key' => 'space_title', 'label' => 'Título', 'type' => 'html' ],
					[ 'key' => 'space_addr1', 'label' => 'Dirección línea 1', 'type' => 'text' ],
					[ 'key' => 'space_addr2', 'label' => 'Dirección línea 2', 'type' => 'text' ],
					[ 'key' => 'space_img', 'label' => 'Imagen espacio', 'type' => 'image' ],
					[ 'key' => 'space_map_text', 'label' => 'Texto “view map”', 'type' => 'text' ],
					[ 'key' => 'space_map_url', 'label' => 'URL mapa', 'type' => 'text' ],
				],
				'Rhythm' => [
					[ 'key' => 'rhythm_title', 'label' => 'Título', 'type' => 'html' ],
					[ 'key' => 'rhythm_sub', 'label' => 'Subtítulo', 'type' => 'html' ],
					[ 'key' => 'rhythm_img1', 'label' => 'Imagen 1', 'type' => 'image' ],
					[ 'key' => 'rhythm_img2', 'label' => 'Imagen 2', 'type' => 'image' ],
				],
			],
		],
		'story' => [
			'title' => 'Our Story',
			'desc'  => 'Contenidos de la página Our Story.',
			'sections' => [
				'Hero' => [
					[ 'key' => 'hero_title', 'label' => 'Título', 'type' => 'text' ],
					[ 'key' => 'hero_desc', 'label' => 'Descripción', 'type' => 'text' ],
					[ 'key' => 'hero_footer', 'label' => 'Texto inferior', 'type' => 'text' ],
					[ 'key' => 'hero_bg', 'label' => 'Imagen fondo', 'type' => 'image' ],
				],
				'Rituals' => [
					[ 'key' => 'rituals_sub', 'label' => 'Subtítulo', 'type' => 'text' ],
					[ 'key' => 'rituals_title', 'label' => 'Título', 'type' => 'text' ],
					[ 'key' => 'rituals_desc', 'label' => 'Descripción', 'type' => 'textarea' ],
				],
				'Way' => [
					[ 'key' => 'way_img', 'label' => 'Imagen', 'type' => 'image' ],
					[ 'key' => 'way_title', 'label' => 'Título', 'type' => 'text' ],
					[ 'key' => 'way_desc', 'label' => 'Descripción', 'type' => 'textarea' ],
					[ 'key' => 'way_btn', 'label' => 'Texto botón', 'type' => 'text' ],
					[ 'key' => 'way_url', 'label' => 'URL botón', 'type' => 'text' ],
				],
				'Purpose' => [
					[ 'key' => 'purpose_label', 'label' => 'Etiqueta', 'type' => 'text' ],
					[ 'key' => 'purpose_title', 'label' => 'Título', 'type' => 'textarea' ],
					[ 'key' => 'purpose_col1', 'label' => 'Columna 1', 'type' => 'textarea' ],
					[ 'key' => 'purpose_col2', 'label' => 'Columna 2', 'type' => 'text' ],
					[ 'key' => 'purpose_col3', 'label' => 'Columna 3', 'type' => 'textarea' ],
					[ 'key' => 'purpose_bg', 'label' => 'Imagen fondo', 'type' => 'image' ],
				],
				'Beliefs' => [
					[ 'key' => 'beliefs_sub', 'label' => 'Subtítulo', 'type' => 'text' ],
					[ 'key' => 'beliefs', 'label' => 'Creencias', 'type' => 'beliefs', 'desc' => 'Título, descripción e icono de cada creencia. El icono se elige desde Medios.' ],
				],
				'Comunidad + Espacio' => [
					[ 'key' => 'comm_bg', 'label' => 'Fondo comunidad', 'type' => 'image' ],
					[ 'key' => 'comm_label', 'label' => 'Etiqueta comunidad', 'type' => 'text' ],
					[ 'key' => 'comm_title', 'label' => 'Título comunidad', 'type' => 'textarea' ],
					[ 'key' => 'comm_desc', 'label' => 'Descripción comunidad', 'type' => 'textarea' ],
					[ 'key' => 'comm_btn', 'label' => 'Botón comunidad', 'type' => 'text' ],
					[ 'key' => 'comm_url', 'label' => 'URL comunidad', 'type' => 'text' ],
					[ 'key' => 'space_bg', 'label' => 'Fondo espacio', 'type' => 'image' ],
					[ 'key' => 'space_label', 'label' => 'Etiqueta espacio', 'type' => 'text' ],
					[ 'key' => 'space_title', 'label' => 'Título espacio', 'type' => 'textarea' ],
					[ 'key' => 'space_desc', 'label' => 'Descripción espacio', 'type' => 'textarea' ],
					[ 'key' => 'space_btn', 'label' => 'Botón espacio', 'type' => 'text' ],
					[ 'key' => 'space_url', 'label' => 'URL espacio', 'type' => 'text' ],
				],
				'Promise' => [
					[ 'key' => 'promise_label', 'label' => 'Etiqueta', 'type' => 'text' ],
					[ 'key' => 'promise_title', 'label' => 'Título', 'type' => 'html' ],
					[ 'key' => 'promise_btn', 'label' => 'Botón', 'type' => 'text' ],
					[ 'key' => 'promise_url', 'label' => 'URL botón', 'type' => 'text' ],
					[ 'key' => 'promise_bg_mobile', 'label' => 'Fondo móvil', 'type' => 'image' ],
				],
			],
		],
		'contact' => [
			'title' => 'Contacto',
			'desc'  => 'Contenidos de la página Contact.',
			'sections' => [
				'Hero' => [
					[ 'key' => 'hero_pretitle', 'label' => 'Pretítulo', 'type' => 'text' ],
					[ 'key' => 'hero_title', 'label' => 'Título', 'type' => 'text' ],
					[ 'key' => 'hero_desc', 'label' => 'Descripción', 'type' => 'textarea' ],
					[ 'key' => 'hero_bg', 'label' => 'Imagen fondo', 'type' => 'image' ],
				],
				'Info (visita / horarios / email / social)' => [
					[ 'key' => 'visit_addr1', 'label' => 'Dirección 1', 'type' => 'text' ],
					[ 'key' => 'visit_addr2', 'label' => 'Dirección 2', 'type' => 'text' ],
					[ 'key' => 'visit_link', 'label' => 'Texto mapa', 'type' => 'text' ],
					[ 'key' => 'visit_url', 'label' => 'URL mapa', 'type' => 'text' ],
					[ 'key' => 'hours_1', 'label' => 'Horario 1', 'type' => 'html' ],
					[ 'key' => 'hours_2', 'label' => 'Horario 2', 'type' => 'html' ],
					[ 'key' => 'hours_3', 'label' => 'Horario 3', 'type' => 'html' ],
					[ 'key' => 'email', 'label' => 'Email', 'type' => 'text' ],
					[ 'key' => 'social', 'label' => 'Social', 'type' => 'text' ],
					[ 'key' => 'social_url', 'label' => 'URL social', 'type' => 'text' ],
				],
				'Formulario' => [
					[ 'key' => 'form_img', 'label' => 'Imagen lateral', 'type' => 'image' ],
					[ 'key' => 'form_title', 'label' => 'Título formulario', 'type' => 'text' ],
				],
				'How to find us' => [
					[ 'key' => 'find_label', 'label' => 'Etiqueta', 'type' => 'text' ],
					[ 'key' => 'find_title', 'label' => 'Título', 'type' => 'textarea' ],
					[ 'key' => 'find_items', 'label' => 'Transportes', 'type' => 'textarea_lines', 'desc' => 'Uno por línea: Tipo | Detalle (Metro | L5 - …)' ],
					[ 'key' => 'find_link', 'label' => 'Texto enlace', 'type' => 'text' ],
					[ 'key' => 'find_url', 'label' => 'URL enlace', 'type' => 'text' ],
					[ 'key' => 'find_img', 'label' => 'Imagen', 'type' => 'image' ],
				],
			],
		],
		'coming' => [
			'title' => 'Coming Soon',
			'desc'  => 'Página temporal de apertura (modo Coming Soon).',
			'sections' => [
				'Contenido' => [
					[ 'key' => 'eyebrow', 'label' => 'Eyebrow superior', 'type' => 'text' ],
					[ 'key' => 'headline', 'label' => 'Titular grande', 'type' => 'text' ],
					[ 'key' => 'tagline', 'label' => 'Texto bajo titular', 'type' => 'textarea' ],
					[ 'key' => 'video_desktop', 'label' => 'Vídeo escritorio', 'type' => 'video' ],
					[ 'key' => 'video_mobile', 'label' => 'Vídeo móvil', 'type' => 'video' ],
					[ 'key' => 'location', 'label' => 'Etiqueta ubicación', 'type' => 'text' ],
					[ 'key' => 'address', 'label' => 'Dirección', 'type' => 'textarea' ],
					[ 'key' => 'social', 'label' => 'Instagram', 'type' => 'text' ],
					[ 'key' => 'social_url', 'label' => 'URL Instagram', 'type' => 'text' ],
					[ 'key' => 'success_title', 'label' => 'Mensaje éxito (título)', 'type' => 'textarea' ],
					[ 'key' => 'success_text', 'label' => 'Mensaje éxito (texto)', 'type' => 'textarea' ],
				],
			],
		],
		'global' => [
			'title' => 'Global (header/footer)',
			'desc'  => 'Textos comunes a todo el sitio.',
			'sections' => [
				'Footer' => [
					[ 'key' => 'footer_title', 'label' => 'Título footer', 'type' => 'text' ],
					[ 'key' => 'footer_social', 'label' => 'Texto social', 'type' => 'text' ],
					[ 'key' => 'footer_social_url', 'label' => 'URL social', 'type' => 'text' ],
				],
			],
		],
	];
}

// ── Registro Settings API ─────────────────────────────────────────────────────
add_action( 'admin_init', function() {
	foreach ( RESET_CONTENT_GROUPS as $group ) {
		register_setting(
			'reset_content_' . $group,
			'reset_content_' . $group,
			[ 'sanitize_callback' => function( $v ) use ( $group ) { return reset_content_sanitize( $v, $group ); } ]
		);
	}
} );

function reset_content_sanitize( $value, $group ) {
	$schema = reset_content_schema();
	$clean = [];
	$flat = [];
	foreach ( $schema[ $group ]['sections'] as $fields ) {
		foreach ( $fields as $f ) $flat[ $f['key'] ] = $f['type'];
	}
	foreach ( (array) $value as $k => $v ) {
		$type = $flat[ $k ] ?? 'text';
		if ( $type === 'products' ) {
			$items = [];
			foreach ( (array) $v as $row ) {
				if ( ! is_array( $row ) ) continue;
				$name  = sanitize_text_field( $row['name'] ?? '' );
				$desc  = sanitize_textarea_field( $row['desc'] ?? '' );
				$image = esc_url_raw( trim( (string) ( $row['image'] ?? '' ) ) );
				if ( $name === '' && $desc === '' && $image === '' ) continue;
				$items[] = [ 'name' => $name, 'desc' => $desc, 'image' => $image ];
				if ( count( $items ) >= 24 ) break;
			}
			$clean[ $k ] = $items;
		} elseif ( $type === 'beliefs' ) {
			$items = [];
			foreach ( (array) $v as $row ) {
				if ( ! is_array( $row ) ) continue;
				$title = sanitize_text_field( $row['title'] ?? '' );
				$desc  = sanitize_textarea_field( $row['desc'] ?? '' );
				$icon  = esc_url_raw( trim( (string) ( $row['icon'] ?? '' ) ) );
				if ( $title === '' && $desc === '' && $icon === '' ) continue;
				$items[] = [ 'title' => $title, 'desc' => $desc, 'icon' => $icon ];
				if ( count( $items ) >= 6 ) break;
			}
			$clean[ $k ] = $items;
		} elseif ( in_array( $type, [ 'html' ], true ) ) {
			// Editor visual (TinyMCE): negrita, cursiva, subrayado… sin escribir HTML.
			// Como en las entradas: con 'unfiltered_html' se guarda tal cual,
			// si no se filtra con wp_kses_post.
			$clean[ $k ] = current_user_can( 'unfiltered_html' ) ? $v : wp_kses_post( $v );
		} elseif ( in_array( $type, [ 'image', 'video' ], true ) ) {
			$clean[ $k ] = esc_url_raw( trim( (string) $v ) );
		} elseif ( in_array( $type, [ 'textarea', 'textarea_lines' ], true ) ) {
			$clean[ $k ] = sanitize_textarea_field( $v );
		} else {
			$clean[ $k ] = sanitize_text_field( $v );
		}
	}
	return $clean;
}

// ── Menú sidebar ──────────────────────────────────────────────────────────────
add_action( 'admin_menu', function() {
	add_menu_page(
		'(re)set · Contenidos',
		'(re)set Contenidos',
		'edit_pages',
		'reset-contenidos',
		'reset_content_render_inicio',
		'dashicons-admin-page',
		31
	);
	$subs = [
		'reset-contenidos'         => [ 'Inicio', 'reset_content_render_inicio' ],
		'reset-contenidos-story'   => [ 'Our Story', 'reset_content_render_story' ],
		'reset-contenidos-contact' => [ 'Contacto', 'reset_content_render_contact' ],
		'reset-contenidos-coming'  => [ 'Coming Soon', 'reset_content_render_coming' ],
		'reset-contenidos-global'  => [ 'Global', 'reset_content_render_global' ],
	];
	foreach ( $subs as $slug => $info ) {
		// el primero ya es la página padre, lo renombramos vía submenu
		if ( $slug === 'reset-contenidos' ) {
			add_submenu_page( 'reset-contenidos', 'Inicio', 'Inicio', 'edit_pages', $slug, $info[1] );
			continue;
		}
		add_submenu_page( 'reset-contenidos', $info[0], $info[0], 'edit_pages', $slug, $info[1] );
	}
} );

function reset_content_render_inicio()  { reset_content_render_page( 'inicio' ); }
function reset_content_render_story()   { reset_content_render_page( 'story' ); }
function reset_content_render_contact() { reset_content_render_page( 'contact' ); }
function reset_content_render_coming()  { reset_content_render_page( 'coming' ); }
function reset_content_render_global()  { reset_content_render_page( 'global' ); }

function reset_content_render_page( $group ) {
	if ( ! current_user_can( 'edit_pages' ) ) return;
	$schema = reset_content_schema()[ $group ];
	$values = array_merge( reset_content_defaults()[ $group ], (array) get_option( 'reset_content_' . $group, [] ) );
	?>
	<div class="wrap reset-wrap">
		<div class="reset-head">
			<div class="reset-head-badge">(re)set</div>
			<div>
				<h1><?php echo esc_html( $schema['title'] ); ?></h1>
				<p><?php echo esc_html( $schema['desc'] ); ?></p>
			</div>
		</div>
		<form method="post" action="options.php" class="reset-form">
			<?php settings_fields( 'reset_content_' . $group ); ?>
			<?php foreach ( $schema['sections'] as $section_title => $fields ) : ?>
				<div class="reset-card">
					<h2><?php echo esc_html( $section_title ); ?></h2>
					<div class="reset-grid">
					<?php foreach ( $fields as $f ) :
						$val = $values[ $f['key'] ] ?? '';
						$name = 'reset_content_' . $group . '[' . esc_attr( $f['key'] ) . ']';
						$wide = in_array( $f['type'], [ 'textarea', 'textarea_lines', 'html', 'products', 'beliefs' ], true ) ? ' reset-field-wide' : '';
						$is_media = in_array( $f['type'], [ 'image', 'video' ], true );
						if ( $is_media ) $wide .= ' reset-field-wide';
					?>
						<div class="reset-field<?php echo esc_attr( $wide ); ?>">
							<label><?php echo esc_html( $f['label'] ); ?></label>
							<?php if ( $f['type'] === 'products' ) :
								$items = is_array( $val ) ? array_values( array_filter( (array) $val, 'is_array' ) ) : [];
								if ( empty( $items ) ) {
									// Migración legacy: "Nombre | Desc | URL" -> filas
									$legacy = is_string( $val ) ? reset_parse_lines( $val, 3 ) : [];
									foreach ( $legacy as $lp ) {
										$items[] = [ 'name' => $lp[0], 'desc' => $lp[1], 'image' => $lp[2] ];
									}
								}
								if ( empty( $items ) ) $items[] = [ 'name' => '', 'desc' => '', 'image' => '' ];
							?>
								<div class="reset-products" data-group="<?php echo esc_attr( $group ); ?>" data-key="<?php echo esc_attr( $f['key'] ); ?>">
									<?php foreach ( $items as $i => $it ) : ?>
									<div class="reset-product-row">
										<div class="reset-product-top">
											<strong>Producto <?php echo (int) ( $i + 1 ); ?></strong>
											<button type="button" class="button reset-product-remove">Quitar</button>
										</div>
										<label>Nombre</label>
										<input type="text" name="<?php echo $name; ?>[<?php echo (int) $i; ?>][name]" value="<?php echo esc_attr( $it['name'] ?? '' ); ?>" class="regular-text" placeholder="Reset Matcha">
										<label>Descripción</label>
										<input type="text" name="<?php echo $name; ?>[<?php echo (int) $i; ?>][desc]" value="<?php echo esc_attr( $it['desc'] ?? '' ); ?>" class="regular-text" placeholder="Matcha latte frío con…">
										<label>Imagen</label>
										<div class="reset-media-row">
											<input type="url" name="<?php echo $name; ?>[<?php echo (int) $i; ?>][image]" value="<?php echo esc_attr( $it['image'] ?? '' ); ?>" placeholder="https://…" class="regular-text reset-media-url">
											<button type="button" class="button reset-media-btn" data-type="image">Subir / elegir</button>
										</div>
										<?php if ( ! empty( $it['image'] ) ) : ?>
											<img src="<?php echo esc_url( $it['image'] ); ?>" class="reset-preview" alt="">
										<?php endif; ?>
									</div>
									<?php endforeach; ?>
								</div>
								<p><button type="button" class="button button-secondary reset-product-add">+ Añadir producto</button></p>
							<?php elseif ( $f['type'] === 'beliefs' ) :
								$items = is_array( $val ) ? array_values( array_filter( (array) $val, 'is_array' ) ) : [];
								if ( empty( $items ) ) {
									// Migración legacy: "TÍTULO | Desc | URL?" -> filas
									$legacy = is_string( $val ) ? reset_parse_lines( $val, 3 ) : [];
									foreach ( $legacy as $lp ) {
										$items[] = [ 'title' => $lp[0], 'desc' => $lp[1], 'icon' => $lp[2] ?? '' ];
									}
								}
								if ( empty( $items ) ) $items[] = [ 'title' => '', 'desc' => '', 'icon' => '' ];
							?>
								<div class="reset-products reset-beliefs" data-group="<?php echo esc_attr( $group ); ?>" data-key="<?php echo esc_attr( $f['key'] ); ?>" data-kind="belief">
									<?php foreach ( $items as $i => $it ) : ?>
									<div class="reset-product-row">
										<div class="reset-product-top">
											<strong>Creencia <?php echo (int) ( $i + 1 ); ?></strong>
											<button type="button" class="button reset-belief-remove">Quitar</button>
										</div>
										<label>Título</label>
										<input type="text" name="<?php echo $name; ?>[<?php echo (int) $i; ?>][title]" value="<?php echo esc_attr( $it['title'] ?? '' ); ?>" class="regular-text" placeholder="CLEAN ENERGY">
										<label>Descripción</label>
										<textarea name="<?php echo $name; ?>[<?php echo (int) $i; ?>][desc]" rows="2" placeholder="Energy, without the chaos"><?php echo esc_textarea( $it['desc'] ?? '' ); ?></textarea>
										<label>Icono</label>
										<div class="reset-media-row">
											<input type="url" name="<?php echo $name; ?>[<?php echo (int) $i; ?>][icon]" value="<?php echo esc_attr( $it['icon'] ?? '' ); ?>" placeholder="https://…" class="regular-text reset-media-url">
											<button type="button" class="button reset-media-btn" data-type="image">Subir / elegir</button>
										</div>
										<?php if ( ! empty( $it['icon'] ) ) : ?>
											<img src="<?php echo esc_url( $it['icon'] ); ?>" class="reset-preview reset-preview-icon" alt="">
										<?php endif; ?>
									</div>
									<?php endforeach; ?>
								</div>
								<p><button type="button" class="button button-secondary reset-belief-add">+ Añadir creencia</button></p>
							<?php elseif ( $f['type'] === 'textarea' ) : ?>
								<textarea name="<?php echo $name; ?>" rows="3"><?php echo esc_textarea( $val ); ?></textarea>
							<?php elseif ( $f['type'] === 'textarea_lines' ) : ?>
								<textarea name="<?php echo $name; ?>" rows="5" class="mono"><?php echo esc_textarea( $val ); ?></textarea>
							<?php elseif ( $f['type'] === 'html' ) :
								// Editor visual (TinyMCE): negrita, cursiva, subrayado… sin escribir etiquetas.
								$editor_id = 'reset_' . preg_replace( '/[^a-z0-9_]/', '', strtolower( $group . '_' . $f['key'] ) );
								wp_editor( (string) $val, $editor_id, [
									'textarea_name' => $name,
									'textarea_rows' => 4,
									'media_buttons' => false,
									'teeny'         => true,
									'quicktags'     => true,
									'tinymce'       => [
										'toolbar1'            => 'bold,italic,underline,strikethrough,bullist,numlist,link,unlink,undo,redo,removeformat',
										// Estos campos se imprimen dentro de h1/h2/p: Enter debe
										// crear <br> (como antes), no bloques <p> que romperían el titular.
										'forced_root_block'   => false,
										'force_p_newlines'    => false,
										'force_br_newlines'   => true,
										'convert_newlines_to_brs' => true,
									],
								] );
							?>
							<?php elseif ( $is_media ) : ?>
								<div class="reset-media-row">
									<input type="url" name="<?php echo $name; ?>" value="<?php echo esc_attr( $val ); ?>" placeholder="https://…" class="regular-text reset-media-url">
									<button type="button" class="button reset-media-btn" data-type="<?php echo $f['type'] === 'video' ? 'video' : 'image'; ?>">Subir / elegir</button>
								</div>
								<?php if ( $val ) : ?>
									<?php if ( $f['type'] === 'image' ) : ?>
										<img src="<?php echo esc_url( $val ); ?>" class="reset-preview" alt="">
									<?php else : ?>
										<video src="<?php echo esc_url( $val ); ?>" class="reset-preview" muted playsinline></video>
									<?php endif; ?>
								<?php endif; ?>
							<?php else : ?>
								<input type="text" name="<?php echo $name; ?>" value="<?php echo esc_attr( $val ); ?>" class="regular-text">
							<?php endif; ?>
							<?php if ( ! empty( $f['desc'] ) ) : ?>
								<p class="description"><?php echo esc_html( $f['desc'] ); ?></p>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
					</div>
				</div>
			<?php endforeach; ?>
			<?php submit_button( 'Guardar cambios' ); ?>
		</form>
	</div>
	<?php
}

// ── Assets admin ──────────────────────────────────────────────────────────────
add_action( 'admin_enqueue_scripts', function( $hook ) {
	if ( strpos( (string) $hook, 'reset-contenidos' ) === false ) return;
	wp_enqueue_media();
	wp_enqueue_style( 'reset-admin-content', get_template_directory_uri() . '/assets/css/admin-content.css', [], RESET_THEME_VERSION );
	wp_enqueue_script( 'reset-admin-content', get_template_directory_uri() . '/assets/js/admin-content.js', [ 'jquery' ], RESET_THEME_VERSION, true );
} );
