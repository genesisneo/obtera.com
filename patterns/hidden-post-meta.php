<?php
/**
 * Title: Hidden post meta
 * Slug: obtera/hidden-post-meta
 * Inserter: no
 *
 * @package obtera
 * @since 1.0.0
 */
?>

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","justifyContent":"left"}} -->
<div class="wp-block-group">
  <!-- wp:post-author-name {"isLink":true} /-->
  <!-- wp:post-terms {"term":"category","prefix":"<?php echo esc_html__( 'Categories: ', 'obtera' )?>"} /-->
</div>
<!-- /wp:group -->
