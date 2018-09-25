<?php

  // Add option to remove title & decription on customizer & add default header image
  add_action('after_setup_theme', function() {
    add_theme_support(
      'custom-header', array(
        'default-image' => get_template_directory_uri() . '/src/assets/img/image-header.jpg',
        'width' => 1280,
        'height' => 720,
      )
    );
  });

  // Maipulate theme customization
  function obtera_theme_customization($wp_customize) {
    // Enable to edit title & tagline
    $wp_customize->selective_refresh->add_partial(
      'blogname', array(
        'selector' => '.site-title',
        'render_callback' => 'bloginfo("name")',
      )
    );
    $wp_customize->selective_refresh->add_partial(
      'blogdescription', array(
        'selector' => '.site-description',
        'render_callback' => 'bloginfo("description")',
      )
    );
    // Remove color options
    $wp_customize->remove_section('colors');
    // Custom settings & controls
    $wp_customize->add_section(
      'obtera_section', array(
        'title' => __('Additional Options', 'obtera')
      )
    );
    $wp_customize->add_setting(
      'site_keyword', array(
        'default' => 'obtera, wordpress, theme, web, design, ui, ux, user, interface, experience',
      )
    );
    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize, 'site_keyword', array(
          'label' => __('Site Keyword', 'obtera'),
          'description' => __('Meta keywords separated by commas.'),
          'section' => 'obtera_section',
          'type' => 'textarea',
        )
      )
    );
    $wp_customize->add_setting(
      'theme_color', array(
        'default' => '#343a40',
      )
    );
    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize, 'theme_color', array(
          'label' => __('Site Theme Color', 'obtera'),
          'description' => __('This only applicable on Android Google Chrome 39 and above. More info <a href="https://developers.google.com/web/updates/2014/11/Support-for-theme-color-in-Chrome-39-for-Android" target="_blank">here</a>.'),
          'section' => 'obtera_section',
        )
      )
    );
    $wp_customize->add_setting(
      'google_analytics', array(
        'default' => 'UA-68704357-1',
      )
    );
    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize, 'google_analytics', array(
          'label' => __('Google Analytics Account', 'obtera'),
          'description' => __('This theme is using Google Analytics - Global Site Tag (gtag.js) JavaScript framework. More info <a href="https://developers.google.com/analytics/devguides/collection/gtagjs/" target="_blank">here</a>.'),
          'section' => 'obtera_section',
        )
      )
    );
    $wp_customize->add_setting(
      'google_adsense', array(
        'default' => 'ca-pub-4543509049123673',
      )
    );
    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize, 'google_adsense', array(
          'label' => __('Google Adsense Account', 'obtera'),
          'section' => 'obtera_section',
        )
      )
    );
    $wp_customize->add_setting(
      'google_adsense_default', array(
        'default' => '3941328836',
      )
    );
    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize, 'google_adsense_default', array(
          'label' => __('Ad ID - Default', 'obtera'),
          'description' => __('Please enter ID for  <b>default</b> text ad style.'),
          'section' => 'obtera_section',
        )
      )
    );
    $wp_customize->add_setting(
      'google_adsense_colored', array(
        'default' => '5500728600',
      )
    );
    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize, 'google_adsense_colored', array(
          'label' => __('Ad ID - Colored', 'obtera'),
          'description' => __('Please enter ID for <b>colorful</b> text ad style.'),
          'section' => 'obtera_section',
        )
      )
    );
    $wp_customize->add_setting(
      'addthis_id', array(
        'default' => 'ra-562f202ecd1822ce',
      )
    );
    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize, 'addthis_id', array(
          'label' => __('AddThis Profile ID', 'obtera'),
          'description' => __('The unique ID that allows AddThis to know which website’s metrics should be reported. More info <a href="http://www.addthis.com/academy/using-profiles-in-your-addthis-account/" target="_blank">here</a>.'),
          'section' => 'obtera_section',
        )
      )
    );
  }
  add_action('customize_register', 'obtera_theme_customization');

  // Set custom styles
  function obtera_custom_them_styles() { ?>
<style type="text/css">
  :root {
    --primary-text-color: #212121;
    --secondary-text-color: #757575;
  }
  @font-face {
    font-display: swap;
  }
  html, body {
    position: fixed;
    display: block;
    margin: 0;
    padding: 0;
    width: 100vw;
    height: 100vh;
    background: #343a40;
    overflow: hidden;
  }
  .header-image {
    position:absolute;
    display:block;
    top: calc(-100vh + 1px);
    left:0;
    right:0;
    margin:0 auto;
    padding:0;
    width:auto;
    height:100vh;
    opacity:0;
    z-index:-9999;
  }
  .obtera {
    position: relative;
    display: block;
    margin: 0;
    padding: 0;
    width: 100vw;
    height: 100vh;
    background-color: #fff;
    color: #212121;
    overflow-x: hidden;
    overflow-y: auto;
    -webkit-overflow-scrolling: touch;
    overflow-scrolling: touch;
  }
  .obtera.show-splash {
    overflow: hidden;
  }
  .obtera.show-splash .splash {
    display: flex;
  }
  .splash {
    position: absolute;
    display: none;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    margin: 0;
    padding: 0;
    width: 100%;
    height: 100%;
    align-content: center;
    align-items: center;
    background-color: #fff;
    justify-content: center;
    z-index: 9999;
  }
  .splash .splash-logo {
    position: absolute;
    display: block;
    width: 32px;
    height: 32px;
    animation: rotate 1s ease-in-out 0s infinite;
  }
  @keyframes rotate {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }
  body.admin-bar .obtera {
    top: 32px;
    height: calc(100vh - 32px);
  }
  body.admin-bar.fancybox-active .obtera {
    height: 100vh;
  }
  body.admin-bar.fancybox-active .fancybox-container {
    top: 32px;
  }
  @media screen and (max-width: 782px) {
    body.admin-bar .obtera {
      top: 46px;
      height: calc(100vh - 46px);
    }
    body.admin-bar.fancybox-active .obtera {
      height: 100vh;
    }
    body.admin-bar.fancybox-active .fancybox-container {
      top: 46px;
    }
  }
</style>
<link href="https://fonts.googleapis.com/css?family=Hind+Siliguri|Open+Sans" rel="stylesheet">
  <?php }
  add_action('wp_head', 'obtera_custom_them_styles');

?>
