<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Fragment+Mono&display=swap" rel="stylesheet">
  <style>
    @font-face {
      font-family: 'Exposure';
      src: url('<?php echo get_template_directory_uri(); ?>/fonts/exposure/Exposure-Regular.otf') format('opentype');
      font-weight: 400;
      font-style: normal;
      font-display: swap;
    }
    @font-face {
      font-family: 'Exposure';
      src: url('<?php echo get_template_directory_uri(); ?>/fonts/exposure/Exposure-Italic.otf') format('opentype');
      font-weight: 400;
      font-style: italic;
      font-display: swap;
    }
    @font-face {
      font-family: 'Exposure';
      src: url('<?php echo get_template_directory_uri(); ?>/fonts/exposure/Exposure-Black.otf') format('opentype');
      font-weight: 900;
      font-style: normal;
      font-display: swap;
    }
    @font-face {
      font-family: 'Exposure -10';
      src: url('<?php echo get_template_directory_uri(); ?>/fonts/exposure/Exposure-Minus10-Regular.otf') format('opentype');
      font-weight: 400;
      font-style: normal;
      font-display: swap;
    }
    @font-face {
      font-family: 'ABC Diatype';
      src: url('<?php echo get_template_directory_uri(); ?>/fonts/abc-diatype/ABCDiatype-Regular.woff2') format('woff2');
      font-weight: 400;
      font-style: normal;
      font-display: swap;
    }
    @font-face {
      font-family: 'ABC Diatype';
      src: url('<?php echo get_template_directory_uri(); ?>/fonts/abc-diatype/ABCDiatype-Italic.woff2') format('woff2');
      font-weight: 400;
      font-style: italic;
      font-display: swap;
    }
    @font-face {
      font-family: 'ABC Diatype';
      src: url('<?php echo get_template_directory_uri(); ?>/fonts/abc-diatype/ABCDiatype-Bold.woff2') format('woff2');
      font-weight: 700;
      font-style: normal;
      font-display: swap;
    }
    @font-face {
      font-family: 'ABC Diatype';
      src: url('<?php echo get_template_directory_uri(); ?>/fonts/abc-diatype/ABCDiatype-BoldItalic.woff2') format('woff2');
      font-weight: 700;
      font-style: italic;
      font-display: swap;
    }

    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --ink-blue:    #AFCBDE;
      --matcha:      #223E36;
      --warm-sand:   #F6F5F2;
      --silk-white:  #F1F1DE;
      --matcha-mid:  #2E5246;
      --matcha-light:#4A7A67;
    }

    body {
      font-family: 'Exposure', serif;
      
      color: var(--matcha);
      min-height: 100vh;
      min-height: 100dvh;
    }

    /* NAV */
    .nav {
      position: fixed; top: 0; left: 0; right: 0; z-index: 100;
      display: flex; align-items: center; justify-content: space-between;
      padding: 28px 48px;
      background: var(--warm-sand);
      border-bottom: 1px solid #C8C8B4;
    }
    .nav-logo {
      font-family: 'Exposure', serif;
      font-size: 22px;
      color: var(--matcha);
      letter-spacing: -0.03em;
    }

    /* LABEL BAR */
    .label-bar {
      background: var(--warm-sand);
      padding: 0 48px;
      display: flex;
      gap: 0;
      border-bottom: 1px solid #C8C8B4;
      margin-top: 81px;
    }
    .label-item {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 16px 28px;
      font-family: 'ABC Diatype', monospace;
      font-size: 12px;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      color: #9EB8A8;
      border-right: 1px solid #C8C8B4;
    }
    .label-item:first-child { border-left: 1px solid #C8C8B4; }
    .label-dot { width: 6px; height: 6px; border-radius: 50%; background: var(--matcha-light); }

    /* GRID */
    .a-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      min-height: 100vh;
      min-height: 100dvh;
    }

    .a-left {
      padding: 80px 60px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      background: var(--ink-blue);
    }

    .a-eyebrow {
      font-family: 'ABC Diatype', monospace;
      font-size: 13px;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      color: var(--matcha-light);
      margin-bottom: 40px;
    }

    .a-headline {
      font-family: 'DM Serif Display', serif;
      font-size: clamp(64px, 8vw, 108px);
      line-height: 0.92;
      letter-spacing: -0.04em;
      color: var(--matcha);
    }
    .a-headline em {
      font-style: italic;
      color: var(--matcha-light);
    }

    .a-bottom { margin-top: 60px; }
    .a-tagline {
      font-family: 'Fragment Mono', monospace;
      font-size: 15px;
      line-height: 1.7;
      color: #5A7A6A;
      margin-bottom: 48px;
      max-width: 380px;
    }

    .a-form { display: flex; flex-direction: column; gap: 12px; max-width: 380px; }
    .a-form input {
      background: transparent;
      border: none;
      border-bottom: 1.5px solid var(--matcha);
      padding: 14px 0;
      font-family: 'ABC Diatype', monospace;
      font-size: 16px;
      color: var(--matcha);
      outline: none;
      transition: border-color .3s;
    }
    .a-form input::placeholder { color: var(--matcha); }
    .a-form input:focus { border-bottom-color: var(--matcha-light); }
    .a-btn {
      margin-top: 8px;
      background: var(--matcha);
      color: var(--silk-white);
      border: none;
      padding: 16px 32px;
      font-family: 'ABC Diatype', monospace;
      font-size: 14px;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      cursor: pointer;
      transition: background .25s;
      align-self: flex-start;
    }
    .a-btn:hover { background: var(--matcha-light); }

    .a-right {
      position: relative; 
      background: var(--warm-sand);
display: flex;
    flex-direction: column;
    justify-content: space-between;
      padding: 80px 60px;
      overflow: hidden;
    }

    .a-big-text {
      display: flex;
      align-items: flex-start;
      pointer-events: none;
    }
    .a-big-text img {
      width: 100%;
      max-width: 100%;
      height: auto;
    }

    .a-info {
      color: var(--matcha);
    }
    .a-location {
      font-family: 'ABC Diatype', monospace;
      font-size: 13px;
      
      letter-spacing: 0.1em;
      text-transform: uppercase;
      margin-bottom: 8px;
    }
    .a-address {
      font-family: 'Exposure -10', serif;
      font-size: 28px;
      line-height: 1;
      letter-spacing: -0.02em;
      margin-bottom: 32px;
    }
    .a-social {
      font-family: 'ABC Diatype', monospace;
      font-size: 13px;
      letter-spacing: 0.08em;
    }

    /* SUCCESS STATE */
    .success-msg {
      display: none;
      padding: 20px 24px;
      background: rgba(34,62,54,0.07);
      border-left: 3px solid var(--matcha);
      font-family: 'ABC Diatype', monospace;
      font-size: 15px;
      color: var(--matcha);
      line-height: 1.6;
      margin-top: 16px;
      max-width: 380px;
    }

    /* ANIMATIONS */
    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(24px); }
      to   { opacity: 1; transform: translateY(0); }
    }
    .a-grid { animation: fadeUp .6s ease both; }

    /* RESPONSIVE */
    @media (max-width: 1400px) and (min-width: 769px) {
      .a-grid { grid-template-columns: 40% 60%; }
    }

    @media (max-width: 768px) {
      .nav { padding: 20px 24px; }
      .label-bar { padding: 0 24px; overflow-x: auto; }
      .a-grid { grid-template-columns: 1fr; min-height: 100vh; min-height: 100dvh; }
      .a-left { padding: 48px 28px; }
      .a-right { flex: 1; min-height: 0; padding: 32px 24px; gap: 32px; }
      .a-big-text { flex: 1; align-items: center; }
      .a-big-text img { object-fit: contain; }
    }
  </style>
