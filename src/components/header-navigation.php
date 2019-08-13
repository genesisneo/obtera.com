<header class="sticky-top">

  <nav class="navbar navbar-expand-lg navbar-light">

    <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
      <?php
        if (has_custom_logo()) {
          $custom_logo_id = get_theme_mod('custom_logo');
          $custom_logo_image = wp_get_attachment_image_src($custom_logo_id, 'obtera-logo');
          if ($custom_logo_image[0]) {
            ?>
            <img
              loading="lazy"
              class="lazy header-logo d-inline-block align-top"
              alt="<?php bloginfo('name'); ?>"
              data-src="<?php echo $custom_logo_image[0] ?>"
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mP88fPXfwAJyAPs05GT/QAAAABJRU5ErkJggg=="
            >
            <?php
          }
        }
      ?>
      <?php if (display_header_text()) : ?>
        <h1 class="d-inline site-title"><?php bloginfo('name'); ?></h1>
      <?php endif; ?>
    </a>

    <button
      class="navbar-toggler"
      type="button"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
      data-toggle="collapse"
      data-target="#navbarSupportedContent"
    >
      <span class="navbar-toggler-icon"></span>
    </button>

    <?php if (has_nav_menu('main')) : ?>
      <?php
        wp_nav_menu(
          array(
            'theme_location' => 'main',
            'menu_id' => 'main',
            'menu_class' => 'navbar-nav ml-auto small',
            'container' => 'div',
            'container_id' => 'navbarSupportedContent',
            'container_class' => 'collapse navbar-collapse',
            'depth' => 2,
            'fallback_cb' => '',
            'walker' => new Obtera_Navigation_Walker(),
          )
        );
      ?>
    <?php endif; ?>

  </nav>
  
</header>
