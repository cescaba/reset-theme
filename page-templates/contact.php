<?php
/**
 * Template Name: Plantilla Contact
 */
?>

<?php get_header(); ?>

<div class="site-wrapper">
  <?php get_template_part( 'components/hero', null, [
    'case'        => 3,
    'pretitle'    => '---Let\'s talk',
    'title'       => 'Give us a call.',
    'description' => 'Reservations, collaborations press - or just a hello. We answer fast.',
    'bg_url'      => get_template_directory_uri() . '/assets/images/bg-page-2.png'
]); ?>
  
</div>
<section class="contact-info-section">
    <div class="contact-grid">
        <div class="contact-col">
            <span class="contact-label font-mono">Visit</span>
            <div class="contact-data font-serif">
                <p>C/ Casanova 189</p>
                <p>Barcelona</p>
            </div>
            <a href="#" class="contact-link font-mono">view map →</a>
        </div>

        <div class="contact-col">
            <span class="contact-label font-mono">Hours</span>
            <div class="contact-data font-serif">
                <p>Mon - Fri: <i>08-19</i></p>
                <p>Sat: <i>10-17</i></p>
                <p>Sun: <i>closed</i></p>
            </div>
        </div>

        <div class="contact-col">
            <span class="contact-label font-mono">Email</span>
            <div class="contact-data font-serif">
                <p><a href="mailto:info@resetmatchabar.com">info@resetmatchabar.com</a></p>
            </div>
        </div>

        <div class="contact-col">
            <span class="contact-label font-mono">Social</span>
            <div class="contact-data font-serif">
                <p><a href="https://instagram.com/resetmatchabar" target="_blank">@resetmatchabar</a></p>
            </div>
        </div>
    </div>
</section>

<section class="contact-form-section">
    <div class="contact-form-grid">
        <div class="contact-form-image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/matcha-whisk.png" alt="Matcha preparation">
        </div>

        <div class="contact-form-content">
            <div class="form-wrapper">
                <h2 class="font-serif">Send us<br>a message</h2>

                <form action="#" class="reset-form">
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
            </div>
        </div>
    </div>
</section>
<section class="find-us-section">
    <div class="find-us-grid">
        <div class="find-us-content">
            <div class="find-us-wrapper">
                <span class="font-mono find-us-label">--- How to find us</span>
                <h2 class="font-serif">L'Eixample esquerra, closely to Frances Macià Square.</h2>

                <div class="transport-list font-mono">
                    <div class="transport-item">
                        <span class="transport-type">Metro</span>
                        <span class="transport-detail">L5 - Hospital Clínic - 10min</span>
                    </div>
                    <div class="transport-item">
                        <span class="transport-type">Bus</span>
                        <span class="transport-detail">Francesc Macià - 7, 33, 34, H8 - 2 min</span>
                    </div>
                    <div class="transport-item">
                        <span class="transport-type">Bike</span>
                        <span class="transport-detail">Bicing C/ Londres 53 - 3 min.</span>
                    </div>
                    <div class="transport-item">
                        <span class="transport-type">Parking</span>
                        <span class="transport-detail">Carrer de Buenos Aires 33. 2 min</span>
                    </div>
                </div>

                <a href="#" class="view-link font-mono">view map →</a>
            </div>
        </div>

        <div class="find-us-image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/matcha-cans.png" alt="Reset Matcha Cans">
        </div>
    </div>
</section>

<?php get_footer(); ?>