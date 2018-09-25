<!DOCTYPE html>
<html <?php language_attributes(); ?>>

  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <?php wp_head(); ?>
  </head>
  
  <body <?php body_class(); ?>>

    <?php if (is_home() && has_header_image()) { ?>
      <img class="lazy header-image" alt="<?php bloginfo('name'); ?>" data-src="<?php echo(get_header_image()); ?>">
    <?php } ?>

    <div class="obtera show-splash">

      <div class="splash">
        <img class="splash-logo" src="data:image/png;base64,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">
      </div>

      <?php get_template_part('/src/components/header', 'navigation'); ?>
