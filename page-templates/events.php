<?php
/**
 * Template Name: Plantilla Events
 */
?>

<?php get_header(); ?>

<div class="site-wrapper">
  <?php get_template_part( 'components/hero', null, [
    'case'        => 3,
    'pretitle'    => reset_content( 'events', 'hero_pretitle' ),
    'title'       => reset_content( 'events', 'hero_title' ),
    'description' => reset_content( 'events', 'hero_desc' ),
    'bg_url'      => reset_content( 'events', 'hero_bg' ),
]); ?>

</div>
<section class="contact-info-section">
    <div class="contact-grid">
        <?php foreach ( [ 1, 2 ] as $n ) :
            $info_title = reset_content( 'events', "info{$n}_title" );
            $info_text  = reset_content( 'events', "info{$n}_text" );
            $info_desc  = reset_content( 'events', "info{$n}_desc" );
            if ( $info_title === '' && $info_text === '' && $info_desc === '' ) continue;
        ?>
        <div class="contact-col">
            <?php if ( $info_title !== '' ) : ?>
            <span class="contact-label font-mono"><?php echo esc_html( $info_title ); ?></span>
            <?php endif; ?>
            <div class="contact-data font-serif"><?php echo wp_kses_post( $info_text ); ?></div>
            <?php if ( $info_desc !== '' ) : ?>
            <div class="contact-note font-mono"><?php echo wp_kses_post( $info_desc ); ?></div>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="contact-form-section">
    <div class="contact-form-grid">
        <div class="contact-form-image">
            <?php echo reset_media_html( reset_content( 'events', 'form_img' ), 'Matcha preparation' ); ?>
        </div>

        <div class="contact-form-content">
            <div class="form-wrapper">
                <h2 class="font-serif"><?php echo esc_html( reset_content( 'events', 'form_title' ) ); ?></h2>

                <form action="#" class="reset-form" id="contactForm" data-action="reset_evento">
                    <div style="position:absolute;left:-9999px;top:-9999px;width:1px;height:1px;overflow:hidden;" aria-hidden="true">
                        <input type="text" name="website" value="" tabindex="-1" autocomplete="off">
                    </div>
                    <input type="hidden" name="form_loaded" value="<?php echo time(); ?>">
                    <input type="hidden" name="form_token" value="<?php echo wp_hash( floor(time()/60) . 'reset_form' ); ?>">

                    <div class="form-row">
                        <div class="form-group">
                            <input type="text" name="name" placeholder="name" class="font-mono input-all">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" placeholder="email" class="font-mono input-all">
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="text" name="subject" placeholder="subject" class="font-mono input-all">
                    </div>

                    <div class="form-group">
                        <textarea name="message" rows="1" placeholder="message" class="font-mono input-message"></textarea>
                    </div>

                    <div class="form-footer">
                        <button type="submit" class="btn-capsule font-mono">send message →</button>
                        <p class="font-mono privacy-note">By sending you accept our privacy policy</p>
                    </div>
                </form>
                <div id="contactSuccessMsg" style="display:none;margin-top:18px;padding:16px 18px;border-left:3px solid currentColor;background:rgba(0,0,0,.04);font-family:inherit;">
                    Message sent. We’ll get back to you soon.
                </div>
            </div>
        </div>
    </div>
</section>
<section class="find-us-section">
    <div class="find-us-grid">
        <div class="find-us-content">
            <div class="find-us-wrapper">
                <?php $find_sub = reset_content( 'events', 'find_subtitle' ); $find_desc = reset_content( 'events', 'find_desc' ); ?>
                <h2 class="font-serif"><?php echo esc_html( reset_content( 'events', 'find_title' ) ); ?></h2>
                <?php if ( $find_sub !== '' ) : ?>
                <span class="font-mono find-us-sub"><?php echo esc_html( $find_sub ); ?></span>
                <?php endif; ?>
                <?php if ( $find_desc !== '' ) : ?>
                <div class="font-mono find-us-desc"><?php echo wp_kses_post( $find_desc ); ?></div>
                <?php endif; ?>
            </div>
        </div>

        <div class="find-us-image">
            <?php echo reset_media_html( reset_content( 'events', 'find_img' ), 'Reset Matcha Cans' ); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
