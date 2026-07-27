<?php
/**
 * Title: Columns with images
 * Slug: obtera/columns-with-images
 * Categories: featured
 * Block Types: core/image, core/columns
 *
 * @package obtera
 * @since 1.0.0
 */
?>

<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide">

  <!-- wp:column {"style":{"spacing":{"blockGap":"1rem","padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"1rem","right":"1rem"}}}} -->
  <div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--40);padding-right:1rem;padding-bottom:var(--wp--preset--spacing--40);padding-left:1rem">
    <!-- wp:image {"align":"center","width":256,"height":256,"scale":"cover","sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
    <figure class="wp-block-image aligncenter size-full is-resized is-style-rounded"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/placeholder.jpg' ) ); ?>" alt="" style="object-fit:cover;width:256px;height:256px" width="256" height="256"/></figure>
    <!-- /wp:image -->
    <!-- wp:paragraph {"align":"center"} -->
    <p class="has-text-align-center"><?php echo esc_html_x( "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since 1966.", "sample content", "obtera" ); ?></p>
    <!-- /wp:paragraph -->
  </div>
  <!-- /wp:column -->

  <!-- wp:column {"style":{"spacing":{"blockGap":"1rem","padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"1rem","right":"1rem"}}}} -->
  <div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--40);padding-right:1rem;padding-bottom:var(--wp--preset--spacing--40);padding-left:1rem">
    <!-- wp:image {"align":"center","width":256,"height":256,"scale":"cover","sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
    <figure class="wp-block-image aligncenter size-full is-resized is-style-rounded"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/placeholder.jpg' ) ); ?>" alt="" style="object-fit:cover;width:256px;height:256px" width="256" height="256"/></figure>
    <!-- /wp:image -->
    <!-- wp:paragraph {"align":"center"} -->
    <p class="has-text-align-center"><?php echo esc_html_x( "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since 1966.", "sample content", "obtera" ); ?></p>
    <!-- /wp:paragraph -->
  </div>
  <!-- /wp:column -->

  <!-- wp:column {"style":{"spacing":{"blockGap":"1rem","padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"1rem","right":"1rem"}}}} -->
  <div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--40);padding-right:1rem;padding-bottom:var(--wp--preset--spacing--40);padding-left:1rem">
    <!-- wp:image {"align":"center","width":256,"height":256,"scale":"cover","sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
    <figure class="wp-block-image aligncenter size-full is-resized is-style-rounded"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/placeholder.jpg' ) ); ?>" alt="" style="object-fit:cover;width:256px;height:256px" width="256" height="256"/></figure>
    <!-- /wp:image -->
    <!-- wp:paragraph {"align":"center"} -->
    <p class="has-text-align-center"><?php echo esc_html_x( "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since 1966.", "sample content", "obtera" ); ?></p>
    <!-- /wp:paragraph -->
  </div>
  <!-- /wp:column -->

</div>
<!-- /wp:columns -->
