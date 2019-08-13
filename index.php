<?php get_header(); ?>

<div class="container my-3 default">

  <div class="row">

    <?php
      if (have_posts()) :
        $postCount = 0;
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
