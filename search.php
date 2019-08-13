<?php get_header(); ?>

<div class="container my-3 archive">

  <div class="row">
    
    <?php
      if (have_posts()) :
        $postCount = 0;
        ?>
          <section class="col-12 mb-3 px-2 item">
            <h5>
              <small class="text-muted">Results for:</small>
              <?php echo esc_html(get_search_query(false)); ?>
            </h5>
          </section>
        <?php
        while (have_posts()) : the_post();
          if ($postCount === 6) {
            echo google_adsense_ads();
          }
          include(locate_template('/src/components/content-cards.php'));
          $postCount++;
        endwhile;
        ?>
  </div>
  <div class="row justify-content-center">
        <?php
          next_posts_link('Older posts');
          previous_posts_link('Newer posts');
      else:
        get_template_part('/src/components/content', 'none');
      endif;
    ?>
    
  </div>

</div>

<style type="text/css">
  <?php include(get_template_directory() . '/src/assets/scss/default.css'); ?>
</style>

<?php get_footer(); ?>
