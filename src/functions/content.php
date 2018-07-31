<?php

  // Automatic add Google Adsense on specific places in content
  function google_adsense_insert($content) {
    if (is_single() || !is_page()) {
      $adsCode = google_adsense_ads();
      $insertAfter = array(8, 16, 24, 32, 40, 48, 56, 64, 72, 80);
      $closingParagraph = '</p>';
      $contentBlock = explode($closingParagraph, $content);
      foreach($contentBlock as $key => $con){
        if (trim($con)) {
          $contentBlock[$key] .= $closingParagraph;
        }
        for ($x = 0; $x <= 10; $x++) {
          if (($key + 1) == $insertAfter[$x]) {
            $contentBlock[$key] .=  $adsCode;
          }
        } 
      }
      $content = implode('', $contentBlock);
    }
    return $content;
  }
  add_filter('the_content', 'google_adsense_insert');

  // Lazyload content images
  function lazyload_content_images($content) {
    $content = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
    $dom = new DOMDocument();
    @$dom->loadHTML($content);
    foreach ($dom->getElementsByTagName('img') as $node) {
      $node->setAttribute("class", 'lazy ' . $node->getAttribute('class'));
      $node->setAttribute("data-src", $node->getAttribute('src'));
      $node->setAttribute("src", 'data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==');
      if ($node->getAttribute('srcset')) {
        $node->setAttribute("data-srcset", $node->getAttribute('srcset'));
        $node->setAttribute("srcset", 'data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==');
      }
    }
    $newHtml = preg_replace('/^<!DOCTYPE.+?>/', '', str_replace( array('<html>', '</html>', '<body>', '</body>'), array('', '', '', ''), $dom->saveHTML()));
    return $newHtml;
  }
  add_filter('the_content', 'lazyload_content_images');

  // Add custom comment template
  function obtera_comments($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>
    <li id="comment-<?php comment_ID() ?>" <?php comment_class(); ?>>
      <div class="media my-3 d-flex align-items-center">
        <?php if (get_option('show_avatars') == '1') : ?>
          <img class="lazy mr-3 author-avatar" alt="" data-src="<?php echo get_avatar_url($comment, array('size' => 32)); ?>">
        <?php endif; ?>
        <div class="media-body">
          <div class="reply float-right">
            <?php comment_reply_link(array_merge($args, array('reply_text' => 'Reply', 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
          </div>
          <a class="author-name" href="<?php echo get_comment_author_url($comment); ?>" target="_blank" rel='external nofollow'>
            <?php echo get_comment_author($comment); ?>
          </a>
          <small class="d-block text-muted author-date"><?php printf(__('%1$s'), get_comment_date(), get_comment_time()) ?></small>
        </div>
      </div>
      <div class="authors-comment">
        <?php if ($comment->comment_approved == 0) : ?>
          <small class="text-info">Your comment is awaiting for approval.</small>
        <?php endif; ?>
        <?php comment_text(); ?>
      </div>
      <hr>
    <?php
  }

  // Add custom class on reply button on comment section
  add_filter('comment_reply_link', function($class){
    if (strpos($class, 'comment-reply-link')) {
      $class = str_replace("comment-reply-link", "btn btn-primary", $class);
    } else {
      $class = str_replace("comment-reply-login", "btn btn-primary", $class);
    }
    return $class;
  });

  // Add hidden forms for comment form
  function comment_form_hidden_fields() {
    comment_id_fields();
    if (current_user_can('unfiltered_html')) {
      wp_nonce_field('unfiltered-html-comment_' . get_the_ID(), '_wp_unfiltered_html_comment', false);
    }
  }

  // Remove paragraph for script and style
  add_filter('the_content', function($content) {
    return preg_replace('/<p>\\s*?(<script.*?>.*?<\\/script>|<style.*?>.*?<\\/style>)?\\s*<\\/p>/s', '\1', $content);
  });

?>