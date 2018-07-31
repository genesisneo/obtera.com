<?php get_header(); ?>

<div class="page">

  <div class="row">

    <?php
      if (have_posts()) :
        while (have_posts()) : the_post();
          get_template_part('/src/components/content', 'page');
        endwhile;
      else:
        get_template_part('/src/components/content', 'none');
      endif;
    ?>

  </div>

</div>

<style type="text/css">
  <?php include(get_template_directory() . '/src/assets/scss/page.css'); ?>
</style>

<?php get_footer(); ?>
