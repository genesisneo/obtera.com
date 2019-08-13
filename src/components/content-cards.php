<article class="col-12 col-md-6 col-xl-4 mb-3 px-2 item item-<?php echo $postCount; ?>">
  <?php
    if (has_post_thumbnail($post->ID)) {
      /* thumbnail | medium | medium_large | large | full */
      $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium_large');
      $image = $image[0];
    } else {
      $image = get_bloginfo('stylesheet_directory') . '/src/assets/img/image-card.jpg';
    }
  ?>
  <a
    class="d-flex align-items-end align-content-center p-3 lazy the-post"
    href="<?php the_permalink(); ?>"
    data-src="<?php echo $image; ?>"
  >
    <div class="the-post-info">
      <small class="the-post-date m-0">
        <?php the_time('M d, Y'); ?>
      </small>
      <h4 class="the-post-title">
        <?php the_title(); ?>
      </h4>
    </div>
  </a>
</article>
