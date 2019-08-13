<!DOCTYPE html>
<html <?php language_attributes(); ?>>

  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <?php wp_head(); ?>
  </head>
  
  <body <?php body_class(); ?>>

    <div class="obtera">

      <?php if (is_home() && has_header_image()) { ?>
        <img
          loading="lazy"
          class="lazy header-image"
          alt="<?php bloginfo('name'); ?>"
          data-src="<?php echo(get_header_image()); ?>"
          src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mP88fPXfwAJyAPs05GT/QAAAABJRU5ErkJggg=="
        >
      <?php } ?>

      <?php get_template_part('/src/components/header', 'navigation'); ?>
