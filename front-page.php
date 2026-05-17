<?php
if ( defined( 'RESET_COMING_SOON_MODE' ) && RESET_COMING_SOON_MODE ) {
    include get_template_directory() . '/comingsoon.php';
    return;
}
?>

<?php get_header(); ?>

<div class="site-wrapper">
  <?php get_template_part( 'components/hero', null, [
    'case'        => 1,
    'title'       => 'Born<br>to<br><i class="font-italic">elevate.</i>',
    'description' => 'Functional Matcha Bar Barcelona.',
    'video_url'      => get_template_directory_uri() . '/assets/images/RESET_video_1.mp4'
]); ?>
  
</div>

<section class="info-split">
    <div class="info-text-block">
        <h2 class="info-title font-serif">
            We combine high-quality matcha with functional superfoods.
        </h2>
    </div>

    <div class="info-images-block">
        <div class="info-image-item">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/info-matcha-1.png" alt="Matcha preparation">
        </div>
        <div class="info-image-item">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/info-matcha-2.png" alt="Matcha cup (re)set">
        </div>
    </div>
</section>

<section class="products-section">
    <div class="slider-container">
        <div class="slider-main">
            <div class="slider-image-wrapper">
                <button class="slider-arrow prev">←</button>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/matcha-can-1.png" alt="Matcha Drink">
                <button class="slider-arrow next">→</button>
                <div class="slider-dots">
                    <span class="dot active"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>
            </div>
            
            <div class="slider-text">
                <h2 class="font-serif">Our signature<br>Matcha Drinks</h2>
                
                <div class="product-detail">
                    <h3 class="font-diatype-bold">Matcha latte Caliente / Frío</h3>
                    <p class="font-diatype-italic">Matcha ceremonial con tu leche favorita</p>
                </div>
                <div class="product-detail">
                    <h3 class="font-diatype-bold">Pistachio cloud</h3>
                    <p class="font-diatype-italic">Matcha latte frío con crema de pistacho</p>
                </div>
                <div class="product-detail">
                    <h3 class="font-diatype-bold">Strawberry cloud</h3>
                    <p class="font-diatype-italic">Matcha latte frío con crema de fresa</p>
                </div>
                <div class="product-detail">
                    <h3 class="font-diatype-bold">Reset cloud</h3>
                    <p class="font-diatype-italic">Matcha latte frío con crema de espirulina</p>
                </div>
            </div>
        </div>
    </div>

    <div class="products-grid-container">
        <div class="grid-header">
            <h2 class="font-serif">Crafted for<br>body & mind</h2>
            <p class="font-diatype">Funcional matcha blends made with premium ingredients and purpose.</p>
            <div class="grid-nav-arrows">
                <button class="grid-arrow prev" id="gridPrev">←</button>
                <button class="grid-arrow next" id="gridNext">→</button>
            </div>
            <a href="#" class="full-menu-link font-diatype">Full menu →</a>
        </div>

        <div class="products-scroll-wrapper" id="productGrid">
            <?php 
            $products = [
                ['name' => 'Reset Matcha', 'desc' => 'Matcha latte frío con crema de fresa', 'img' => 'matcha-can-2.png'],
                ['name' => 'Calm Matcha',  'desc' => 'Matcha latte frío con crema de fresa', 'img' => 'matcha-can-3.png'],
                ['name' => 'Focus Latte',  'desc' => 'Matcha latte frío con crema de fresa', 'img' => 'matcha-can-4.png'],
                ['name' => 'Citrus Matcha', 'desc' => 'Matcha latte frío con crema de fresa', 'img' => 'matcha-can-2.png'],
                ['name' => 'Reset Matcha', 'desc' => 'Matcha latte frío con crema de fresa', 'img' => 'matcha-can-2.png'],
                ['name' => 'Calm Matcha',  'desc' => 'Matcha latte frío con crema de fresa', 'img' => 'matcha-can-3.png'],
                ['name' => 'Focus Latte',  'desc' => 'Matcha latte frío con crema de fresa', 'img' => 'matcha-can-4.png'],
                ['name' => 'Citrus Matcha', 'desc' => 'Matcha latte frío con crema de fresa', 'img' => 'matcha-can-2.png'],
                ];
            foreach ($products as $product) : ?>
                <div class="product-card">
                    <div class="product-img">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/<?php echo $product['img']; ?>" alt="<?php echo esc_attr($product['name']); ?>">
                    </div>
                    <h4 class="font-diatype-bold"><?php echo $product['name']; ?></h4>
                    <p class="font-diatype-italic"><?php echo $product['desc']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="space-section">
    <div class="space-container">
        <div class="space-content-wrapper">
            <div class="space-image-wrapper">
                <a href="#" class="view-map-link font-mono">View map</a>
                
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/bg-space.png" alt="Our space in Barcelona">
            </div>
            
            <div class="space-info-card">
                <span class="info-label font-diatype">Our space</span>
                <h2 class="font-serif"><i>Born in</i><br>BARCELONA</h2>
                
                <div class="address-details font-diatype">
                    <p>C/ Casanova 189</p>
                    <p>Barcelona</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="rhythm-section">
    <div class="rhythm-grid">
        <div class="rhythm-item rhythm-text-block">
            <div class="rhythm-text-content">
                <h2 class="font-serif">(re)set<br>your rhythm</h2>
                <p class="font-mono">Premium matcha<br>for mindfull moments</p>
            </div>
        </div>

        <div class="rhythm-item rhythm-image rhythm-img-lifestyle">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sc-rhythm-1.png" alt="Enjoying Reset Matcha">
        </div>

        <div class="rhythm-item rhythm-image rhythm-img-cheers">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sc-rhythm-2.png" alt="Sharing Reset Matcha">
        </div>
    </div>
</section>

<?php get_footer(); ?>