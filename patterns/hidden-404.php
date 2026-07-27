<?php
/**
 * Title: 404
 * Slug: obtera/404
 * Inserter: no
 *
 * @package obtera
 * @since 1.0.0
 */
?>

<!-- wp:group {"className":"has-white-background-color has-background","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"constrained","justifyContent":"center"}} -->
<div class="wp-block-group has-white-background-color has-background" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
  <!-- wp:spacer {"height":"1rem"} -->
  <div style="height:1rem" aria-hidden="true" class="wp-block-spacer"></div>
  <!-- /wp:spacer -->

  <!-- wp:heading {"level":1,"align":"full","style":{"typography":{"textAlign":"center"}}} -->
  <h1 class="wp-block-heading has-text-align-center alignfull">
    <?php esc_html_e( 'Page not found', 'obtera' ); ?>
  </h1>
  <!-- /wp:heading -->

  <!-- wp:paragraph -->
  <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'obtera' ); ?></p>
  <!-- /wp:paragraph -->

  <!-- wp:search {"label":"<?php echo esc_html_x( 'Search', 'Search form label', 'obtera' ); ?>","showLabel":false,"buttonText":"<?php echo esc_html_x( 'Search', 'Search form submit button text', 'obtera' ); ?>","buttonPosition":"button-inside","buttonUseIcon":true,"style":{"border":{"radius":{"topLeft":"0","topRight":"0","bottomLeft":"0","bottomRight":"0"}}}} /-->

  <!-- wp:spacer {"height":"1rem"} -->
  <div style="height:1rem" aria-hidden="true" class="wp-block-spacer"></div>
  <!-- /wp:spacer -->
</div>
<!-- /wp:group -->
