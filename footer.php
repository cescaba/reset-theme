<footer class="site-footer">
    <div class="footer-container">
        <div class="footer-branding">
            <h2 class="font-serif-italic"><?php echo esc_html( reset_content( 'global', 'footer_title', 'Lets (re)set' ) ); ?></h2>
            <p class="font-mono"><a href="<?php echo esc_url( reset_content( 'global', 'footer_social_url', 'https://www.instagram.com/resetmatchabar' ) ); ?>" target="_blank" style="color:inherit;text-decoration:none;"><?php echo esc_html( reset_content( 'global', 'footer_social', 'Follow us @resetmatchabar' ) ); ?></a></p>
        </div>

        <nav class="footer-nav font-mono">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Inicio</a>
            <a href="<?php echo esc_url( home_url( '/our-story' ) ); ?>">Our story</a>
            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>">Contact</a>
        </nav>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>