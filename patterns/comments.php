<?php
/**
 * Title: Comments
 * Slug: obtera/comments
 * Categories: text
 *
 * @package obtera
 * @since 1.0.0
 */
?>

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
    <!-- wp:comments -->
    <div class="wp-block-comments">
      <!-- wp:heading -->
      <h2><?php esc_html_e( 'Comments', 'obtera' ); ?></h2>
      <!-- /wp:heading -->
      <!-- wp:comments-title /-->
      <!-- wp:comment-template -->
        <!-- wp:columns -->
        <div class="wp-block-columns">
          <!-- wp:column {"width":"40px"} -->
          <div class="wp-block-column" style="flex-basis:40px">
            <!-- wp:avatar {"size":40,"style":{"border":{"radius":"20px"}}} /-->
          </div>
          <!-- /wp:column -->
          <!-- wp:column -->
          <div class="wp-block-column">
          <!-- wp:comment-author-name {"fontSize":"0.875rem"} /-->
          <!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex"}} -->
          <div class="wp-block-group" style="margin-top:0;margin-bottom:0">
            <!-- wp:comment-date {"fontSize":"0.875rem"} /-->
            <!-- wp:comment-edit-link {"fontSize":"0.875rem"} /-->
          </div>
          <!-- /wp:group -->
          <!-- wp:comment-content /-->
          <!-- wp:comment-reply-link {"fontSize":"0.875rem"} /-->
        </div>
        <!-- /wp:column -->
      </div>
      <!-- /wp:columns -->
      <!-- /wp:comment-template -->
      <!-- wp:comments-pagination -->
      <!-- wp:comments-pagination-previous /-->
      <!-- wp:comments-pagination-numbers /-->
      <!-- wp:comments-pagination-next /-->
      <!-- /wp:comments-pagination -->
      <!-- wp:post-comments-form /-->
    </div>
    <!-- /wp:comments -->
</div>
<!-- /wp:group -->
