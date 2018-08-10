<section class="col-12 the-content-none">

  <div class="container py-3">
    <div class="row my-3">

      <div class="col-12 mb-3 pb-3 text-center post-content">
        <h4>Nothing found</h4>
        <?php
          if (is_home() && current_user_can('publish_posts')) :
            printf('<p>Ready to publish your first post?<br><a href="%1$s">Get started here</a>.</p>', esc_url(admin_url('post-new.php')));
          else:
            printf('<p>It seems we can&rsquo;t find what you&rsquo;re looking for.<br>Perhaps searching can help.</p>');
            ?>
            <form class="form-inline mb-3 search-form" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
              <div class="input-group mx-auto">
                <input class="form-control search-input" type="search" placeholder="Search..." name="s">
                <div class="input-group-append">
                  <button class="input-group-text dashicons-search btn" type="submit"></button>
                </div>
              </div>
            </form>
            <?php
          endif;
        ?>
      </div>

    </div>
  </div>

</section>
