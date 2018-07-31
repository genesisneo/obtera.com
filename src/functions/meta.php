<?php

  // Set custom meta
  function obtera_custom_meta() { ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui, viewport-fit=cover">
    <meta name="author" content="<?php bloginfo('name'); ?>">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="keywords" content="<?php echo get_theme_mod('google_analytics', 'obtera, wordpress, theme, web, design, ui, ux, user, interface, experience'); ?>">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <link rel="apple-touch-icon-precomposed" href="<?php bloginfo('template_url'); ?>/src/assets/img/icons/icon.png" />
    <link rel="apple-touch-icon-precomposed" href="<?php bloginfo('template_url'); ?>/src/assets/img/icons/icon72x72.png" sizes="72x72" />
    <link rel="apple-touch-icon-precomposed" href="<?php bloginfo('template_url'); ?>/src/assets/img/icons/icon114x114.png" sizes="114x114" />
    <link rel="apple-touch-icon-precomposed" href="<?php bloginfo('template_url'); ?>/src/assets/img/icons/icon144x144.png" sizes="144x144" />
    <meta name="theme-color" content="<?php echo get_theme_mod('theme_color', '#343a40'); ?>" />
    <meta name="application-name" content="<?php bloginfo('name'); ?>" />
    <meta name="msapplication-TileColor" content="<?php echo get_theme_mod('theme_color', '#343a40'); ?>" />
    <meta name="msapplication-square70x70logo" content="<?php bloginfo('template_url'); ?>/src/assets/img/icons/icon70x70.png" />
    <meta name="msapplication-square150x150logo" content="<?php bloginfo('template_url'); ?>/src/assets/img/icons/icon150x150.png" />
    <meta name="msapplication-wide310x150logo" content="<?php bloginfo('template_url'); ?>/src/assets/img/icons/icon310x150.png" />
    <meta name="msapplication-square310x310logo" content="<?php bloginfo('template_url'); ?>/src/assets/img/icons/icon310x310.png" />
    <meta name="msapplication-notification" content="frequency=30;polling-uri=<?php bloginfo('rss2_url'); ?>;cycle=0"/>
    <meta name="msvalidate.01" content="1B42EF49F3894041D55ABBD83A0337D0" />
  <?php }
  add_action('wp_head', 'obtera_custom_meta');

?>
