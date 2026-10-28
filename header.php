<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Fragment+Mono&display=swap" rel="stylesheet">
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <?php
    $header_logo_color = '#223E36';
    $header_link_color = '#223E36';

    $is_inicio  = is_front_page() || is_page_template( 'page-templates/inicio.php' );
    $is_story   = is_page_template( 'page-templates/our-story.php' ) || is_page( 'our-story' );
    $is_contact = is_page_template( 'page-templates/contact.php' ) || is_page( 'contact' );
    ?>

    <header class="site-header" style="--header-logo-color: <?php echo esc_attr( $header_logo_color ); ?>; --header-link-color: <?php echo esc_attr( $header_link_color ); ?>;">
        <div class="header-container">
            <nav class="main-navigation header-left" aria-label="Principal">
                <?php
                if ( has_nav_menu( 'menu-1' ) ) {
                    wp_nav_menu( array(
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'primary-menu',
                        'container'      => false,
                        'fallback_cb'    => false,
                    ) );
                } else {
                    ?>
                    <ul id="primary-menu">
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="<?php echo $is_inicio ? 'is-active' : ''; ?>">Inicio</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/our-story/' ) ); ?>" class="<?php echo $is_story ? 'is-active' : ''; ?>">Our Story</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="<?php echo $is_contact ? 'is-active' : ''; ?>">Contact</a></li>
                    </ul>
                    <?php
                }
                ?>
            </nav>
            <div class="logo header-center">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="(re)set inicio">
                    <?php echo reset_inline_svg( 'assets/images/logo.svg', 'site-logo' ); ?>
                </a>
            </div>
            <div class="header-right">
                <a class="menu-pill" href="<?php echo esc_url( reset_menu_target_url( '/menu' ) ); ?>">Our menú →</a>
                <button class="hamburger" aria-controls="primary-menu" aria-expanded="false" aria-label="Abrir menú">
                    <span class="hamburger-box"><span class="hamburger-inner"></span></span>
                </button>
            </div>
        </div>
    </header>