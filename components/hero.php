<?php
/**
 * Componente Hero Dinámico
 * Argumentos: case, title, description, bg_url, video_url, pretitle, footer_text
 */

$case        = $args['case'] ?? 1;
$title       = $args['title'] ?? '';
$description = $args['description'] ?? '';
$bg_url      = $args['bg_url'] ?? '';
$video_url   = $args['video_url'] ?? '';
$video_url_mobile  = $args['video_url_mobile'] ?? $video_url;
$pretitle    = $args['pretitle'] ?? '';
$footer_text = $args['footer_text'] ?? '';
?>

<section class="hero hero-case-<?php echo esc_attr($case); ?>">
    
    <div class="hero-bg">
        <?php if ( $case == 1 ) : ?>
            <?php echo reset_media_html( $video_url, '', 'hero-video hero-video-desktop' ); ?>
            <?php echo reset_media_html( $video_url_mobile, '', 'hero-video hero-video-mobile' ); ?>

            <div class="hero-overlay"></div> 

        <?php elseif ( $case == 2 ) : ?>
            <div class="hero-overlay"></div> 
            <?php echo reset_media_html( $bg_url, strip_tags( $title ) ); ?>
            
        <?php elseif ( $case == 3 ) : ?>
            <div class="split-image-wrapper">
                <?php echo reset_media_html( $bg_url, strip_tags( $title ) ); ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="hero-content-container">
        <div class="hero-text-box">
            
            <?php if ( !empty($pretitle) ) : ?>
                <span class="hero-pretitle"><?php echo esc_html($pretitle); ?></span>
            <?php endif; ?>

            <h1 class="hero-title"><?php echo wp_kses_post($title); ?></h1>

            <?php if ( !empty($description) ) : ?>
                <p class="hero-description"><?php echo esc_html($description); ?></p>
            <?php endif; ?>

            <?php if ( $case == 2 ) : ?>
                <div class="hero-divider"></div>
                <?php if ( !empty($footer_text) ) : ?>
                    <p class="hero-footer-text"><?php echo esc_html($footer_text); ?></p>
                <?php endif; ?>
            <?php endif; ?>

        </div>
    </div>
</section>