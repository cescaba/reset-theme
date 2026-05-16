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
    $header_logo_color = '#AFCBDE';
    $header_link_color = '#AFCBDE';

    if ( is_page_template( 'page-templates/contact.php' ) ) {
        $header_logo_color = '#3E675B';
    }
    ?>

    <header class="site-header" style="--header-logo-color: <?php echo esc_attr( $header_logo_color ); ?>; --header-link-color: <?php echo esc_attr( $header_link_color ); ?>;">
        <div class="header-container">
            <div class="logo">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <?php echo reset_inline_svg( 'assets/images/logo.svg', 'site-logo' ); ?>
                </a>
            </div>
            <button class="hamburger" aria-controls="primary-menu" aria-expanded="false" aria-label="Abrir menú">
                <span class="hamburger-box"><span class="hamburger-inner"></span></span>
            </button>
            <nav class="main-navigation">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'menu-1',
                    'menu_id'        => 'primary-menu',
                ) );
                ?>
            </nav>
        </div>
    </header>