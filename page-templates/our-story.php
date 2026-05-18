<?php
/**
 * Template Name: Plantilla Our Story
 */
?>

<?php get_header(); ?>

<div class="site-wrapper">
  <?php get_template_part( 'components/hero', null, [
    'case'        => 2,
    'title'       => 'Born from a simple idea.',
    'description' => 'Energy should feel good.',
    'footer_text' => 'Clarity, balance & presence',
    'bg_url'      => get_template_directory_uri() . '/assets/images/bg-page-2.png'
]); ?>
  
</div>

<section class="rituals-section">
    <div class="rituals-background-layer">
            <div class="rituals-content">
                <span class="rituals-subtitle font-mono">We don’t serve drinks</span>
                <h2 class="font-serif">We create rituals</h2>
                <p class="font-mono">Ceremonial grade. Traceable origin. Paired with functional superfoods chosen one by one.</p>
            </div>
    </div>
</section>
<section class="story-way-section">
    <div class="story-way-grid">
        <div class="way-image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/story-way.png" alt="A way to keep going">
        </div>

        <div class="way-content-block">
            <div class="way-text-container">
                <h2 class="font-serif">A way to keep going</h2>
                <p class="font-mono">Why is coffee the only option? We wanted clean, steady energy without the spike or the crash.</p>
                
                <a href="<?php echo esc_url( home_url( '/menu' ) ); ?>" class="btn-capsule font-mono">
                    Our menu
                </a>
            </div>
        </div>
    </div>
</section>
<section class="purpose-section">
    <div class="purpose-bg-overlay">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/bg-purpose.png" alt="Background shadows">
    </div>

    <div class="purpose-container">
        <header class="purpose-header">
            <span class="font-mono">our purpose</span>
            <h2 class="font-serif">(re)set exists to help people take care of their energy</h2>
        </header>

        <div class="purpose-grid">
            <div class="purpose-col">
                <p class="font-mono">To create a space<br>where people feel good,</p>
            </div>
            
            <div class="purpose-col divider-col">
                <p class="font-mono">connect</p>
            </div>

            <div class="purpose-col end-col">
                <p class="font-mono">and slow down,<br>even if just a moment</p>
            </div>
        </div>
    </div>
</section>
<section class="beliefs-section">
    <div class="beliefs-container">
        <span class="beliefs-subtitle font-mono">what we believe in</span>
        
        <div class="beliefs-grid">
            <div class="belief-item">
                <div class="belief-icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-energy.svg" alt="Clean Energy">
                </div>
                <h3 class="font-serif">CLEAN ENERGY</h3>
                <p class="font-mono">Energy,<br>without the chaos</p>
            </div>

            <div class="belief-divider"></div>

            <div class="belief-item">
                <div class="belief-icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-clarity.svg" alt="Mental Clarity">
                </div>
                <h3 class="font-serif">MENTAL CLARITY</h3>
                <p class="font-mono">Focus,<br>without the pressure</p>
            </div>

            <div class="belief-divider"></div>

            <div class="belief-item">
                <div class="belief-icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-balance.svg" alt="Daily Balance">
                </div>
                <h3 class="font-serif">DAILY BALANCE</h3>
                <p class="font-mono">Balance,<br>without the effort</p>
            </div>
        </div>
    </div>
</section>

<section class="story-dual-section">
    <div class="dual-block">
        <div class="dual-bg">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/bg-community.png" alt="Our community">
            <div class="dual-overlay"></div>
        </div>
        <div class="dual-content">
            <span class="dual-label font-mono">our community</span>
            <h2 class="font-serif">(re)set is a place to meet people who care about how they feel</h2>
            <p class="font-mono">Funcional drinks<br>Conversations that matter</p>
            <a href="#" class="btn-capsule font-mono">send us a message</a>
        </div>
    </div>

    <div class="dual-block">
        <div class="dual-bg">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/bg-space-2.png" alt="Our space">
            <div class="dual-overlay"></div>
        </div>
        <div class="dual-content">
            <span class="dual-label font-mono">our space</span>
            <h2 class="font-serif">Barcelona is our home. This is a place to slow down and reset</h2>
            <p class="font-mono">C/ Casanova, 189<br>Barcelona</p>
            <a href="#" class="btn-capsule font-mono">visit our store</a>
        </div>
    </div>
</section>
<section class="promise-section">
    <div class="promise-container">
        <span class="promise-label font-mono">our promise</span>
        <h2 class="font-serif">
            Matcha that makes you <br>
            <span class="font-serif-italic">feel good</span>
        </h2>
        
        <div class="promise-action">
            <a href="<?php echo esc_url( home_url( '/menu' ) ); ?>" class="btn-capsule font-mono">
                explore menu
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?>