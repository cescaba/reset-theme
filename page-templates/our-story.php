<?php
/**
 * Template Name: Plantilla Our Story
 */
?>

<?php get_header(); ?>

<?php
$beliefs = function_exists( 'reset_get_beliefs' ) ? reset_get_beliefs( 'story', 'beliefs' ) : [];
?>

<div class="site-wrapper">
  <?php get_template_part( 'components/hero', null, [
    'case'        => 2,
    'title'       => reset_content( 'story', 'hero_title' ),
    'description' => reset_content( 'story', 'hero_desc' ),
    'footer_text' => reset_content( 'story', 'hero_footer' ),
    'bg_url'      => reset_content( 'story', 'hero_bg' ),
]); ?>

</div>

<section class="rituals-section">
    <div class="rituals-background-layer">
            <div class="rituals-content">
                <span class="rituals-subtitle font-mono"><?php echo esc_html( reset_content( 'story', 'rituals_sub' ) ); ?></span>
                <h2 class="font-serif"><?php echo esc_html( reset_content( 'story', 'rituals_title' ) ); ?></h2>
                <p class="font-mono"><?php echo esc_html( reset_content( 'story', 'rituals_desc' ) ); ?></p>
            </div>
    </div>
</section>
<section class="story-way-section">
    <div class="story-way-grid">
        <div class="way-image">
            <img src="<?php echo esc_url( reset_content( 'story', 'way_img' ) ); ?>" alt="A way to keep going">
        </div>

        <div class="way-content-block">
            <div class="way-text-container">
                <h2 class="font-serif"><?php echo esc_html( reset_content( 'story', 'way_title' ) ); ?></h2>
                <p class="font-mono"><?php echo esc_html( reset_content( 'story', 'way_desc' ) ); ?></p>

                <a href="<?php echo esc_url( reset_menu_href( reset_content( 'story', 'way_url' ) ) ); ?>"<?php echo reset_menu_link_attrs(); ?> class="btn-capsule font-mono">
                    <?php echo esc_html( reset_content( 'story', 'way_btn' ) ); ?>
                </a>
            </div>
        </div>
    </div>
</section>
<section class="purpose-section">
    <div class="purpose-bg-overlay">
        <img src="<?php echo esc_url( reset_content( 'story', 'purpose_bg' ) ); ?>" alt="Background shadows">
    </div>

    <div class="purpose-container">
        <header class="purpose-header">
            <span class="font-mono"><?php echo esc_html( reset_content( 'story', 'purpose_label' ) ); ?></span>
            <h2 class="font-serif"><?php echo esc_html( reset_content( 'story', 'purpose_title' ) ); ?></h2>
        </header>

        <div class="purpose-grid">
            <div class="purpose-col">
                <p class="font-mono"><?php echo nl2br( esc_html( reset_content( 'story', 'purpose_col1' ) ) ); ?></p>
            </div>

            <div class="purpose-col divider-col">
                <p class="font-mono"><?php echo esc_html( reset_content( 'story', 'purpose_col2' ) ); ?></p>
            </div>

            <div class="purpose-col end-col">
                <p class="font-mono"><?php echo nl2br( esc_html( reset_content( 'story', 'purpose_col3' ) ) ); ?></p>
            </div>
        </div>
    </div>
</section>
<section class="beliefs-section">
    <div class="beliefs-container">
        <span class="beliefs-subtitle font-mono"><?php echo esc_html( reset_content( 'story', 'beliefs_sub' ) ); ?></span>

        <div class="beliefs-grid">
            <?php foreach ( $beliefs as $i => $b ) :
                $b_title = is_array( $b ) ? ( $b['title'] ?? '' ) : '';
                $b_desc  = is_array( $b ) ? ( $b['desc'] ?? '' ) : '';
                $b_icon  = is_array( $b ) ? ( $b['icon'] ?? '' ) : '';
            ?>
            <?php if ( $i > 0 ) : ?><div class="belief-divider"></div><?php endif; ?>
            <div class="belief-item">
                <?php if ( $b_icon ) : ?>
                <div class="belief-icon">
                    <img src="<?php echo esc_url( $b_icon ); ?>" alt="<?php echo esc_attr( $b_title ); ?>">
                </div>
                <?php endif; ?>
                <h3 class="font-serif"><?php echo esc_html( $b_title ); ?></h3>
                <p class="font-mono"><?php echo nl2br( esc_html( $b_desc ) ); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="story-dual-section">
    <div class="dual-block">
        <div class="dual-bg">
            <img src="<?php echo esc_url( reset_content( 'story', 'comm_bg' ) ); ?>" alt="Our community">
            <div class="dual-overlay"></div>
        </div>
        <div class="dual-content">
            <span class="dual-label font-mono"><?php echo esc_html( reset_content( 'story', 'comm_label' ) ); ?></span>
            <h2 class="font-serif"><?php echo esc_html( reset_content( 'story', 'comm_title' ) ); ?></h2>
            <p class="font-mono"><?php echo nl2br( esc_html( reset_content( 'story', 'comm_desc' ) ) ); ?></p>
            <a href="<?php echo esc_url( reset_content( 'story', 'comm_url' ) ); ?>" class="btn-capsule font-mono"><?php echo esc_html( reset_content( 'story', 'comm_btn' ) ); ?></a>
        </div>
    </div>

    <div class="dual-block">
        <div class="dual-bg">
            <img src="<?php echo esc_url( reset_content( 'story', 'space_bg' ) ); ?>" alt="Our space">
            <div class="dual-overlay"></div>
        </div>
        <div class="dual-content">
            <span class="dual-label font-mono"><?php echo esc_html( reset_content( 'story', 'space_label' ) ); ?></span>
            <h2 class="font-serif"><?php echo esc_html( reset_content( 'story', 'space_title' ) ); ?></h2>
            <p class="font-mono"><?php echo nl2br( esc_html( reset_content( 'story', 'space_desc' ) ) ); ?></p>
            <a href="<?php echo esc_url( reset_content( 'story', 'space_url' ) ); ?>" class="btn-capsule font-mono"><?php echo esc_html( reset_content( 'story', 'space_btn' ) ); ?></a>
        </div>
    </div>
</section>
<section class="promise-section" style="--bg-mobile: url('<?php echo esc_url( reset_content( 'story', 'promise_bg_mobile' ) ); ?>');">
    <div class="promise-container">
        <span class="promise-label font-mono"><?php echo esc_html( reset_content( 'story', 'promise_label' ) ); ?></span>
        <h2 class="font-serif">
            <?php echo wp_kses_post( reset_content( 'story', 'promise_title' ) ); ?>
        </h2>

        <div class="promise-action">
            <a href="<?php echo esc_url( reset_menu_href( reset_content( 'story', 'promise_url' ) ) ); ?>"<?php echo reset_menu_link_attrs(); ?> class="btn-capsule font-mono">
                <?php echo esc_html( reset_content( 'story', 'promise_btn' ) ); ?>
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
