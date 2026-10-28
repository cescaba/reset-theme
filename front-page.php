<?php
// Portada: usa los contenidos del grupo "Inicio" del admin.
?>

<?php get_header(); ?>

<?php
$hero_title  = reset_content( 'inicio', 'hero_title' );
$hero_desc   = reset_content( 'inicio', 'hero_desc' );
$sig_items   = reset_parse_lines( reset_content( 'inicio', 'signature_products' ), 2 );
$grid_items  = function_exists( 'reset_get_grid_products' ) ? reset_get_grid_products( 'inicio', 'grid_products' ) : array_map( function( $p ) { return [ 'name' => $p[0], 'desc' => $p[1], 'image' => $p[2] ]; }, reset_parse_lines( reset_content( 'inicio', 'grid_products' ), 3 ) );
?>

<div class="site-wrapper">
  <?php get_template_part( 'components/hero', null, [
    'case'        => 1,
    'title'       => $hero_title,
    'description' => $hero_desc,
    'video_url'      => reset_content( 'inicio', 'hero_video' ),
    'video_url_mobile' => reset_content( 'inicio', 'hero_video_mobile' ),
]); ?>

</div>

<section class="info-split">
    <div class="info-text-block">
        <h2 class="info-title font-serif">
            <?php echo nl2br( esc_html( reset_content( 'inicio', 'info_title' ) ) ); ?>
        </h2>
    </div>

    <div class="info-images-block">
        <div class="info-image-item">
            <img src="<?php echo esc_url( reset_content( 'inicio', 'info_img1' ) ); ?>" alt="Matcha preparation">
        </div>
        <div class="info-image-item">
            <img src="<?php echo esc_url( reset_content( 'inicio', 'info_img2' ) ); ?>" alt="Matcha cup (re)set">
        </div>
    </div>
</section>

<section class="products-section" id="crafted-body-mind">
    <div class="slider-container">
        <div class="slider-main">
            <div class="slider-image-wrapper">
                <button class="slider-arrow prev">←</button>
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/matcha-can-1.png' ); ?>" alt="Matcha Drink">
                <button class="slider-arrow next">→</button>
                <div class="slider-dots">
                    <span class="dot active"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>
            </div>

            <div class="slider-text">
                <h2 class="font-serif"><?php echo wp_kses_post( reset_content( 'inicio', 'signature_title' ) ); ?></h2>

                <?php foreach ( $sig_items as $s ) : ?>
                <div class="product-detail">
                    <h3 class="font-diatype-bold"><?php echo esc_html( $s[0] ); ?></h3>
                    <p class="font-diatype-italic"><?php echo esc_html( $s[1] ); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="products-grid-container">
        <div class="grid-header">
            <h2 class="font-serif"><?php echo wp_kses_post( reset_content( 'inicio', 'grid_title' ) ); ?></h2>
            <p class="font-diatype"><?php echo esc_html( reset_content( 'inicio', 'grid_desc' ) ); ?></p>
            <div class="grid-nav-arrows">
                <button class="grid-arrow prev" id="gridPrev">←</button>
                <button class="grid-arrow next" id="gridNext">→</button>
            </div>
            <a href="<?php echo esc_url( reset_content( 'inicio', 'grid_link_url' ) ); ?>" class="full-menu-link font-diatype"><?php echo esc_html( reset_content( 'inicio', 'grid_link_text' ) ); ?></a>
        </div>

        <div class="products-scroll-wrapper" id="productGrid">
            <?php foreach ( $grid_items as $product ) :
                $p_name  = is_array( $product ) ? ( $product['name'] ?? $product[0] ?? '' ) : '';
                $p_desc  = is_array( $product ) ? ( $product['desc'] ?? $product[1] ?? '' ) : '';
                $p_image = is_array( $product ) ? ( $product['image'] ?? $product[2] ?? '' ) : '';
            ?>
                <div class="product-card">
                    <div class="product-img">
                        <?php if ( $p_image ) : ?>
                        <img src="<?php echo esc_url( $p_image ); ?>" alt="<?php echo esc_attr( $p_name ); ?>">
                        <?php endif; ?>
                    </div>
                    <h4 class="font-diatype-bold"><?php echo esc_html( $p_name ); ?></h4>
                    <p class="font-diatype-italic"><?php echo esc_html( $p_desc ); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="space-section">
    <div class="space-container">
        <div class="space-content-wrapper">
            <div class="space-image-wrapper">
                <a href="<?php echo esc_url( reset_content( 'inicio', 'space_map_url' ) ); ?>" class="view-map-link font-mono"><?php echo esc_html( reset_content( 'inicio', 'space_map_text' ) ); ?></a>

                <img src="<?php echo esc_url( reset_content( 'inicio', 'space_img' ) ); ?>" alt="Our space in Barcelona">
            </div>

            <div class="space-info-card">
                <span class="info-label font-diatype"><?php echo esc_html( reset_content( 'inicio', 'space_label' ) ); ?></span>
                <h2 class="font-serif"><?php echo wp_kses_post( reset_content( 'inicio', 'space_title' ) ); ?></h2>

                <div class="address-details font-diatype">
                    <p><?php echo esc_html( reset_content( 'inicio', 'space_addr1' ) ); ?></p>
                    <p><?php echo esc_html( reset_content( 'inicio', 'space_addr2' ) ); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="rhythm-section">
    <div class="rhythm-grid">
        <div class="rhythm-item rhythm-text-block">
            <div class="rhythm-text-content">
                <h2 class="font-serif"><?php echo wp_kses_post( reset_content( 'inicio', 'rhythm_title' ) ); ?></h2>
                <p class="font-mono"><?php echo wp_kses_post( reset_content( 'inicio', 'rhythm_sub' ) ); ?></p>
            </div>
        </div>

        <div class="rhythm-item rhythm-image rhythm-img-lifestyle">
            <img src="<?php echo esc_url( reset_content( 'inicio', 'rhythm_img1' ) ); ?>" alt="Enjoying Reset Matcha">
        </div>

        <div class="rhythm-item rhythm-image rhythm-img-cheers">
            <img src="<?php echo esc_url( reset_content( 'inicio', 'rhythm_img2' ) ); ?>" alt="Sharing Reset Matcha">
        </div>
    </div>
</section>

<?php get_footer(); ?>
