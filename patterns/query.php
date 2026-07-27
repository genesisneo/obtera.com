<?php
/**
 * Title: Query
 * Slug: obtera/query
 * Categories: posts
 * Block Types: core/post-conent, core/query, core/post-title
 *
 * @package obtera
 * @since 1.0.0
 */
?>

<!-- wp:query {"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"layout":{"type":"constrained"}} -->
<div class="wp-block-query alignwide">

  <!-- wp:post-template {"align":"wide","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"grid","columnCount":2}} -->
    <!-- wp:post-featured-image {"isLink":true} /-->
    <!-- wp:post-date {"format":"F j, Y"} /-->
    <!-- wp:post-title {"isLink":true,"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} /-->
    <!-- wp:pattern {"slug":"obtera/hidden-post-meta"} /-->
    <!-- wp:post-excerpt {"moreText":"Read more","excerptLength":55} /-->
    <!-- wp:spacer {"height":"1rem"} -->
    <div style="height:1rem" aria-hidden="true" class="wp-block-spacer"></div>
    <!-- /wp:spacer -->
  <!-- /wp:post-template -->

  <!-- wp:query-no-results -->
    <!-- wp:paragraph {"align":"center"} -->
    <p class="has-text-align-center"><?php esc_html_e( 'No results found.', 'obtera'); ?></p>
    <!-- /wp:paragraph -->
  <!-- /wp:query-no-results -->

  <!-- wp:query-pagination {"align":"wide","paginationArrow":"arrow","layout":{"type":"flex","justifyContent":"space-between"}} -->
    <!-- wp:query-pagination-previous /-->
    <!-- wp:query-pagination-next /-->
  <!-- /wp:query-pagination -->

</div>
<!-- /wp:query -->
