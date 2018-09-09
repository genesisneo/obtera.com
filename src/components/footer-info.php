            <aside class="col-12 col-lg-4 order-3 order-lg-1 footer-info">
              <div class="media">
                <?php
                  if (has_custom_logo()) {
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $custom_logo_image = wp_get_attachment_image_src($custom_logo_id, 'thumbnail');
                    if ($custom_logo_image[0]) {
                      ?>
                      <img class="lazy mr-3 footer-logo" alt="<?php bloginfo('name'); ?>" data-src="<?php echo $custom_logo_image[0] ?>">
                      <?php
                    }
                  }
                ?>
                <div class="media-body">
                  <h5 class="mt-2 mb-0 site-title"><?php bloginfo('name'); ?></h5>
                  <small class="site-description text-muted"><?php bloginfo('description'); ?></small>
                </div>
              </div>
              <?php
                if (is_active_sidebar('site-summary')) {
                  dynamic_sidebar('site-summary');
                } else { ?>
                  <div class="my-3 site-summary widget widget_text">
                    <div class="textwidget">
                      <p>Please add Text widget on "Footer Site Summary". Please note that the "Title" is hidden and this only accepts "one" Text widget. If you have more than one, the rest will be hidden.</p>
                    </div>
                  </div>
                <?php }
              ?>
              <?php if (has_nav_menu('social')) : ?>
                <?php
                  wp_nav_menu(
                    array(
                      'theme_location' => 'social',
                      'container_class' => 'social-links mb-3',
                      'menu_class' => 'social-links-menu',
                      'depth' => 1,
                      'link_before' => '<span hidden>',
                      'link_after' => '</span>' . obtera_get_svg(array('icon' => 'chain'))
                    )
                  );
                ?>
              <?php endif; ?>
            </aside>
