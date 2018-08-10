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
          get_template_part('/src/components/content', 'cards');
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

<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function() {
    // item listener
    var win = $('.obtera');
    var allMods = $(".item");
    allMods.each(function(i, el) {
      var el = $(el);
      if (el.visible(true))
        el.addClass("slide visible");
    });
    win.scroll(function(event) {
      allMods.each(function(i, el) {
        var el = $(el);
        if (el.visible(true))
          el.addClass("slide");
      });
    });
  });
</script>

<?php get_footer(); ?>
