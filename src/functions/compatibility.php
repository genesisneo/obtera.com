<?php

  // Prevent switching to this theme for old versions of WordPress
  function obtera_switch_theme() {
    switch_theme(WP_DEFAULT_THEME);
    unset($_GET['activated']);
    add_action('admin_notices', 'obtera_upgrade_notice');
  }
  add_action('after_switch_theme', 'obtera_switch_theme');

  $mainMessage = 'This theme requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.';

  // Adds a message for unsuccessful theme switch
  function obtera_upgrade_notice() {
    $message = sprintf( __($mainMessage, 'obtera'), $GLOBALS['wp_version'] );
    printf( '<div class="error"><p>%s</p></div>', $message );
  }

  // Prevents the customizer from being loaded on WordPress versions prior to 4.7
  function obtera_customize() {
    wp_die(
      sprintf( __($mainMessage, 'obtera'), $GLOBALS['wp_version'] ), '', array(
        'back_link' => true,
      )
    );
  }
  add_action('load-customize.php', 'obtera_customize');

  // Prevents the theme preview from being loaded on WordPress versions prior to 4.7
  function obtera_preview() {
    if (isset($_GET['preview'])) {
      wp_die( sprintf( __($mainMessage, 'obtera'), $GLOBALS['wp_version'] ) );
    }
  }
  add_action('template_redirect', 'obtera_preview');

?>
