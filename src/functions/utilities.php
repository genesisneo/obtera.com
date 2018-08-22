<?php

  // Types of ads as variable
  $adsDefault =
    '<div class="col-12 mb-3 pb-3 text-center border-top border-bottom">' .
      '<p class="small text-muted my-3">' . __('ADVERTISEMENT') . '</p>' .
      '<style type="text/css">' .
        '.google-ads { display:inline-block;width:320px;height:100px; }' .
        '@media(min-width: 500px) { .google-ads { width:468px;height:60px; } }' .
        '@media(min-width: 800px) { .google-ads { width:728px;height:90px; } }' .
      '</style>' .
      '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>' .
      '<ins class="adsbygoogle google-ads" data-ad-client="' . get_theme_mod('google_adsense', 'ca-pub-4543509049123673') . '" data-ad-slot="' . get_theme_mod('google_adsense_default', '3941328836') . '" data-ad-format="auto"></ins>' .
      '<script>(adsbygoogle = window.adsbygoogle || []).push({' .
        'google_ad_client: "' . get_theme_mod('google_adsense', 'ca-pub-4543509049123673') . '"' .
      '});</script>' .
    '</div>';
  $adsColored =
    '<div class="col-12 mb-3 pb-3 text-center border-top border-bottom">' .
    '<p class="small text-muted my-3">' . __('ADVERTISEMENT') . '</p>' .
      '<style type="text/css">' .
        '.google-ads { display:inline-block;width:320px;height:100px; }' .
        '@media(min-width: 500px) { .google-ads { width:468px;height:60px; } }' .
        '@media(min-width: 800px) { .google-ads { width:728px;height:90px; } }' .
      '</style>' .
      '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>' .
      '<ins class="adsbygoogle google-ads" data-ad-client="' . get_theme_mod('google_adsense', 'ca-pub-4543509049123673') . '" data-ad-slot="' . get_theme_mod('google_adsense_colored', '5500728600') . '" data-ad-format="auto"></ins>' .
      '<script>(adsbygoogle = window.adsbygoogle || []).push({' .
        'google_ad_client: "' . get_theme_mod('google_adsense', 'ca-pub-4543509049123673') . '"' .
      '});</script>' .
    '</div>';

  // Ads function
  function google_adsense_ads() {
    global $adsDefault, $adsColored;
    return (rand(0,1) < 0.5) ? $adsDefault : $adsColored;
  }

  // Google Analytics
  function google_analytics() { ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo get_theme_mod('google_analytics', 'UA-68704357-1'); ?>"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag() { dataLayer.push(arguments); }
      gtag("js", new Date());
      gtag("config", "<?php echo get_theme_mod('google_analytics', 'UA-68704357-1'); ?>");
    </script>
  <?php }
  add_action('wp_footer', 'google_analytics');

  // AddThis Analytics
  function addthis_analytics() { ?>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=<?php echo get_theme_mod('addthis_id', 'ra-562f202ecd1822ce'); ?>" async="async"></script>
  <?php }
  add_action('wp_footer', 'addthis_analytics');

?>
