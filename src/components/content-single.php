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
                  <div class="col-12 offset-lg-4 col-lg-8 text-center text-lg-left">
                    <h2 class="my-3 py-3 the-title"><?php the_title(); ?></h2>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 the-content">

              <div class="container py-3">
                <div class="row my-3">

                  <div class="col-12 col-lg-4 mb-3 pb-3 order-2 order-lg-1 post-details">
                    <hr class="d-lg-none">
                    <div class="post-author">
                      <a class="font-weight-bold" href="<?php echo get_author_posts_url(get_the_author_meta('id')); ?>" rel="author">
                        <?php the_author(); ?>
                      </a>
                      <p class="text-muted">
                        <?php
                          if (!empty(the_author_meta('description'))) {
                            the_author_meta('description');
                          } else {
                            echo 'Author biographical information.';
                          }
                        ?>
                        <div class="at-above-post-page d-block mt-3"></div>
                      </p>
                    </div>
                    <hr>
                    <div class="post-date">
                      <span class="text-muted">Published</span>
                      <p><?php the_time('M d, Y'); ?></p>
                    </div>
                    <hr>
                    <div class="post-format">
                      <span class="text-muted">Format</span>
                      <p><?php echo get_post_format_string(get_post_format()); ?></p>
                    </div>
                    <?php if (has_category()) { ?>
                      <hr>
                      <div class="post-categories">
                        <span class="text-muted">Categories</span>
                        <p><?php the_category('<span class="d-lg-none">,</span><br class="d-none d-lg-inline"> '); ?></p>
                      </div>
                    <?php } ?>
                    <?php if (has_tag()) { ?>
                      <hr>
                      <div class="post-tags">
                        <span class="text-muted">Tags</span>
                        <p><?php the_tags('', '<span class="d-lg-none">,</span><br class="d-none d-lg-inline"> '); ?></p>
                      </div>
                    <?php } ?>
                  </div>

                  <div class="col-12 col-lg-8 mb-3 pb-3 order-1 order-lg-2 post-content">
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
