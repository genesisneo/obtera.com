<?php

  // Ignore sticky post on index loop
  add_action('pre_get_posts', function($query) {
    if (is_home() && $query->is_main_query()) {
      $query->set('ignore_sticky_posts', true);
    }
  });

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
      $node->setAttribute("src", 'data:image/gif;base64,R0lGODlhAQABAIAAAPj5+wAAACH/C1hNUCBEYXRhWE1QPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDAgNzkuMTYwNDUxLCAyMDE3LzA1LzA2LTAxOjA4OjIxICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpCREQzMzVGQTkyNDMxMUU4QjM1MUUzNTg4ODcxMTFGNCIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpCREQzMzVGOTkyNDMxMUU4QjM1MUUzNTg4ODcxMTFGNCIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgMjAxOCAoTWFjaW50b3NoKSI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjU5MTdEQjc5OTI0MzExRTg5OThDODk1QTBCNjYzQzlFIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjU5MTdEQjdBOTI0MzExRTg5OThDODk1QTBCNjYzQzlFIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+Af/+/fz7+vn49/b19PPy8fDv7u3s6+rp6Ofm5eTj4uHg397d3Nva2djX1tXU09LR0M/OzczLysnIx8bFxMPCwcC/vr28u7q5uLe2tbSzsrGwr66trKuqqainpqWko6KhoJ+enZybmpmYl5aVlJOSkZCPjo2Mi4qJiIeGhYSDgoGAf359fHt6eXh3dnV0c3JxcG9ubWxramloZ2ZlZGNiYWBfXl1cW1pZWFdWVVRTUlFQT05NTEtKSUhHRkVEQ0JBQD8+PTw7Ojk4NzY1NDMyMTAvLi0sKyopKCcmJSQjIiEgHx4dHBsaGRgXFhUUExIREA8ODQwLCgkIBwYFBAMCAQAAIfkEAAAAAAAsAAAAAAEAAQAAAgJEAQA7');
      if ($node->getAttribute('srcset')) {
        $node->setAttribute("data-srcset", $node->getAttribute('srcset'));
        $node->setAttribute("srcset", 'data:image/gif;base64,R0lGODlhAQABAIAAAPj5+wAAACH/C1hNUCBEYXRhWE1QPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDAgNzkuMTYwNDUxLCAyMDE3LzA1LzA2LTAxOjA4OjIxICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpCREQzMzVGQTkyNDMxMUU4QjM1MUUzNTg4ODcxMTFGNCIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpCREQzMzVGOTkyNDMxMUU4QjM1MUUzNTg4ODcxMTFGNCIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgMjAxOCAoTWFjaW50b3NoKSI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjU5MTdEQjc5OTI0MzExRTg5OThDODk1QTBCNjYzQzlFIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjU5MTdEQjdBOTI0MzExRTg5OThDODk1QTBCNjYzQzlFIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+Af/+/fz7+vn49/b19PPy8fDv7u3s6+rp6Ofm5eTj4uHg397d3Nva2djX1tXU09LR0M/OzczLysnIx8bFxMPCwcC/vr28u7q5uLe2tbSzsrGwr66trKuqqainpqWko6KhoJ+enZybmpmYl5aVlJOSkZCPjo2Mi4qJiIeGhYSDgoGAf359fHt6eXh3dnV0c3JxcG9ubWxramloZ2ZlZGNiYWBfXl1cW1pZWFdWVVRTUlFQT05NTEtKSUhHRkVEQ0JBQD8+PTw7Ojk4NzY1NDMyMTAvLi0sKyopKCcmJSQjIiEgHx4dHBsaGRgXFhUUExIREA8ODQwLCgkIBwYFBAMCAQAAIfkEAAAAAAAsAAAAAAEAAQAAAgJEAQA7');
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