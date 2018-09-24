<?php
  if (has_post_thumbnail($post->ID)) {
    $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
    $image = $image[0];
  } else {
    $image = get_bloginfo('stylesheet_directory') . '/src/assets/img/image-feature.jpg';
  }
?>
<section class="lazy parallax" parallax="0.5" data-src="<?php echo $image; ?>"></section>

<section class="col-12 px-0 py-3 text-center the-title">
  <h3 class="mb-0 py-3"><?php the_title(); ?></h3>
</section>

<section class="col-12 px-0 the-content">

  <div class="container py-3">
    <div class="row my-3">

      <div class="col-12 col-lg-9 mx-auto mb-3 pb-3 post-content">
        <?php the_content(); ?>
      </div>

    </div>
  </div>

</section>

<section class="col-12 px-0 the-comments" id="comments">

  <div class="container py-3">
    <div class="row my-3">

      <div class="col-12 mb-3 pb-3 post-comment">
        <?php comments_template(); ?>
      </div>

    </div>
  </div>

</section>
