<?php

  // Adding class to next or previous post button
  add_filter('next_posts_link_attributes', 'posts_link_attributes');
  add_filter('previous_posts_link_attributes', 'posts_link_attributes');
  function posts_link_attributes() {
    return 'class="btn btn-primary mx-2 my-3"';
  }

  // Automatic insert any embed attachment to a custom holder
  add_filter('embed_oembed_html', 'obtera_embed_html', 99, 4);
  function obtera_embed_html($html, $url, $attr, $post_id) {
    if (!strpos($html, 'twitter')) {
      return '<div class="embed-container aligncenter">' . $html . '</div>';
    }
    return $html;
  }

  // Add custom class on comment navigation
  add_filter('next_comments_link_attributes', 'comments_link_attributes');
  add_filter('previous_comments_link_attributes', 'comments_link_attributes');
  function comments_link_attributes() {
    return 'class="btn btn-primary mx-2 my-3"';
  }

?>
