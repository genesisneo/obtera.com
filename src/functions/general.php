<?php

  // Setup theme
  function obtera_setup_theme() {
    // Make theme available for translation
    load_theme_textdomain('obtera');
    // Add default posts and comments rss feed links to head
    add_theme_support('automatic-feed-links');
    // Update title tag accordingly
    add_theme_support('title-tag');
    // Enable support for post thumbnails on posts and pages
    add_theme_support('post-thumbnails');
    // Update default image size
    update_option('thumbnail_size_w', 128);
    update_option('thumbnail_size_h', 128);
    update_option('medium_size_w', 480);
    update_option('medium_size_h', 270);
    update_option('large_size_w', 960);
    update_option('large_size_h', 540);
    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');
    // Register menus
    register_nav_menus(
      array(
        'main' => __('Main Navigation Menu', 'obtera'),
        'social' => __('Social Links Menu', 'obtera'),
      )
    );
    // Add theme support for custom logo
    add_theme_support(
      'custom-logo', array(
        'width' => 128,
        'height' => 128,
        'flex-width' => true,
        'flex-height' => true,
      )
    );
    add_theme_support('html5', array(
      'caption',
      'comment-form',
      'comment-list',
      'gallery',
    ) );
    // Enable support for post formats
    add_theme_support(
      'post-formats', array(
        'aside',
        'audio',
        'gallery',
        'image',
        'link',
        'quote',
        'video',
      )
    );
    // Define and register starter content to showcase the theme on new sites
    $starter_content = array(
      // Automatically create pages 
      'posts' => array(
        'about' => array(
          'post_type' => 'page',
          'post_title' => __('About', 'obtera'),
          'post_content' => __('You might be an artist who would like to introduce yourself and your work here or maybe you&rsquo;re a business with a mission to describe.', 'obtera'),
        ),
        'contact' => array(
          'post_type' => 'page',
          'post_title' => __('Contact', 'obtera'),
          'post_content' => __('This is a page with some basic contact information, such as an address and phone number. You might also try a plugin to add a contact form.', 'obtera'),
        ),
      ),
      // Set up nav menus
      'nav_menus' => array(
        'main' => array(
          'name' => __('Main Navigation Menu', 'obtera'),
          'items' => array(
            'link_home',
            'page_about',
            'page_contact',
          ),
        ),
        'social' => array(
          'name' => __('Social Links Menu', 'obtera'),
          'items' => array(
            'link_facebook',
            'link_twitter',
            'link_instagram',
            'link_youtube',
            'link_email',
          ),
        ),
      ),
      // Add widgets on registered sidebar
      'widgets' => array(
        'site-summary' => array(
          'text_about',
        ),
      ),
    );
    $starter_content = apply_filters('obtera_starter_content', $starter_content);
    add_theme_support('starter-content', $starter_content);
  }
  add_action('after_setup_theme', 'obtera_setup_theme');

  // Add post count tracker
  function obtera_popular_posts($post_id) {
    $count_key = 'popular_posts';
    $count = get_post_meta($post_id, $count_key, true);
    if ($count == '') {
      $count = 0;
      delete_post_meta($post_id, $count_key);
      add_post_meta($post_id, $count_key, '0');
    } else {
      $count++;
      update_post_meta($post_id, $count_key, $count);
    }
  }
  function obtera_track_posts($post_id) {
    if (!is_single())
      return;
    if (empty($post_id)) {
      global $post;
      $post_id = $post->ID;
    }
    obtera_popular_posts($post_id);
  }
  add_action('wp_head', 'obtera_track_posts');

  // Add custom styles on header
  function obtera_custom_styles() { ?>
    <link href="<?php echo get_theme_file_uri('/src/assets/scss/obtera.css'); ?>" rel="stylesheet">
  <?php }
  add_action('wp_head', 'obtera_custom_styles');

  // Add custom script on footer
  function obtera_custom_script() { ?>
    <script type="text/javascript" src="<?php echo get_theme_file_uri('/src/assets/js/obtera.js'); ?>"></script>
    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "name": "<?php bloginfo('name'); ?>",
        "url": "<?php echo get_home_url(); ?>/",
        "logo": "<?php echo get_theme_file_uri('/src/assets/img/obtera.png'); ?>",
        "sameAs": [
          "https://facebook.com/obteracom",
          "https://twitter.com/obteracom",
          "https://plus.google.com/+Obteracom",
          "https://youtube.com/obteracom",
          "https://obteracom.tumblr.com/"
        ],
        "potentialAction": {
          "@type": "SearchAction",
          "target": "<?php echo get_home_url(); ?>/?s={query}",
          "query-input": "required name=query"
        }
      }
    </script>
  <?php }
  add_action('wp_footer', 'obtera_custom_script');

  // Add a pingback url auto-discovery header for singularly identifiable articles
  function obtera_pingback_header() {
    if (is_singular() && pings_open()) {
      printf('<link rel="pingback" href="%s">' . "\n", get_bloginfo('pingback_url') );
    }
  }
  add_action('wp_head', 'obtera_pingback_header');

  // Add dashicons on themes
  add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('dashicons');
  });

  // Remove admin bar styles
  add_action('get_header', function() {
    remove_action('wp_head', '_admin_bar_bump_cb');
  });

  // Add custom attributes to social links menu for analytics
  add_filter('nav_menu_link_attributes', function($atts, $item, $args) {
    if($args->theme_location == 'main') {
      $atts['data-action'] = 'Redirect';
      $atts['data-category'] = 'Main Navigation';
      $atts['data-label'] = $item->title;
      $atts['data-value'] = $item->url;
    }
    if($args->theme_location == 'social') {
      $atts['target'] = '_blank';
      $atts['rel'] = 'noopener';
      $atts['data-action'] = 'Redirect';
      $atts['data-category'] = 'Social Links';
      $atts['data-label'] = $item->title;
      $atts['data-value'] = $item->url;
    }
    return $atts;
  }, 10, 3);

?>
