<?php

  // Add svg definitions to the footer
  function obtera_include_svg_icons() {
    $svg_icons = get_parent_theme_file_path('/src/assets/img/icons/svg-icons.svg');
    if (file_exists($svg_icons)) {
      require_once($svg_icons);
    }
  }
  add_action('wp_footer', 'obtera_include_svg_icons', 9999);

  // Return svg markup
  function obtera_get_svg($args = array()) {
    if (empty($args)) {
      return __('Please define default parameters in the form of an array.', 'obtera');
    }
    if (false === array_key_exists('icon', $args)) {
      return __('Please define an svg icon filename.', 'obtera');
    }
    $defaults = array(
      'icon' => '',
      'title' => '',
      'desc' => '',
      'fallback' => false,
    );
    $args = wp_parse_args($args, $defaults);
    // Begin svg markup
    $svg = '<svg class="icon icon-' . esc_attr($args['icon']) . '" role="img">';
    // Display the title
    if ($args['title']) {
      $svg .= '<title id="title-' . $unique_id . '">' . esc_html($args['title']) . '</title>';
      // Display the desc only if the title is already set
      if ($args['desc']) {
        $svg .= '<desc id="desc-' . $unique_id . '">' . esc_html($args['desc']) . '</desc>';
      }
    }
    // Display the icon
    $svg .= ' <use href="#icon-' . esc_html($args['icon']) . '" xlink:href="#icon-' . esc_html($args['icon']) . '"></use> ';
    // Add some markup to use as a fallback for browsers that do not support svg
    if ($args['fallback']) {
      $svg .= '<span class="svg-fallback icon-' . esc_attr($args['icon']) . '"></span>';
    }
    $svg .= '</svg>';
    return $svg;
  }

  // Display svg icons in social links menu
  function obtera_nav_menu_social_icons($item_output, $item, $depth, $args) {
    $social_icons = obtera_social_links_icons();
    // Change svg icon inside social links menu if there is supported url
    if ('social' === $args->theme_location) {
      foreach ($social_icons as $attr => $value) {
        if (false !== strpos($item_output, $attr)) {
          $item_output = str_replace($args->link_after, '</span>' . obtera_get_svg(array('icon' => esc_attr($value))), $item_output);
        }
      }
    }
    return $item_output;
  }
  add_filter('walker_nav_menu_start_el', 'obtera_nav_menu_social_icons', 10, 4);

// Returns an array of supported social links
function obtera_social_links_icons() {
  $social_links_icons = array(
    'behance.net' => 'behance',
    'codepen.io' => 'codepen',
    'deviantart.com' => 'deviantart',
    'digg.com' => 'digg',
    'docker.com' => 'dockerhub',
    'dribbble.com' => 'dribbble',
    'dropbox.com' => 'dropbox',
    'facebook.com' => 'facebook',
    'flickr.com' => 'flickr',
    'foursquare.com' => 'foursquare',
    'plus.google.com' => 'google-plus',
    'github.com' => 'github',
    'instagram.com' => 'instagram',
    'linkedin.com' => 'linkedin',
    'mailto:' => 'envelope-o',
    'medium.com' => 'medium',
    'pinterest.com'   => 'pinterest-p',
    'pscp.tv' => 'periscope',
    'getpocket.com' => 'get-pocket',
    'reddit.com' => 'reddit-alien',
    'skype.com' => 'skype',
    'skype:' => 'skype',
    'slideshare.net' => 'slideshare',
    'snapchat.com' => 'snapchat-ghost',
    'soundcloud.com' => 'soundcloud',
    'spotify.com' => 'spotify',
    'stumbleupon.com' => 'stumbleupon',
    'tumblr.com' => 'tumblr',
    'twitch.tv' => 'twitch',
    'twitter.com' => 'twitter',
    'vimeo.com' => 'vimeo',
    'vine.co' => 'vine',
    'vk.com' => 'vk',
    'wordpress.org' => 'wordpress',
    'wordpress.com' => 'wordpress',
    'yelp.com' => 'yelp',
    'youtube.com' => 'youtube',
  );
  return apply_filters('obtera_social_links_icons', $social_links_icons);
}
