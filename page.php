<?php get_header(); ?>

<article class="content-page">

  <?php
    if (have_posts()) :
      while (have_posts()) : the_post();
        get_template_part('/src/components/content', 'page');
      endwhile;
    else:
      get_template_part('/src/components/content', 'none');
    endif;
  ?>

</article>

<style type="text/css">
  <?php include(get_template_directory() . '/src/assets/scss/page.css'); ?>
</style>

<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function() {
    // parallax
    initializeParallax(document.querySelector('.obtera'));
  });
</script>

<?php get_footer(); ?>