</head>
<body>
  <!-- PROPUESTA A -->
  <div class="a-grid">
    <div class="a-left">
      <div>
        <div class="a-eyebrow">Functional Matcha Bar · Barcelona · Opening soon</div>
        <div class="a-headline">Born<br>to<br><em>elevate.</em></div>
      </div>
      <div class="a-bottom">
        <p class="a-tagline">A functional matcha bar built<br>
          for people who want to feel better every day.
        </p>
        <form class="a-form" id="resetForm">
          <!-- Honeypot: visible solo para bots -->
          <div style="position:absolute;left:-9999px;top:-9999px;width:1px;height:1px;overflow:hidden;" aria-hidden="true">
            <input type="text" name="website" value="" tabindex="-1" autocomplete="off">
          </div>
          <!-- Timestamp firmado: detecta envíos demasiado rápidos -->
          <input type="hidden" name="form_loaded" value="<?php echo time(); ?>">
          <input type="hidden" name="form_token"  value="<?php echo wp_hash( floor(time()/60) . 'reset_form' ); ?>">

          <input type="text" name="nombre" placeholder="Your name" required>
          <input type="email" name="email" placeholder="Your email" required>
          <button type="submit" class="a-btn">Join (re)set →</button>
        </form>
        <div id="successMsg" class="success-msg">
          ✓ &nbsp;Perfecto. Te avisamos cuando abramos.<br>
          <span style="opacity:.6">Mientras tanto, síguenos en @resetmatchabar</span>
        </div>
      </div>
    </div>
    <div class="a-right">
      <div class="a-big-text">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/reset_matcha.svg" alt="(re)set">
      </div>
      <div class="a-info">
        <div class="a-location">Opening soon</div>
        <div class="a-address">C/ Casanova 189<br>Barcelona</div>
        <div class="a-social"><a href="https://www.instagram.com/resetmatchabar" target="_blank" class="a-info">@resetmatchabar</a></div>
      </div> 
    </div>
  </div>

  <script>
    document.getElementById('resetForm').addEventListener('submit', function(e) {
      e.preventDefault();
      var form = this;
      var btn  = form.querySelector('button');
      btn.disabled = true;

      jQuery.post(resetAjax.url, {
        action:       'reset_registro',
        nonce:        resetAjax.nonce,
        nombre:       form.nombre.value,
        email:        form.email.value,
        website:      form.website.value,
        form_loaded:  form.form_loaded.value,
        form_token:   form.form_token.value,
      })
      .always(function() {
        form.style.display = 'none';
        document.getElementById('successMsg').style.display = 'block';
      });
    });
  </script>

  <?php wp_footer(); ?>
</body>
</html>
