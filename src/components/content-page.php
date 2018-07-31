        <article class="col-12 item">

          <div class="row">

            <div class="col-12 position-relative d-flex align-items-end align-content-center feature-image">
              <?php
                if (has_post_thumbnail($post->ID)) {
                  $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
                  $image = $image[0];
                } else {
                  $image = get_bloginfo('stylesheet_directory') . '/src/assets/img/image-feature.jpg';
                }
              ?>
              <img class="lazy" alt="<?php the_title(); ?>" data-src="<?php echo $image; ?>">
              <div class="container post-title">
                <div class="row">
                  <div class="col-12 text-center">
                    <h2 class="my-3 py-3 the-title"><?php the_title(); ?></h2>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 the-content">

              <div class="container py-3">
                <div class="row my-3">

                  <div class="col-12 col-lg-8 mx-auto mb-3 pb-3 post-content">
                    <?php the_content(); ?>
                  </div>

                </div>
              </div>

            </div>

            <div id="comments" class="col-12 the-comments">
              <div class="container py-3">
                <div class="row my-3">
                  <div class="col-12 mb-3 pb-3 post-comment">
                    <?php comments_template(); ?>
                  </div>
                </div>
              </div>
            </div>

          </div>

        </article>
