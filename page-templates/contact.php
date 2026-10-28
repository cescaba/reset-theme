<?php
/**
 * Template Name: Plantilla Contact
 */
?>

<?php get_header(); ?>

<?php $find_items = reset_parse_lines( reset_content( 'contact', 'find_items' ), 2 ); ?>

<div class="site-wrapper">
  <?php get_template_part( 'components/hero', null, [
    'case'        => 3,
    'pretitle'    => reset_content( 'contact', 'hero_pretitle' ),
    'title'       => reset_content( 'contact', 'hero_title' ),
    'description' => reset_content( 'contact', 'hero_desc' ),
    'bg_url'      => reset_content( 'contact', 'hero_bg' ),
]); ?>

</div>
<section class="contact-info-section">
    <div class="contact-grid">
        <div class="contact-col">
            <span class="contact-label font-mono">Visit</span>
            <div class="contact-data font-serif">
                <p><?php echo esc_html( reset_content( 'contact', 'visit_addr1' ) ); ?></p>
                <p><?php echo esc_html( reset_content( 'contact', 'visit_addr2' ) ); ?></p>
            </div>
            <a href="<?php echo esc_url( reset_content( 'contact', 'visit_url' ) ); ?>" class="contact-link font-mono"><?php echo esc_html( reset_content( 'contact', 'visit_link' ) ); ?></a>
        </div>

        <div class="contact-col">
            <span class="contact-label font-mono">Hours</span>
            <div class="contact-data font-serif">
                <p><?php echo wp_kses_post( reset_content( 'contact', 'hours_1' ) ); ?></p>
                <p><?php echo wp_kses_post( reset_content( 'contact', 'hours_2' ) ); ?></p>
                <p><?php echo wp_kses_post( reset_content( 'contact', 'hours_3' ) ); ?></p>
            </div>
        </div>

        <div class="contact-col">
            <span class="contact-label font-mono">Email</span>
            <div class="contact-data font-serif">
                <p><a href="mailto:<?php echo esc_attr( reset_content( 'contact', 'email' ) ); ?>"><?php echo esc_html( reset_content( 'contact', 'email' ) ); ?></a></p>
            </div>
        </div>

        <div class="contact-col">
            <span class="contact-label font-mono">Social</span>
            <div class="contact-data font-serif">
                <p><a href="<?php echo esc_url( reset_content( 'contact', 'social_url' ) ); ?>" target="_blank"><?php echo esc_html( reset_content( 'contact', 'social' ) ); ?></a></p>
            </div>
        </div>
    </div>
</section>

<section class="contact-form-section">
    <div class="contact-form-grid">
        <div class="contact-form-image">
            <img src="<?php echo esc_url( reset_content( 'contact', 'form_img' ) ); ?>" alt="Matcha preparation">
        </div>

        <div class="contact-form-content">
            <div class="form-wrapper">
                <h2 class="font-serif"><?php echo esc_html( reset_content( 'contact', 'form_title' ) ); ?></h2>

                <form action="#" class="reset-form" id="contactForm">
                    <div style="position:absolute;left:-9999px;top:-9999px;width:1px;height:1px;overflow:hidden;" aria-hidden="true">
                        <input type="text" name="website" value="" tabindex="-1" autocomplete="off">
                    </div>
                    <input type="hidden" name="form_loaded" value="<?php echo time(); ?>">
                    <input type="hidden" name="form_token" value="<?php echo wp_hash( floor(time()/60) . 'reset_form' ); ?>">

                    <div class="form-categories font-mono">
                        <label><input type="radio" name="category" value="events" checked> <span>events</span></label>
                        <label><input type="radio" name="category" value="press"> <span>press</span></label>
                        <label><input type="radio" name="category" value="collab"> <span>collab</span></label>
                        <label><input type="radio" name="category" value="other"> <span>other</span></label>
                    </div>

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
                <span class="font-mono find-us-label"><?php echo esc_html( reset_content( 'contact', 'find_label' ) ); ?></span>
                <h2 class="font-serif"><?php echo esc_html( reset_content( 'contact', 'find_title' ) ); ?></h2>

                <div class="transport-list font-mono">
                    <?php foreach ( $find_items as $t ) : ?>
                    <div class="transport-item">
                        <span class="transport-type"><?php echo esc_html( $t[0] ); ?></span>
                        <span class="transport-detail"><?php echo esc_html( $t[1] ); ?></span>
                    </div>
                    <?php endforeach; ?>
                </div>

                <a href="<?php echo esc_url( reset_content( 'contact', 'find_url' ) ); ?>" class="view-link font-mono"><?php echo esc_html( reset_content( 'contact', 'find_link' ) ); ?></a>
            </div>
        </div>

        <div class="find-us-image">
            <img src="<?php echo esc_url( reset_content( 'contact', 'find_img' ) ); ?>" alt="Reset Matcha Cans">
        </div>
    </div>
</section>

<?php get_footer(); ?>
