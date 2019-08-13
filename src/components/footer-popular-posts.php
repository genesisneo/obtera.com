<aside class="col-12 col-lg-4 order-1 order-lg-2 footer-popular-posts">

  <h5 class="mt-2 mb-3">Popular Post</h5>

  <?php
    $popular = new WP_Query(
      array(
        'posts_per_page' => 3,
        'meta_key' => 'popular_posts',
        'orderby' => 'meta_value_num',
        'order' => 'DESC',
        'post__not_in' => get_option("sticky_posts"),
      )
    );
    while ($popular->have_posts()) : $popular->the_post();
  ?>
    <a class="media mb-3" href="<?php the_permalink(); ?>">
      <?php
        if (has_post_thumbnail($post->ID)) {
          $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail');
          $image = $image[0];
        } else {
          $image = get_bloginfo('stylesheet_directory') . '/src/assets/img/image-thumbnail.jpg';
        }
      ?>
      <img
        loading="lazy"
        class="lazy mr-3"
        alt="<?php the_title(); ?>"
        data-src="<?php echo $image; ?>"
        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mP88fPXfwAJyAPs05GT/QAAAABJRU5ErkJggg=="
      >
      <div class="media-body align-self-center">
        <small class="d-block text-muted"><?php the_time('M d, Y'); ?></small>
        <h6 class="m-0"><?php the_title(); ?></h6>
      </div>
      </a>
  <?php
    endwhile;
    wp_reset_postdata();
  ?>

</aside>
