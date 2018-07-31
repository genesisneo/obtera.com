<?php get_header(); ?>

<div class="single">

  <div class="row">

    <?php
      if (have_posts()) :
        while (have_posts()) : the_post();
          if (!is_attachment()) {
            get_template_part('/src/components/content', 'single');
          } else {
            get_template_part('/src/components/content', 'attachment');
          }
        endwhile;
      else:
        get_template_part('/src/components/content', 'none');
      endif;
    ?>

  </div>

</div>

<style type="text/css">
  <?php include(get_template_directory() . '/src/assets/scss/single.css'); ?>
</style>

<?php get_footer(); ?>
