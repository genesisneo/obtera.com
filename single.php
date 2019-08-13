<?php get_header(); ?>

<article class="content-single">

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

</article>

<style type="text/css">
  <?php include(get_template_directory() . '/src/assets/scss/single.css'); ?>
</style>

<script type="text/javascript" defer>
  document.addEventListener('DOMContentLoaded', function() {
    // parallax
    initializeParallax(document.querySelector('.obtera'));
  });
</script>

<?php get_footer(); ?>
