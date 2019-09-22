<?php

  // Relative URL
  function callback_relative_url($buffer) {
    $home_url = esc_url(home_url('/'));
    $home_url_relative = wp_make_link_relative($home_url);
    $buffer = str_replace($home_url, $home_url_relative, $buffer);
    return $buffer;
  }
  add_action('registered_taxonomy', function() {
    ob_start('callback_relative_url');
  });
  add_action('shutdown', function() {
    @ob_end_flush();
  });

  // Types of ads as variable
  $adsDefault = get_theme_mod('google_adsense_default', '3941328836');
  $adsColored = get_theme_mod('google_adsense_colored', '5500728600');
  $adsId = (rand(0,1) < 0.5) ? $adsDefault : $adsColored;
  $adsFormat = wp_is_mobile() ? 'rectangle' : 'horizontal';
  function google_adsense_ads() {
    global $adsId, $adsFormat;
    return '' .
    '<div class="col-12 mb-3 px-0 pb-3 text-center border-top border-bottom">' .
      '<p class="small text-muted my-3">' . __('ADVERTISEMENT') . '</p>' .
      '<style type="text/css">' .
        '.google-ads {' .
          'display:inline-block;' .
          'width:320px !important; height:100px !important;' .
          'min-width:320px !important; min-height:100px !important;' .
          'max-width:320px !important; max-height:100px !important;' .
        '}' .
        '@media(min-width: 500px) { .google-ads {' .
          'width:468px !important; height:60px !important;' .
          'min-width:468px !important; min-height:60px !important;' .
          'max-width:468px !important; max-height:60px !important;' .
        '}}' .
        '@media(min-width: 800px) { .google-ads {' .
          'width:728px !important; height:90px !important;' .
          'min-width:728px !important; min-height:90px !important;' .
          'max-width:728px !important; max-height:90px !important;' .
        '}}' .
      '</style>' .
      '<script type="text/javascript" async>' .
        'window.addEventListener("load", function() {' .
          'var adsTag = document.createElement("script");' .
          'adsTag.type = "text/javascript";' .
          'adsTag.src = "https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js";' .
          'document.head.appendChild(adsTag);' .
        '});' .
      '</script>' .
      '<ins class="adsbygoogle google-ads"' .
        'data-ad-client="' . get_theme_mod('google_adsense', 'ca-pub-4543509049123673') . '"' .
        'data-ad-slot="' . $adsId . '"' .
        'data-ad-format="' . $adsFormat . '"' .
        'data-full-width-responsive="false"></ins>' .
      '<script type="text/javascript">' .
        '(adsbygoogle = window.adsbygoogle || []).push({});' .
      '</script>' .
    '</div>';
  }

  // Google Analytics
  function google_analytics() { ?>
    <script type="text/javascript" async>
      window.addEventListener("load", function() {
        var analyticsTag = document.createElement("script");
        analyticsTag.type = "text/javascript";
        analyticsTag.src = "https://www.googletagmanager.com/gtag/js?id=<?php echo get_theme_mod('google_analytics', 'UA-68704357-1'); ?>";
        document.head.appendChild(analyticsTag);
      });
      window.dataLayer = window.dataLayer || [];
      function gtag() { dataLayer.push(arguments); }
      gtag("js", new Date());
      gtag("config", "<?php echo get_theme_mod('google_analytics', 'UA-68704357-1'); ?>");
    </script>
  <?php }
  add_action('wp_footer', 'google_analytics');

  // AddThis Analytics
  function addthis_analytics() {
    if (is_page() || is_single()) { ?>
      <script type="text/javascript" async>
        window.addEventListener("load", function() {
          var addThisTag = document.createElement("script");
          addThisTag.type = "text/javascript";
          addThisTag.src = "https://s7.addthis.com/js/300/addthis_widget.js#pubid=<?php echo get_theme_mod('addthis_id', 'ra-562f202ecd1822ce'); ?>";
          document.head.appendChild(addThisTag);
        });
      </script>
    <?php }
  }
  add_action('wp_footer', 'addthis_analytics');

  // Disable REST API
  add_action('after_setup_theme', function() {
    remove_action('wp_head', 'rest_output_link_wp_head', 10);
  });

  // Disable XML-RPC
  add_filter('xmlrpc_enabled', '__return_false');

  // Remove RSD links
  remove_action('wp_head', 'rsd_link');

  // Remove wlwmanifest Link
  remove_action('wp_head', 'wlwmanifest_link');

  // Remove version from head
  remove_action('wp_head', 'wp_generator');

  // Remove version from rss
  add_filter('the_generator', '__return_empty_string');

  // Remove self ping
  function no_self_ping(&$links) {
    $home = get_option( 'home' );
    foreach ($links as $l => $link) {
      if (0 === strpos($link, $home)) {
        unset($links[$l]);
      }
    }
  }
  add_action('pre_ping', 'no_self_ping');

  // Remove dashicons if not power user
  function remove_dashicon() {
    if (current_user_can('update_core')) {
      return;
    }
    wp_deregister_style('dashicons');
  }
  add_action('wp_enqueue_scripts', 'remove_dashicon');

?>
